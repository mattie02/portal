<?php

namespace App\Http\Controllers;

use App\DoorKeys;
use Illuminate\Http\Request;

class DoorKeysController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.keys.index', [
            'data' => DoorKeys::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.keys.create', [
            'data' => new DoorKeys
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
            'key' => 'required|max:255'
        ]);

        $store = $request->all();

        DoorKeys::create($store);
        return redirect()->route('door_keys.index')->with('sucess', 'Key Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keys  $keys
     * @return \Illuminate\Http\Response
     */
    public function show(Keys $key)
    {
        return $key;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keys  $keys
     * @return \Illuminate\Http\Response
     */
    public function edit(DoorKeys $key)
    {
        return view('dashboard.keys.edit', [
            'data' => $key
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keys  $keys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoorKeys $key)
    {
        $this->validate($request, [
            'key' => 'required'
        ]);

        $store = $request->all();
        $key->update($store);

        return redirect()->route('door_keys.index')->with('sucess', 'Key Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keys  $keys
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoorKeys $key)
    {
        $key->delete();
        return redirect()->route('door_keys.index')->with('sucess', 'Key Deleted');
    }
}
