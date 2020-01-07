<?php

namespace App\Http\Controllers;

use App\Members;
use App\MemberType;
use App\DoorKeys;
use App\Notes;
use App\User;
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
            'data' => Members::latest()->get(),
            'memtypes' => MemberType::latest()->get()
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
            'data' => new Members,
            'allmem' => Members::latest()->get(),
            'memtypes' => MemberType::latest()->get(), 
            // 'doorkeys' => DoorKeys::where('active', 1)->all() // select door_keys where active = 1
            'doorkeys' => DoorKeys::latest()->get(), // select door_keys where active = 1
            'selkeys'  => [] // HACK
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
            'email'                => 'required|max:255',
            'application_date'     => 'required'
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


        $member = Members::create($store);

        //attaches door keys to pick table 
        if($request->has('door_key')) {
            $member->keys()->attach($request->door_key);
        }

        return redirect()->route('members.index')->with('sucess', 'Member Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function show(Members $member)
    {
        return $member;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Members  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Members $member)
    {
        //dd($member->all());
        return view('dashboard.members.edit', [
            'data' => $member,
            'allmem' => Members::latest()->get(),
            'memtypes' => MemberType::latest()->get(),
            'doorkeys' => DoorKeys::latest()->get(), // select door_keys where active = 1
            'selkeys'  => $member->keys->pluck('id')->toArray(),
            'notes'    => Notes::where('member_id', $member->id)->get(),
            'users'    => User::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Members  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Members $member)
    {
        //dd($request->all());
        $this->validate($request, [
            'lname'                => 'required|max:255',
            'fname'                => 'required|max:255',
            'dob'                  => 'required',
            'email'                => 'required|max:255',
            'application_date'     => 'required'
        ]);

        $store = $request->all();
        //unset($store['_token']);

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

        $member->update($store);

        if($request->has('door_key')) {
            $member->keys()->sync($request->door_key);
        }

        return redirect()->route('members.index')->with('sucess', 'Membes Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Members  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Members $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('sucess', 'Members Deleted');
    }
}
