<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMunicipioRequest;
use App\Http\Requests\UpdateMunicipioRequest;
use App\Repositories\CentralRepository;
use App\Repositories\MunicipioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Session;

class MunicipioController extends AppBaseController
{
    /** @var  MunicipioRepository */
    private $municipioRepository;
    private $centralRepository;

    public function __construct(MunicipioRepository $municipioRepo, CentralRepository $centralRepo)
    {
        $this->middleware('auth');
        $this->middleware('roles:admin,supervisor');
        $this->municipioRepository = $municipioRepo;
        $this->centralRepository = $centralRepo;
    }

    /**
     * Display a listing of the Municipio.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // return $request->all();
        $this->municipioRepository->pushCriteria(new RequestCriteria($request));
        $municipios = $this->municipioRepository->with('departamento')->paginate();

        return view('municipios.index')
            ->with('municipios', $municipios);
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
     * Show the form for creating a new Municipio.
     *
     * @return Response
     */
    public function create()
    {
        $sels = $this->sels();

        return view('municipios.create')->with(['sels' => $sels]);
    }

    /**
     * Store a newly created Municipio in storage.
     *
     * @param CreateMunicipioRequest $request
     *
     * @return Response
     */
    public function store(CreateMunicipioRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $municipio = $this->municipioRepository->create($input);

        Session::flash('success', 'Municipio registrado correctamente.');

        return redirect(route('municipios.index'));
    }

    /**
     * Display the specified Municipio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $municipio = $this->municipioRepository->findWithoutFail($id);

        if (empty($municipio)) {
            Session::flash('error', 'Municipio No se encuentra registrado.');

            return redirect(route('municipios.index'));
        }

        return view('municipios.show')->with('municipio', $municipio);
    }

    /**
     * Show the form for editing the specified Municipio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $municipio = $this->municipioRepository->findWithoutFail($id);

        if (empty($municipio)) {
            Session::flash('error', 'Municipio No se encuentra registrado.');

            return redirect(route('municipios.index'));
        }

         $sels = $this->sels();

        return view('municipios.edit')->with(['municipio' => $municipio, 'sels' => $sels]);
    }

    /**
     * Update the specified Municipio in storage.
     *
     * @param  int              $id
     * @param UpdateMunicipioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMunicipioRequest $request)
    {
        $municipio = $this->municipioRepository->findWithoutFail($id);

        if (empty($municipio)) {
            Session::flash('error', 'Municipio No se encuentra registrado.');

            return redirect(route('municipios.index'));
        }

        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $municipio = $this->municipioRepository->update($input, $id);

        Session::flash('success', 'Municipio actualizado correctamente.');

        return redirect(route('municipios.index'));
    }

    /**
     * Remove the specified Municipio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $municipio = $this->municipioRepository->findWithoutFail($id);

        if (empty($municipio)) {
            Session::flash('error', 'Municipio No se encuentra registrado.');

            return redirect(route('municipios.index'));
        }

        $this->municipioRepository->delete($id);

        Session::flash('success', 'Municipio eliminado correctamente.');

        return redirect(route('municipios.index'));
    }
}
