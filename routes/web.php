<?php

use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Ver SQL Optimizador

// DB::Listen(Function($query){
//     echo "<pre>{ $query->sql }</pre>";
//     //echo "<pre>{ $query->time }</pre>";
// });

Route::get('alert', function () { 
	Session::flash('error2', 'hola');
	return view('home');
	 });

Route::get('400', function () { abort(400); });
Route::get('401', function () { abort(401); });
Route::get('403', function () { abort(403); });
Route::get('404', function () { abort(404); });
Route::get('500', function () { abort(500); });
Route::get('504', function () { abort(504); });
Route::get('509', function () { abort(509); });

Route::get('/', function () {
  return redirect('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('triangles', 'TriangleController');

Route::resource('usuarios', 'UsersController');

Route::resource('roles', 'RoleController');

Route::resource('rubros', 'RubroController');

Route::resource('departamentos', 'DepartamentoController');

Route::resource('municipios', 'MunicipioController');

Route::resource('naturals', 'NaturalController');