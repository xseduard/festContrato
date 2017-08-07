<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateNaturalRequest;
use App\Http\Requests\UpdateNaturalRequest;
use App\Models\Natural;
use App\Repositories\CentralRepository;
use App\Repositories\NaturalRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Session;

class NaturalController extends AppBaseController
{
    /** @var  NaturalRepository */
    private $naturalRepository;
    private $centralRepository;

    public function __construct(NaturalRepository $naturalRepo, CentralRepository $centralRepo)
    {
        $this->middleware('auth');
        $this->middleware('roles:admin,supervisor');
        $this->naturalRepository = $naturalRepo;
        $this->centralRepository = $centralRepo;
    }

    /**
     * Display a listing of the Natural.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->naturalRepository->pushCriteria(new RequestCriteria($request));
        $naturals = $this->naturalRepository->orderBy('updated_at', 'desc')->paginate();

        return view('naturals.index')
            ->with(['naturals' => $naturals, 'status' => $this->centralRepository->naturalStatus(), 'generos' => $this->centralRepository->generos()]);
    }
    /**
     * Commons Funtions Repository
     */
    public function sels()
    {
        $sels = [];
        $sels['generos']       = $this->centralRepository->generos();
        $sels['naturalStatus'] = $this->centralRepository->naturalStatus();
        $sels['municipio_id']  = $this->centralRepository->municipio_id();
        $sels['cargo_id']      = $this->centralRepository->cargo_id();
        $sels['faccion_id']    = $this->centralRepository->faccion_id();
        return $sels;
    }

    /**
     * Show the form for creating a new Natural.
     *
     * @return Response
     */
    public function create()
    {
        $sels = $this->sels();

        return view('naturals.create')->with(['sels' => $sels]);
    }

    /**
     * Store a newly created Natural in storage.
     *
     * @param CreateNaturalRequest $request
     *
     * @return Response
     */
    public function store(CreateNaturalRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $natural = $this->naturalRepository->create($input);

        Session::flash('success', 'Tercero Natural registrado correctamente.');

        return redirect(route('naturals.index'));
    }

    /**
     * Display the specified Natural.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $natural = $this->naturalRepository->findWithoutFail($id);

        if (empty($natural)) {
            Session::flash('error', 'Tercero Natural No se encuentra registrado.');

            return redirect(route('naturals.index'));
        }

        return view('naturals.show')->with('natural', $natural);
    }

    /**
     * Show the form for editing the specified Natural.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $natural = $this->naturalRepository->findWithoutFail($id);

        if (empty($natural)) {
            Session::flash('error', 'Tercero Natural No se encuentra registrado.');

            return redirect(route('naturals.index'));
        }

         $sels = $this->sels();

        return view('naturals.edit')->with(['natural' => $natural, 'sels' => $sels]);
    }

    /**
     * Update the specified Natural in storage.
     *
     * @param  int              $id
     * @param UpdateNaturalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNaturalRequest $request)
    {
        $natural = $this->naturalRepository->findWithoutFail($id);

        if (empty($natural)) {
            Session::flash('error', 'Tercero Natural No se encuentra registrado.');

            return redirect(route('naturals.index'));
        }

        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $natural = $this->naturalRepository->update($input, $id);

        Session::flash('success', 'Tercero Natural actualizado correctamente.');

        return redirect(route('naturals.index'));
    }

    /**
     * Remove the specified Natural from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $natural = $this->naturalRepository->findWithoutFail($id);

        if (empty($natural)) {
            Session::flash('error', 'Tercero Natural No se encuentra registrado.');

            return redirect(route('naturals.index'));
        }

        $this->naturalRepository->delete($id);

        Session::flash('success', 'Tercero Natural eliminado correctamente.');

        return redirect(route('naturals.index'));
    }

    public function getNaturalsCargo(Request $request)
    {
        // dd($request->all());
        $cargos = $request->cargos;
        if($request->ajax()){
            $natural = ($this->naturalRepository->model())::whereHas('cargo', function ($query) use($cargos){
                            $query->where('key', '=', $cargos);
                        })->get(['id', 'cedula', 'nombres', 'apellidos']);
            return response()->json($natural);
        } else {   
            $natural = ($this->naturalRepository->model())::whereHas('cargo', function ($query) use($cargos){
                            $query->where('key', '=', $cargos);
                        })->get(['id', 'cedula', 'nombres', 'apellidos']);
            return $natural;
        }
    }
}
