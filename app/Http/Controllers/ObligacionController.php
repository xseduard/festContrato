<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateObligacionRequest;
use App\Http\Requests\UpdateObligacionRequest;
use App\Repositories\CentralRepository;
use App\Repositories\ObligacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Session;

class ObligacionController extends AppBaseController
{
    /** @var  ObligacionRepository */
    private $obligacionRepository;
    private $centralRepository;

    public function __construct(ObligacionRepository $obligacionRepo, CentralRepository $centralRepo)
    {
        $this->middleware('auth');
        $this->middleware('roles:admin,supervisor');
        $this->obligacionRepository = $obligacionRepo;
        $this->centralRepository = $centralRepo;
    }

    /**
     * Display a listing of the Obligacion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->obligacionRepository->pushCriteria(new RequestCriteria($request));
        $obligacions = $this->obligacionRepository->orderBy('updated_at', 'desc')->paginate();

        return view('obligacions.index')
            ->with('obligacions', $obligacions);
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
     * Show the form for creating a new Obligacion.
     *
     * @return Response
     */
    public function create()
    {
        $sels = $this->sels();

        return view('obligacions.create')->with(['sels' => $sels]);
    }

    /**
     * Store a newly created Obligacion in storage.
     *
     * @param CreateObligacionRequest $request
     *
     * @return Response
     */
    public function store(CreateObligacionRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $obligacion = $this->obligacionRepository->create($input);

        Session::flash('success', 'Obligacion registrado correctamente.');

        return redirect(route('obligacions.index'));
    }

    /**
     * Display the specified Obligacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $obligacion = $this->obligacionRepository->findWithoutFail($id);

        if (empty($obligacion)) {
            Session::flash('error', 'Obligacion No se encuentra registrado.');

            return redirect(route('obligacions.index'));
        }

        return view('obligacions.show')->with('obligacion', $obligacion);
    }

    /**
     * Show the form for editing the specified Obligacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $obligacion = $this->obligacionRepository->findWithoutFail($id);

        if (empty($obligacion)) {
            Session::flash('error', 'Obligacion No se encuentra registrado.');

            return redirect(route('obligacions.index'));
        }

         $sels = $this->sels();

        return view('obligacions.edit')->with(['obligacion' => $obligacion, 'sels' => $sels]);
    }

    /**
     * Update the specified Obligacion in storage.
     *
     * @param  int              $id
     * @param UpdateObligacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateObligacionRequest $request)
    {
        $obligacion = $this->obligacionRepository->findWithoutFail($id);

        if (empty($obligacion)) {
            Session::flash('error', 'Obligacion No se encuentra registrado.');

            return redirect(route('obligacions.index'));
        }

        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $obligacion = $this->obligacionRepository->update($input, $id);

        Session::flash('success', 'Obligacion actualizado correctamente.');

        return redirect(route('obligacions.index'));
    }

    /**
     * Remove the specified Obligacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $obligacion = $this->obligacionRepository->findWithoutFail($id);

        if (empty($obligacion)) {
            Session::flash('error', 'Obligacion No se encuentra registrado.');

            return redirect(route('obligacions.index'));
        }

        $this->obligacionRepository->delete($id);

        Session::flash('success', 'Obligacion eliminado correctamente.');

        return redirect(route('obligacions.index'));
    }
}
