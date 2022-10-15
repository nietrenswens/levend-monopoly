<?php

namespace App\Http\Controllers;

use App\Models\Startcode;
use Illuminate\Http\Request;

class StartcodesController extends Controller
{

    /**
     * Claim a startcode
     *
     * @param Startcode $startcode
     * @return \Illuminate\Http\RedirectResponse
     */
    public function claimStartcode($startcode) {
        $user = auth()->user();
        $code = Startcode::where('code', $startcode)->first();
        if(!$code) {
            return redirect(route('dashboard.overview'))->with(['error' => 'Deze startcode bestaat niet.']);
        }
        if($code->users()->where('user_id', $user->id)->first()) {
            return redirect(route('dashboard.overview'))->with(['error' => 'Je hebt deze startcode al geclaimd.']);
        }
        $user->startcodes()->attach($code);
        $user->update([
            'saldo' => $user->saldo + $code->amount
        ]);
        return redirect(route('dashboard.overview'))->with(['success' => 'De startcode is geclaimd.']);
    }

    /**
     * Retrieve the deletion page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function delete() {
        $startcodes = Startcode::all();
        return view('startcodes.delete', compact('startcodes'));
    }

    public function destroy(Request $request) {
        $startcode = Startcode::where('id', $request->startcode_id)->first();
//        dd($request->startcode_id);
        if(!$startcode) {
            return redirect(route('dashboard.management'))->with(['error' => 'Deze startcode bestaat niet.']);
        }
        $startcode->users()->detach();
        $startcode->delete();
        return redirect(route('dashboard.management'))->with(['success' => 'De startcode is verwijderd.']);
    }

    /**
     * Go to the create page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create() {
        return view('startcodes.create');
    }

    public function store(Request $request) {
        $request->validate([
            'startcode_code' => 'required',
            'startcode_amount' => 'required|integer'
        ]);

        if(Startcode::where('code', $request->startcode_code)->first()) {
            return redirect(route('dashboard.startcodes.create'))->with(['error' => 'Deze startcode bestaat al.']);
        }

        Startcode::create([
            'code' => $request->startcode_code,
            'amount' => $request->startcode_amount
        ]);
        return redirect(route('dashboard.management'))->with(['success' => 'De startcode is aangemaakt.']);
    }

}
