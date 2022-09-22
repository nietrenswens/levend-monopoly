<?php

namespace App\Http\Controllers;

use App\Models\Gebouw;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GebouwenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->role == 'admin') # Deze methode is slecht en sloom, maar ik weet nu even niks beters.
            return redirect(route('login'));
        return view('gebouwen');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->role == 'admin') # Deze methode is slecht en sloom, maar ik weet nu even niks beters.
            return redirect(route('login'));
        return view('gebouwen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->role == 'admin') # Deze methode is slecht en sloom, maar ik weet nu even niks beters.
            return redirect(route('login'));
        $gebouw = new Gebouw;
        $gebouw->naam = $request->gebouw_naam;
        $gebouw->prijs = $request->gebouw_prijs;
        if(!$request->gebouw_uuid) 
            $gebouw->uuid = Str::random(40); 
        else 
            $gebouw->uuid = $request->gebouw_uuid;
        $gebouw->save();
        return redirect(route('dashboard.overview'))->with(['success'=>'Het gebouw ' . $gebouw->naam . ' is aangemaakt.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function delete() {
        if(!auth()->user()->role == 'admin') # Deze methode is slecht en sloom, maar ik weet nu even niks beters.
            return redirect(route('login'));
        $gebouwen = Gebouw::get();
        return view('gebouwen.delete')->with(compact('gebouwen'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(!auth()->user()->role == 'admin') # Deze methode is slecht en sloom, maar ik weet nu even niks beters.
            return redirect(route('login'));
        Gebouw::destroy($request->gebouw_id);
        return redirect(route('dashboard.overview'))->with(['success'=>'Het gebouw is verwijderd.']);
    }

    /**
     * Koop een gebouw
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buy($uuid)
    {
        $gebouw = Gebouw::where('uuid', $uuid)->first();
        if(!$gebouw) return redirect(route('dashboard.overview'))->with(['error'=>'Dat gebouw kan je niet kopen']);
        return view('buy')->with(compact('gebouw'));
    }

}
