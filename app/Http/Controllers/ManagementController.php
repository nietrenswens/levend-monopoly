<?php

namespace App\Http\Controllers;

use App\Models\Gebouw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagementController extends Controller
{

    public function index() {
        return view('management');
    }

    public function overview() {
        $gebouwen = Gebouw::get();
        return view('overview')->with(compact('gebouwen'));
    }

}
