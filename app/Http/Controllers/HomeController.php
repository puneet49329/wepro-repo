<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = Api::with('like')->where('title', 'like', '%' . $request->s . '%')->get();
        return view('home.index', compact('data'));
    }
    public function publicApi()
    {
        $data = json_decode(Http::get('https://api.publicapis.org/entries'));
        foreach ($data->entries as $key => $value) {
            if ($key > 30) break;
            Api::create([
                "title" => $value->API,
                "description" => $value->Description,
                "category" => $value->Category,
                "link" => $value->Link
            ]);
        }

        return redirect('/');
    }
    public function like(Request $request)
    {
        $like = Like::where( "api_id", $request->id);
        $response = 0;

        if ($like->first()) {
            $like->delete();
        } else {
            Like::create([
                "api_id" => $request->id
            ]);
            $response = 1;
        }

        return response()->json($response);
    }
    public function likes()
    {
        $data = Like::with('apis')->get();
        return view('home.like', compact('data'));
    }
}
