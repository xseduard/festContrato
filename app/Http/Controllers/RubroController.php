<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRubroRequest;
use App\Http\Requests\UpdateRubroRequest;
use App\Repositories\CentralRepository;
use App\Repositories\RubroRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Session;

class RubroController extends AppBaseController
{
    /** @var  RubroRepository */
    private $rubroRepository;
    private $centralRepository;

    public function __construct(RubroRepository $rubroRepo, CentralRepository $centralRepo)
    {
        $this->middleware('auth');
        $this->middleware('roles:admin,supervisor');
        $this->rubroRepository = $rubroRepo;
        $this->centralRepository = $centralRepo;
    }

    /**
     * Display a listing of the Rubro.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->rubroRepository->pushCriteria(new RequestCriteria($request));
        $rubros = $this->rubroRepository->paginate();

        return view('rubros.index')
            ->with('rubros', $rubros);
    }
    /**
     * Commons Funtions Repository
     */
    public function sels()
    {
        $sels = [];
        // $sels['id_attribute'] = $this->centralRepository->id_attribute();
        return $sels;
    }

    /**
     * Show the form for creating a new Rubro.
     *
     * @return Response
     */
    public function create()
    {
        $sels = $this->sels();

        return view('rubros.create')->with(['sels' => $sels]);
    }

    /**
     * Store a newly created Rubro in storage.
     *
     * @param CreateRubroRequest $request
     *
     * @return Response
     */
    public function store(CreateRubroRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $rubro = $this->rubroRepository->create($input);

        Session::flash('success', 'Rubro registrado correctamente.');

        return redirect(route('rubros.index'));
    }

    /**
     * Display the specified Rubro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rubro = $this->rubroRepository->findWithoutFail($id);

        if (empty($rubro)) {
            Session::flash('error', 'Rubro No se encuentra registrado.');

            return redirect(route('rubros.index'));
        }

        return view('rubros.show')->with('rubro', $rubro);
    }

    /**
     * Show the form for editing the specified Rubro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rubro = $this->rubroRepository->findWithoutFail($id);

        if (empty($rubro)) {
            Session::flash('error', 'Rubro No se encuentra registrado.');

            return redirect(route('rubros.index'));
        }

         $sels = $this->sels();

        return view('rubros.edit')->with(['rubro' => $rubro, 'sels' => $sels]);
    }

    /**
     * Update the specified Rubro in storage.
     *
     * @param  int              $id
     * @param UpdateRubroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRubroRequest $request)
    {
        $rubro = $this->rubroRepository->findWithoutFail($id);

        if (empty($rubro)) {
            Session::flash('error', 'Rubro No se encuentra registrado.');

            return redirect(route('rubros.index'));
        }

        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $rubro = $this->rubroRepository->update($input, $id);

        Session::flash('success', 'Rubro actualizado correctamente.');

        return redirect(route('rubros.index'));
    }

    /**
     * Remove the specified Rubro from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rubro = $this->rubroRepository->findWithoutFail($id);

        if (empty($rubro)) {
            Session::flash('error', 'Rubro No se encuentra registrado.');

            return redirect(route('rubros.index'));
        }

        $this->rubroRepository->delete($id);

        Session::flash('success', 'Rubro eliminado correctamente.');

        return redirect(route('rubros.index'));
    }
}
