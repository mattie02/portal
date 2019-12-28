<?php

namespace App\Http\Controllers;

use App\MemberType;
use Illuminate\Http\Request;

class MemberTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashbord.memtype.index', [
            'data' => MemberType::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('dashbord.memtype.create', [
          'data' => new MemberType
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
        // Validate the values comming in
        $this->validate($request, [
            'label' => 'required|min:5|max:255'
        ]);

        $store = $request->all();

        // If checkbox is empty, asign 'active' as 0
        if($request->has('active')) {
            $store['active'] = $request->active;
        } else {
            $store['active'] = 0;
        }

        MemberType::create($store);

        return redirect()->route('member_type.index')->with('sucess', 'Member Type Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MemberType  $memberType
     * @return \Illuminate\Http\Response
     */
    public function show(MemberType $memtype)
    {
        return $memtype; // return index of memtype
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MemberType  $memberType
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberType $memtype) {
        return view('dashbord.memtype.edit', [
            'data' => $memtype
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MemberType  $memberType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberType $memtype)
    {
        // Validate the values comming in
        $this->validate($request, [
            'label' => 'required|min:5|max:255'
        ]);

        $store = $request->all();

        // If checkbox is empty, asign 'active' as 0
        if($request->has('active')) {
            $store['active'] = $request->active;
        } else {
            $store['active'] = 0;
        }

        // Update
        $memtype->update($store);

        return redirect()->route('member_type.index')->with('sucess', 'Member Type Updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MemberType  $memberType
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberType $memtype)
    {
        $memtype->delete();
        return redirect()->route('member_type.index')->with('sucess', 'Member Type Deleted >:D'); 
    }
}
