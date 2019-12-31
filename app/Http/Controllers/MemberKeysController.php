<?php

namespace App\Http\Controllers;

use App\MemberKeys;
use App\Members;
use App\DoorKeys;
use Illuminate\Http\Request;

class MemberKeysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.memkeys.index', [
            'data'     => MemberKeys::latest()->get(),
            'members'  => Members::latest()->get(),
            'keys'     => DoorKeys::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.memkeys.create', [
            'data'    => new MemberKeys,
            'members' => Members::latest()->get(),
            'keys'    => DoorKeys::latest()->get()
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
            'member_id' => 'required|max:255',
            'key_id'    => 'required|max:255'
        ]);

        $store = $request->all();

        MemberKeys::create($store);
        return redirect()->route('member_keys.index')->with('sucess', 'Member Key Pair Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MemberKeys  $memberKeys
     * @return \Illuminate\Http\Response
     */
    public function show(MemberKeys $memberKey)
    {
        return $memberKey;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MemberKeys  $memberKeys
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberKeys $memberKey)
    {
        return view('dashboard.memkeys.edit', [
            'data'    => $memberKey,
            'members' => Members::latest()->get(),
            'keys'    => DoorKeys::latest()->get()
        ]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MemberKeys  $memberKeys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberKeys $memberKey)
    {
        $this->validate($request, [
            'member_id' => 'required|max:255',
            'key_id'    => 'required|max:255'
        ]);

        $store = $request->all();

        $memberKey->update($store);
        return redirect()->route('member_keys.index')->with('sucess', 'Member Key Pair Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MemberKeys  $memberKeys
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberKeys $memberKey)
    {
        $memberKey->delete();
        return redirect()->route('member_keys.index')->with('sucess', 'Member Key Pair Deleted');
    }
}
