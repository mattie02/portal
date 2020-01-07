<?php

namespace App\Http\Controllers;

use App\Notes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'body' => 'required|min:3|max:65535'
        ]);
        
        $store = $request->all();
        if($request->has('parent_id')) {
            $store['parent_id'] = $request->parent_id;
        } else {
            $store['parent_id'] = 0;
        }

        $store['user_id'] = Auth::id();

        Notes::create($store);
        return redirect()->route('members.edit', $request->member_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function show(Notes $notes)
    {
        return $notes;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function edit(Notes $notes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notes $notes)
    {
        $store = $request->all();
        Notes::update($store);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notes $notes)
    {
        $notes->delete();
    }
}
