<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gebouw;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    private function adminCheck() {
        if(!auth()->user()->role == 'admin') # Deze methode is slecht en sloom, maar ik weet nu even niks beters.
        return redirect(route('login'));
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
        return view('users.create');
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
        $user = new User;
        $user->name = $request->user_naam;
        $user->password = Hash::make($request->user_wachtwoord);
        $user->role = "gebruiker";
        $user->save();
        return redirect(route('dashboard.overview'))->with(['success'=>'Het team genaamd ' . $request->user_naam . ' is aangemaakt.']);
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

    private function detachFromModels($id) {
        $gebouwen = Gebouw::where('user_id', $id);
        $gebouwen->update(['user_id'=>null]);
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
        $id = $request->user_id;
        if($id == 1) return redirect(route('dashboard.overview'));

        # Zoek gebouwen en onteigen ze.
        // $this->detachFromModels($id);
        $gebouwen = Gebouw::where('user_id', $id);
        $gebouwen->update(['user_id'=>null]);

        User::destroy($id);
        return redirect(route('dashboard.overview'))->with(['success'=>'Het team is verwijderd.']);
    }

    public function delete()
    {
        if(!auth()->user()->role == 'admin') # Deze methode is slecht en sloom, maar ik weet nu even niks beters.
            return redirect(route('login'));
        $users = User::get();
        return view('users.delete')->with(compact('users'));
    }
}
