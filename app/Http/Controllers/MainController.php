<?php

namespace App\Http\Controllers;

use App\Models\Monument;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        return view('main')->with([
            'categories' => Category::all(),
        ]);
    }

    public function monument($id)
    {
        return view('monument')->with([
            'monument' => Monument::find($id),
        ]);
    }

    public function getMonumentsByCathegoryId($id)
    {
      return view('monuments')->with([
        'monuments' => Category::find($id)->monuments()->get(),
      ]);
    }

    public function description($id)
    {
      $monument = Monument::find($id);
      return view('description')->with([
        'monument' => $monument,
        'detail_pictures' => $monument->detail_pictures()->get(),
      ]);
    }

    public function visit($id)
    {
      $user_id = Auth::id();

      DB::table('visited_monuments')
        ->where('monument_id', $id)
        ->where('user_id', $user_id)
        ->delete();

      return redirect('/')->with([
          DB::table('want_to_visits')->insert([
            'user_id' => $user_id,
            'monument_id' => $id,
          ]),
      ]);
    }

    public function visited($id)
    {
      $user_id = Auth::id();

      DB::table('want_to_visits')
        ->where('monument_id', $id)
        ->where('user_id', $user_id)
        ->delete();

      return redirect('/')->with([
          DB::table('visited_monuments')->insert([
            'user_id' => Auth::id(),
            'monument_id' => $id,
          ]),
      ]);
    }
}
