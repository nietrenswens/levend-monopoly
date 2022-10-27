<?php

namespace App\Http\Controllers;

use App\Models\Gebouw;
use App\Models\User;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function index() {
        $users = User::where('role', '=', 'gebruiker')->get();
        return view('tax.index', compact('users'));
    }

    public function manage(User $user) {
        // retrieve gebouwen sorted by price where belasting is false
        $gebouwen = $user->gebouwen()->where('belasting', '=', false)->orderBy('prijs', 'desc')->get();
        return view('tax.manage')->with(['user' => $user, 'gebouwen' => $gebouwen]);
    }

    public function removeBuildingFromTeam(Request $request) {
        $gebouw = Gebouw::find($request->gebouw_id);
        if(!$gebouw) {
            return redirect(route('tax.manage', $user->id))->with(['error' => 'Het gebouw is niet gevonden.']);
        }
        $gebouw->update(['belasting' => false, 'user_id' => null]);
        return redirect(route('dashboard.management'))->with(['success'=>'Het gebouw is bij het team weggenomen.']);
    }
}
