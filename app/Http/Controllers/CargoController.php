<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCargoRequest;
use App\Http\Requests\UpdateCargoRequest;
use App\Repositories\CentralRepository;
use App\Repositories\CargoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Session;

class CargoController extends AppBaseController
{
    /** @var  CargoRepository */
    private $cargoRepository;
    private $centralRepository;

    public function __construct(CargoRepository $cargoRepo, CentralRepository $centralRepo)
    {
        $this->middleware('auth');
        $this->middleware('roles:admin,supervisor');
        $this->cargoRepository = $cargoRepo;
        $this->centralRepository = $centralRepo;
    }

    /**
     * Display a listing of the Cargo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cargoRepository->pushCriteria(new RequestCriteria($request));
        $cargos = $this->cargoRepository->orderBy('updated_at', 'desc')->paginate();

        return view('cargos.index')
            ->with('cargos', $cargos);
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
     * Show the form for creating a new Cargo.
     *
     * @return Response
     */
    public function create()
    {
        $sels = $this->sels();

        return view('cargos.create')->with(['sels' => $sels]);
    }

    /**
     * Store a newly created Cargo in storage.
     *
     * @param CreateCargoRequest $request
     *
     * @return Response
     */
    public function store(CreateCargoRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $cargo = $this->cargoRepository->create($input);

        Session::flash('success', 'Cargo registrado correctamente.');

        return redirect(route('cargos.index'));
    }

    /**
     * Display the specified Cargo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cargo = $this->cargoRepository->findWithoutFail($id);

        if (empty($cargo)) {
            Session::flash('error', 'Cargo No se encuentra registrado.');

            return redirect(route('cargos.index'));
        }

        return view('cargos.show')->with('cargo', $cargo);
    }

    /**
     * Show the form for editing the specified Cargo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cargo = $this->cargoRepository->findWithoutFail($id);

        if (empty($cargo)) {
            Session::flash('error', 'Cargo No se encuentra registrado.');

            return redirect(route('cargos.index'));
        }

         $sels = $this->sels();

        return view('cargos.edit')->with(['cargo' => $cargo, 'sels' => $sels]);
    }

    /**
     * Update the specified Cargo in storage.
     *
     * @param  int              $id
     * @param UpdateCargoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCargoRequest $request)
    {
        $cargo = $this->cargoRepository->findWithoutFail($id);

        if (empty($cargo)) {
            Session::flash('error', 'Cargo No se encuentra registrado.');

            return redirect(route('cargos.index'));
        }

        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $cargo = $this->cargoRepository->update($input, $id);

        Session::flash('success', 'Cargo actualizado correctamente.');

        return redirect(route('cargos.index'));
    }

    /**
     * Remove the specified Cargo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cargo = $this->cargoRepository->findWithoutFail($id);

        if (empty($cargo)) {
            Session::flash('error', 'Cargo No se encuentra registrado.');

            return redirect(route('cargos.index'));
        }

        $this->cargoRepository->delete($id);

        Session::flash('success', 'Cargo eliminado correctamente.');

        return redirect(route('cargos.index'));
    }
}
