<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('types.create');
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
