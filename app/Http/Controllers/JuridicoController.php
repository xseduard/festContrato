<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJuridicoRequest;
use App\Http\Requests\UpdateJuridicoRequest;
use App\Repositories\CentralRepository;
use App\Repositories\JuridicoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Session;

class JuridicoController extends AppBaseController
{
    /** @var  JuridicoRepository */
    private $juridicoRepository;
    private $centralRepository;

    public function __construct(JuridicoRepository $juridicoRepo, CentralRepository $centralRepo)
    {
        $this->middleware('auth');
        $this->middleware('roles:admin,supervisor');
        $this->juridicoRepository = $juridicoRepo;
        $this->centralRepository = $centralRepo;
    }

    /**
     * Display a listing of the Juridico.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->juridicoRepository->pushCriteria(new RequestCriteria($request));
        $juridicos = $this->juridicoRepository->orderBy('updated_at', 'desc');

        if($request->ajax()){    
            //para selects      
            return response()->json( $juridicos->all() );
        }

        return view('juridicos.index')
            ->with(['juridicos' => $juridicos->paginate(), 'status' => $this->centralRepository->juridicoStatus()]);
    }
    /**
     * Commons Funtions Repository
     */
    public function sels()
    {
        $sels = [];
        $sels['juridicoStatus'] = $this->centralRepository->juridicoStatus();
        $sels['municipio_id'] = $this->centralRepository->municipio_id();
        $sels['natural_id'] = $this->centralRepository->natural_id();
        return $sels;
    }

    /**
     * Show the form for creating a new Juridico.
     *
     * @return Response
     */
    public function create()
    {
        $sels = $this->sels();

        return view('juridicos.create')->with(['sels' => $sels]);
    }

    /**
     * Store a newly created Juridico in storage.
     *
     * @param CreateJuridicoRequest $request
     *
     * @return Response
     */
    public function store(CreateJuridicoRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $juridico = $this->juridicoRepository->create($input);

        Session::flash('success', 'Tercero Juridico registrado correctamente.');

        return redirect(route('juridicos.index'));
    }

    /**
     * Display the specified Juridico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $juridico = $this->juridicoRepository->findWithoutFail($id);

        if (empty($juridico)) {
            Session::flash('error', 'Tercero Juridico No se encuentra registrado.');

            return redirect(route('juridicos.index'));
        }

        return view('juridicos.show')->with('juridico', $juridico);
    }

    /**
     * Show the form for editing the specified Juridico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $juridico = $this->juridicoRepository->findWithoutFail($id);

        if (empty($juridico)) {
            Session::flash('error', 'Tercero Juridico No se encuentra registrado.');

            return redirect(route('juridicos.index'));
        }

         $sels = $this->sels();

        return view('juridicos.edit')->with(['juridico' => $juridico, 'sels' => $sels]);
    }

    /**
     * Update the specified Juridico in storage.
     *
     * @param  int              $id
     * @param UpdateJuridicoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJuridicoRequest $request)
    {
        $juridico = $this->juridicoRepository->findWithoutFail($id);

        if (empty($juridico)) {
            Session::flash('error', 'Tercero Juridico No se encuentra registrado.');

            return redirect(route('juridicos.index'));
        }

        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $juridico = $this->juridicoRepository->update($input, $id);

        Session::flash('success', 'Tercero Juridico actualizado correctamente.');

        return redirect(route('juridicos.index'));
    }

    /**
     * Remove the specified Juridico from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $juridico = $this->juridicoRepository->findWithoutFail($id);

        if (empty($juridico)) {
            Session::flash('error', 'Tercero Juridico No se encuentra registrado.');

            return redirect(route('juridicos.index'));
        }

        $this->juridicoRepository->delete($id);

        Session::flash('success', 'Tercero Juridico eliminado correctamente.');

        return redirect(route('juridicos.index'));
    }
}
