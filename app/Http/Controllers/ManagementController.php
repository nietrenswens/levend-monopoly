<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gebouw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ManagementController extends Controller
{

    public function index() {
        return view('management');
    }

    public function overview() {
        $gebouwen = Gebouw::get();
        $users = User::get();
        $users = $users->sortByDesc(function($user) {
            return $user->waarde();
        });
        return view('overview')->with(['gebouwen' => $gebouwen, 'users' => $users]);
    }

    public function dashboard() {
        $data = [$this->numUsers(), $this->numBuildings(), $this->numUsedChancecards()];
        return view('dashboard', compact('data'));
    }

    private function numUsers() {
        return User::get()->where('role', '=', 'gebruiker')->count();
    }

    private function numBuildings() {
        return Gebouw::get()->count();
    }

    private function numUsedChancecards() {
        return DB::table('used_chancecards')->count();
    }

}
