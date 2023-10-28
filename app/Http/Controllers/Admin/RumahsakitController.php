<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rumahsakit;

class RumahsakitController extends Controller
{
    public function index()
    {
        $rumahsakit = Rumahsakit::all();

        return view("admin.Rumahsakit.index", ['rumahsakit' => $rumahsakit]);
    }

    public function show($nik)
    {
        $rumahsakit = Rumahsakit::where('nik',$nik)->first();

        return view('admin.Rumahsakit.show',['rumahsakit' => $rumahsakit]);
    }
}
