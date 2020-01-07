<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Http\Request;

class ManageUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.manusers.index', [
            'data' => User::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.manusers.create', [
            'data' => new User
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $this->validate($request, [
            'name'                  => 'required|min:3|max:255',
            'email'                 => 'required|email|unique:users', // Two users can't have the same email
            'password'              => 'required|confirmed|min:8',
        ]);

        $store = $request->all();
        $store['password'] = Hash::make($request->password);

        User::create($store);

        return redirect()->route('users.index')->with('sucess', 'User Stored');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.manusers.edit', [
            'data'     => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Validate values
        $this->validate($request, [
            'name'                  => 'required|min:3|max:255',
            'email'                 => 'required|email|unique:users,email,'.$user->id, // Two users can't have the same email
            'password'              => 'required|confirmed|min:8',
        ]);

        $store = $request->all();

        if(!is_null($request->password)) {
            $store['password'] = Hash::make($request->password);
        } else {
            unset($store['password']);
        }

        // Update
        $user->update($store);

        return redirect()->route('users.index')->with('sucess', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        // $user->delete();
        // return redirect()->route('users.index')->with('sucess', 'USER HAS BEEN KILLED >:D');

        if(Auth::id() != $user->id) {
            $user->delete();
            return redirect()->route('users.index')->with('sucess', 'USER HAS BEEN KILLED >:D');
        } else {
            return redirect()->route('users.index')->with('fail', 'USER CAN\'T KILL THEMSELFS');
        }
    }
}
