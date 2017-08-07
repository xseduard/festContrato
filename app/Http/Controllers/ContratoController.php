<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContratoRequest;
use App\Http\Requests\UpdateContratoRequest;
use App\Repositories\CentralRepository;
use App\Repositories\ContratoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Session;

class ContratoController extends AppBaseController
{
    /** @var  ContratoRepository */
    private $contratoRepository;
    private $centralRepository;

    public function __construct(ContratoRepository $contratoRepo, CentralRepository $centralRepo)
    {
        $this->middleware('auth');
        $this->middleware('roles:admin,supervisor');
        $this->contratoRepository = $contratoRepo;
        $this->centralRepository = $centralRepo;
    }

    /**
     * Display a listing of the Contrato.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->contratoRepository->pushCriteria(new RequestCriteria($request));
        $contratos = $this->contratoRepository->orderBy('updated_at', 'desc')->paginate();

        return view('contratos.index')
            ->with('contratos', $contratos);
    }
    /**
     * Commons Funtions Repository
     */
    public function sels()
    {
        $sels = [];
           $sels['tercero_type'] = $this->centralRepository->tercero_type();
           $sels['tipo_contrato'] = $this->centralRepository->tipo_contrato();
           $sels['faccion_id'] = $this->centralRepository->faccion_id();
           $sels['rubro_id'] = $this->centralRepository->rubro_id();
           $sels['natural_bycargo'] = $this->centralRepository->natural_bycargo(['SUBSEC']);
        return $sels;
    }

    /**
     * Show the form for creating a new Contrato.
     *
     * @return Response
     */
    public function create()
    {
        $sels = $this->sels();

        return view('contratos.create')->with(['sels' => $sels]);
    }

    /**
     * Store a newly created Contrato in storage.
     *
     * @param CreateContratoRequest $request
     *
     * @return Response
     */
    public function store(CreateContratoRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $contrato = $this->contratoRepository->create($input);

        Session::flash('success', 'Contrato registrado correctamente.');

        return redirect(route('contratos.index'));
    }

    /**
     * Display the specified Contrato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contrato = $this->contratoRepository->findWithoutFail($id);

        if (empty($contrato)) {
            Session::flash('error', 'Contrato No se encuentra registrado.');

            return redirect(route('contratos.index'));
        }

        return view('contratos.show')->with('contrato', $contrato);
    }

    /**
     * Show the form for editing the specified Contrato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contrato = $this->contratoRepository->findWithoutFail($id);

        if (empty($contrato)) {
            Session::flash('error', 'Contrato No se encuentra registrado.');

            return redirect(route('contratos.index'));
        }

         $sels = $this->sels();

        return view('contratos.edit')->with(['contrato' => $contrato, 'sels' => $sels]);
    }

    /**
     * Update the specified Contrato in storage.
     *
     * @param  int              $id
     * @param UpdateContratoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContratoRequest $request)
    {
        $contrato = $this->contratoRepository->findWithoutFail($id);

        if (empty($contrato)) {
            Session::flash('error', 'Contrato No se encuentra registrado.');

            return redirect(route('contratos.index'));
        }

        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $contrato = $this->contratoRepository->update($input, $id);

        Session::flash('success', 'Contrato actualizado correctamente.');

        return redirect(route('contratos.index'));
    }

    /**
     * Remove the specified Contrato from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contrato = $this->contratoRepository->findWithoutFail($id);

        if (empty($contrato)) {
            Session::flash('error', 'Contrato No se encuentra registrado.');

            return redirect(route('contratos.index'));
        }

        $this->contratoRepository->delete($id);

        Session::flash('success', 'Contrato eliminado correctamente.');

        return redirect(route('contratos.index'));
    }
}
