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
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Controles register
//Auth::routes();
Auth::routes(['register' => false]);


Route::prefix('dashboard')->middleware('auth')->group(function() {


    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/member_type', 'MemberTypeController', [
        //Change URI name
        'parameters' => [
            'member_type' => 'memtype'
        ]
    ]); 

    Route::resource('/users', 'ManageUsersController');
    Route::resource('/members', 'MembersController');

    Route::resource('/door_keys', 'DoorKeysController', [
        //Change URI name
        'parameters' => [
            'door_keys' => 'key'
        ]
    ]); 

    Route::resource('/notes', 'NotesController');
});
