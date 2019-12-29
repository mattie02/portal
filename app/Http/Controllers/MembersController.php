<?php

namespace App\Http\Controllers;

use App\Members;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.members.index', [
            'data' => Members::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.members.create', [
            'data' => new Members
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
        $this->validate($request, [
            'lname'                => 'required|max:255',
            'fname'                => 'required|max:255',
            'dob'                  => 'required',
            'email'                => 'required|max:255'
        ]);

        $store = $request->all();

        // If checkbox is empty, asign 'active' as 0
        if($request->has('email_private')) {
            $store['email_private'] = $request->email_private;
        } else {
            $store['email_private'] = 0;
        }  

        // If checkbox is empty, asign 'active' as 0
        if($request->has('phone_mobile_private')) {
            $store['phone_mobile_private'] = $request->phone_mobile_private;
        } else {
            $store['phone_mobile_private'] = 0;
        }  

        // If checkbox is empty, asign 'active' as 0
        if($request->has('phone_alt_private')) {
            $store['phone_alt_private'] = $request->phone_alt_private;
        } else {
            $store['phone_alt_private'] = 0;
        }               


        Members::create($store);
        return redirect()->route('members.index')->with('sucess', 'Member Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function show(Members $members)
    {
        return $members;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function edit(Members $members)
    {
        return view('dashboard.members.edit', [
            'data' => $members
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Members $members)
    {
        $this->validate($request, [
            'lname'                => 'required|max:255',
            'fname'                => 'required|max:255',
            'dob'                  => 'required',
            'email'                => 'required|max:255'
        ]);

        $store = $request->all();

        // If checkbox is empty, asign 'active' as 0
        if($request->has('email_private')) {
            $store['email_private'] = $request->email_private;
        } else {
            $store['email_private'] = 0;
        }  

        // If checkbox is empty, asign 'active' as 0
        if($request->has('phone_mobile_private')) {
            $store['phone_mobile_private'] = $request->phone_mobile_private;
        } else {
            $store['phone_mobile_private'] = 0;
        }  

        // If checkbox is empty, asign 'active' as 0
        if($request->has('phone_alt_private')) {
            $store['phone_alt_private'] = $request->phone_alt_private;
        } else {
            $store['phone_alt_private'] = 0;
        }  

        Members::update($store);

        return redirect()->route('members.index')->with('sucess', 'Membes Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function destroy(Members $members)
    {
        $members->delete();
        return redirect()->route('members.index')->with('sucess', 'Members Deleted');
    }
}
