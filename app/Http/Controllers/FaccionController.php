<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFaccionRequest;
use App\Http\Requests\UpdateFaccionRequest;
use App\Repositories\CentralRepository;
use App\Repositories\FaccionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Session;

class FaccionController extends AppBaseController
{
    /** @var  FaccionRepository */
    private $faccionRepository;
    private $centralRepository;

    public function __construct(FaccionRepository $faccionRepo, CentralRepository $centralRepo)
    {
        $this->middleware('auth');
        $this->middleware('roles:admin,supervisor');
        $this->faccionRepository = $faccionRepo;
        $this->centralRepository = $centralRepo;
    }

    /**
     * Display a listing of the Faccion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->faccionRepository->pushCriteria(new RequestCriteria($request));
        $faccions = $this->faccionRepository->orderBy('updated_at', 'desc')->paginate();

        return view('faccions.index')
            ->with('faccions', $faccions);
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
     * Show the form for creating a new Faccion.
     *
     * @return Response
     */
    public function create()
    {
        $sels = $this->sels();

        return view('faccions.create')->with(['sels' => $sels]);
    }

    /**
     * Store a newly created Faccion in storage.
     *
     * @param CreateFaccionRequest $request
     *
     * @return Response
     */
    public function store(CreateFaccionRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $faccion = $this->faccionRepository->create($input);

        Session::flash('success', 'Faccion registrado correctamente.');

        return redirect(route('faccions.index'));
    }

    /**
     * Display the specified Faccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $faccion = $this->faccionRepository->findWithoutFail($id);

        if (empty($faccion)) {
            Session::flash('error', 'Faccion No se encuentra registrado.');

            return redirect(route('faccions.index'));
        }

        return view('faccions.show')->with('faccion', $faccion);
    }

    /**
     * Show the form for editing the specified Faccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $faccion = $this->faccionRepository->findWithoutFail($id);

        if (empty($faccion)) {
            Session::flash('error', 'Faccion No se encuentra registrado.');

            return redirect(route('faccions.index'));
        }

         $sels = $this->sels();

        return view('faccions.edit')->with(['faccion' => $faccion, 'sels' => $sels]);
    }

    /**
     * Update the specified Faccion in storage.
     *
     * @param  int              $id
     * @param UpdateFaccionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFaccionRequest $request)
    {
        $faccion = $this->faccionRepository->findWithoutFail($id);

        if (empty($faccion)) {
            Session::flash('error', 'Faccion No se encuentra registrado.');

            return redirect(route('faccions.index'));
        }

        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $faccion = $this->faccionRepository->update($input, $id);

        Session::flash('success', 'Faccion actualizado correctamente.');

        return redirect(route('faccions.index'));
    }

    /**
     * Remove the specified Faccion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $faccion = $this->faccionRepository->findWithoutFail($id);

        if (empty($faccion)) {
            Session::flash('error', 'Faccion No se encuentra registrado.');

            return redirect(route('faccions.index'));
        }

        $this->faccionRepository->delete($id);

        Session::flash('success', 'Faccion eliminado correctamente.');

        return redirect(route('faccions.index'));
    }
}
