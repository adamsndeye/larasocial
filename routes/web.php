<?php

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
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');
Route::get('profils/{user}/show', 'ProfilController@show')->name('profils.show');
Route::get('profils/{profil}/edit', 'ProfilController@edit')->name('profils.edit');
Route::get('profils/{user}/create', 'ProfilController@create')->name('profils.create');
Route::post('profils/', 'ProfilController@store')->name('profils.store');
Route::patch('profils/{profil}', 'ProfilController@update')->name('profils.update');
Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');
Route::resource('posts', 'PostController');
Route::post('/comments/{post}', 'CommentController@store')->name('comments.store');


/*Route::get('/aotrole-perissio', function(){

$role = Role::create(['name' => 'admin']);
$permission = Permission::create(['name' => 'admin role et permission']);
auth()->user()->assignRole('admin');
auth()->user()->givePermissionTo('admin role et permission');

});
*/




