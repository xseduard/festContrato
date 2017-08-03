<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Repositories\CentralRepository;
use App\Repositories\RoleRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Session;

class RoleController extends AppBaseController
{
    /** @var  RoleRepository */
    private $roleRepository;
    private $centralRepository;

    public function __construct(RoleRepository $roleRepo, CentralRepository $centralRepo)
    {
         $this->middleware([
            'auth', 'roles:admin'
        ]);    
        $this->roleRepository = $roleRepo;
        $this->centralRepository = $centralRepo;
    }

    /**
     * Display a listing of the Role.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roleRepository->pushCriteria(new RequestCriteria($request));
        $roles = $this->roleRepository->paginate(15);

        return view('roles.index')
            ->with('roles', $roles);
    }
    /**
     * Commons Funtions Repository
     */
    public function sels()
    {
        $sels = [];
        // $sels['id_atributo'] = $this->centralRepository->id_atributo();
        return $sels;
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        $sels = $this->sels();

        return view('roles.create')->with(['sels' => $sels]);
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $role = $this->roleRepository->create($input);

        Session::flash('success', 'Rol registrado correctamente.');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Session::flash('error', 'Rol No se encuentra registrado.');

            return redirect(route('roles.index'));
        }

        return view('roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Session::flash('error', 'Rol No se encuentra registrado.');            

            return redirect(route('roles.index'));
        }

         $sels = $this->sels();

        return view('roles.edit')->with(['role' => $role, 'sels' => $sels]);
    }

    /**
     * Update the specified Role in storage.
     *
     * @param  int              $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Session::flash('error', 'Rol No se encuentra registrado.');

            return redirect(route('roles.index'));
        }

        $input = $request->all();
        $input['user_id'] = \Auth::id();

        $role = $this->roleRepository->update($input, $id);

        Session::flash('success', 'Rol actualizado correctamente.');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Session::flash('error', 'Rol No se encuentra registrado.');

            return redirect(route('roles.index'));
        }

        $this->roleRepository->delete($id);

        Session::flash('success', 'Rol eliminado correctamente.');

        return redirect(route('roles.index'));
    }
}
