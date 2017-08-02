<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;

use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin',['except' => ['edit', 'update']]);
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
    public function store(Request $request)
    {
        //
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

        return view('users.edit')->with(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user =  User::find($id);
        } catch (Exception $e) { /*nothing*/ }

        if (empty($user)) {
            Flash::error('Usuario No se encuentra registrado.');

            return redirect(route('usuarios.index'));
        }
        
        $this->authorize($user);

        return $request->all();
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
            $user =  User::find($id);
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
