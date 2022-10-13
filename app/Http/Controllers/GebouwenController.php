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
        return view('gebouwen');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        Gebouw::destroy($request->gebouw_id);
        return redirect(route('dashboard.overview'))->with(['success'=>'Het gebouw is verwijderd.']);
    }

    /**
     * Shows the buy page.
     *
     * @param  uuid $uuid
     * @return \Illuminate\Http\Response
     */
    public function buy($uuid)
    {
        $gebouw = Gebouw::where('uuid', $uuid)->first();
        if(!$gebouw) return redirect(route('dashboard.overview'))->with(['error'=>'Dat gebouw kan je niet kopen']);
        if($gebouw->user_id == auth()->user()->id) return redirect(route('dashboard.overview'))->with(['error'=>'Je kan je eigen gebouwen niet kopen.']);
        return view('buy')->with(compact('gebouw'));
    }

    /**
     * Buys the building.
     *
     * @param  Gebouw  $gebouw
     * @param bool $belasting
     * @return \Illuminate\Http\Response
     */
    public function buyBuilding(Gebouw $gebouw, bool $belasting) {
        // $gebouw = Gebouw::where('uuid', $uuid)->first();
        // Check if building even exists
        if(!$gebouw) {
            return redirect(route('dashboard.overview'))->with(['error'=>'Dat gebouw kan je niet kopen.']);
        }

        // Checks if building is already owned by user
        if($gebouw->user_id) {
            // Checks if building is owned by the user
            if($gebouw->user_id == auth()->user()->id) {
                return redirect(route('dashboard.overview'))->with(['error'=>'Je hebt dit gebouw al gekocht.']);
            }
            $huur = $gebouw->prijs * 0.4;

            $gebouw->user->update([
                'saldo' => $gebouw->user->saldo + $huur
            ]);

            auth()->user()->update([
                'saldo' => auth()->user()->saldo - $huur
            ]);

            return redirect(route('dashboard.overview'))->with(['error'=>'Dat gebouw is al gekocht. Je hebt ' . $huur . ' euro betaald voor het huren van het gebouw.']);
        }

        // Checks if user has enough money
        if(auth()->user()->saldo < $gebouw->prijs) {
            return redirect(route('dashboard.overview'))->with(['error'=>'Je hebt niet genoeg geld om dit gebouw te kopen.']);
        }

        // Buy the building
        if($belasting){
            $belasting = $gebouw->prijs * 0.21;
            
            auth()->user()->update([
                'saldo' => auth()->user()->saldo - ($belasting + $gebouw->prijs)
            ]);

            $gebouw->update([
                'belasting' => true,
                'user_id' => auth()->user()->id
            ]);
            return redirect(route('dashboard.overview'))->with(['success'=>'Je hebt het gebouw ' . $gebouw->naam . ' gekocht voor ' . $gebouw->prijs . ' euro. Je hebt ' . $belasting . ' euro aan belasting betaald.']);
        }

        // Todo: I am convinced that there must be a better way...
        auth()->user()->update([
            'saldo' => auth()->user()->saldo - $gebouw->prijs
        ]);

        $gebouw->update([
            'user_id' => auth()->user()->id
        ]);

        return redirect(route('dashboard.overview'))->with(['success'=>'Je hebt het gebouw ' . $gebouw->naam . ' gekocht.']);
    }

}
