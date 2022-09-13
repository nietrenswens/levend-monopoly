<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementController extends Controller
{

    $gebouwen = Gebouwen::get();

    public function index() {
        return view('management');
    }

    public function overview() {
        return view('overview', compact(''));
    }

}
