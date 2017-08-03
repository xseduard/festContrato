<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use App\Models\Role;
use Flash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin,supervisor',['except' => ['edit', 'update']]);
        // $this->middleware([
        //     'auth', 'roles:admin'
        // ]);       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);
        return view('users.index')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
       User::create([
            'nombres'   => $request->nombres,
            'apellidos' => $request->apellidos,
            'cedula'    => $request->cedula,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
        ]);

       Flash::success('Usuario registrado correctamente.');

        return redirect(route('usuarios.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        try {
            $user =  User::find($id);
        } catch (Exception $e) { /*nothing*/ }

        if (empty($user)) {
            Flash::error('Usuario No se encuentra registrado.');

            return redirect(route('usuarios.index'));
        }
        
        $this->authorize($user);

        $roles = Role::pluck('display_name', 'id');

        return view('users.edit')->with(['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        // return $request->all();
        try {
            $user = User::find($id);
        } catch (Exception $e) { /*nothing*/ }

        if (empty($user)) {
            Flash::error('Usuario No se encuentra registrado.');

            return redirect(route('usuarios.index'));
        }
        
        $this->authorize($user);

        $user->update($request->only('cedula', 'nombres', 'apellidos', 'email'));
        
        if (auth()->user()->isMixAdmin()) {
            
            $assignedRoles = $request->roles;

            if (!is_null($request->roles)) {
                foreach ($request->roles as $role) {
                   $assignedRoles[$role] = ['who_user' => \Auth::id()];
                }
            }
           
            $user->roles()->sync($assignedRoles);

            Flash::success('Usuario actualizado correctamente.');

            return redirect('usuarios');
        }

        
        Flash::success('Usuario actualizado correctamente.');

        return redirect('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $user = User::find($id);
        } catch (Exception $e) { /*nothing*/ }

        if (empty($user)) {
            Flash::error('Usuario No se encuentra registrado.');

            return redirect(route('usuarios.index'));
        }
        
        $this->authorize($user);

        $user->delete();

        Flash::success('Usuario eliminado correctamente.');

        return redirect(route('usuarios.index'));
    }
}
