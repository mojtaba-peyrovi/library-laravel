<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    public function create()
    {
        $types = Type::all();
        // $types = Type::where('color', '=', Input::get('color'))->first();
        return view('types.create', compact('types'));
    }

    public function store(Request $request)
    {
        Type::create([
            'title' => request('title'),
            'color' => request('color')
        ]);

        return back();
    }
}
