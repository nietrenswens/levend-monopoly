<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function index() {
        $users = User::where('role', '=', 'gebruiker')->get();
        return view('tax.index', compact('users'));
    }

    public function manage(User $user) {
        return view('tax.manage', compact('user'));
    }
}
