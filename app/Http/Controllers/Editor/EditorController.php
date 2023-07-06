<?php

namespace App\Http\Controllers\Editor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditorController extends Controller
{
    public function editors_index()
    {
        $editeurs = User::where('role', 0)->get();     

        return view('back.pages.editors.index', compact('editeurs'));
    }
}
