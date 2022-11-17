<?php

namespace App\Http\Controllers;

use App\Models\Chancecard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChanceController extends Controller
{

    public function index() {
        $users = User::where('role', '=', 'gebruiker')->get();
        return view('chance.index', compact('users'));
    }

    public function take(User $user) {
        if(DB::table('used_chancecards')->where('user_id', '=', $user->id)->count() >= 1) {
            $used_chancecards = DB::table('used_chancecards')->where('user_id', '=', $user->id)->orderBy('created_at', 'DESC')->first();
            // Check if the last used chancecard is older than 5 minutes
            if(time() - strtotime($used_chancecards->created_at) < 60) {
                return redirect(route('dashboard.management'))->with(['error' => 'Je moet even wachten voordat je weer een kanskaart kan pakken.']);
            }

        }
        $card = Chancecard::inRandomOrder()->first();
        DB::table('used_chancecards')->insert(['user_id' => $user->id, 'chancecard_id' => $card->id, 'created_at' => now()]);
        $user->update(['saldo'=>$user->saldo + $card->amount]);
        return view('chance.take')->with(['user' => $user, 'card' => $card]);
    }

}
