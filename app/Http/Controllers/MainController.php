<?php

namespace App\Http\Controllers;

use App\Models\Monument;
use Illuminate\Http\Request;
use App\Models\Region;

class MainController extends Controller
{
    public function index()
    {
        return view('main')->with([
            'regions' => Region::all(),
        ]);
    }

    public function region($id)
    {
        return view('region')->with([
            'region' => Region::find($id),
        ]);
    }
    public function monument($id)
    {
        return view('monument')->with([
            'monument' => Monument::find($id),
        ]);
    }

}
