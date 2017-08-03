<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepartamentoRequest;
use App\Http\Requests\UpdateDepartamentoRequest;
use App\Repositories\CentralRepository;
use App\Repositories\DepartamentoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Session;

class DepartamentoController extends AppBaseController
{
    /** @var  DepartamentoRepository */
    private $departamentoRepository;
    private $centralRepository;

    public function __construct(DepartamentoRepository $departamentoRepo, CentralRepository $centralRepo)
    {
        $this->middleware('auth');
        $this->middleware('roles:admin');
        $this->departamentoRepository = $departamentoRepo;
        $this->centralRepository = $centralRepo;
    }

    /**
     * Display a listing of the Departamento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->departamentoRepository->pushCriteria(new RequestCriteria($request));
        $departamentos = $this->departamentoRepository->paginate();

        return view('departamentos.index')
            ->with('departamentos', $departamentos);
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
     * Show the form for creating a new Departamento.
     *
     * @return Response
     */
    public function create()
    {
        $sels = $this->sels();

        return view('departamentos.create')->with(['sels' => $sels]);
    }

    /**
     * Store a newly created Departamento in storage.
     *
     * @param CreateDepartamentoRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartamentoRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $departamento = $this->departamentoRepository->create($input);

        Session::flash('success', 'Departamento registrado correctamente.');

        return redirect(route('departamentos.index'));
    }

    /**
     * Display the specified Departamento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $departamento = $this->departamentoRepository->findWithoutFail($id);

        if (empty($departamento)) {
            Session::flash('error', 'Departamento No se encuentra registrado.');

            return redirect(route('departamentos.index'));
        }

        return view('departamentos.show')->with('departamento', $departamento);
    }

    /**
     * Show the form for editing the specified Departamento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $departamento = $this->departamentoRepository->findWithoutFail($id);

        if (empty($departamento)) {
            Session::flash('error', 'Departamento No se encuentra registrado.');

            return redirect(route('departamentos.index'));
        }

         $sels = $this->sels();

        return view('departamentos.edit')->with(['departamento' => $departamento, 'sels' => $sels]);
    }

    /**
     * Update the specified Departamento in storage.
     *
     * @param  int              $id
     * @param UpdateDepartamentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartamentoRequest $request)
    {
        $departamento = $this->departamentoRepository->findWithoutFail($id);

        if (empty($departamento)) {
            Session::flash('error', 'Departamento No se encuentra registrado.');

            return redirect(route('departamentos.index'));
        }

        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $departamento = $this->departamentoRepository->update($input, $id);

        Session::flash('success', 'Departamento actualizado correctamente.');

        return redirect(route('departamentos.index'));
    }

    /**
     * Remove the specified Departamento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $departamento = $this->departamentoRepository->findWithoutFail($id);

        if (empty($departamento)) {
            Session::flash('error', 'Departamento No se encuentra registrado.');

            return redirect(route('departamentos.index'));
        }

        $this->departamentoRepository->delete($id);

        Session::flash('success', 'Departamento eliminado correctamente.');

        return redirect(route('departamentos.index'));
    }
}
