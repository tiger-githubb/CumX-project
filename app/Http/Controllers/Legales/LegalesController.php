<?php

namespace App\Http\Controllers\Legales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LegalesController extends Controller
{
    public function termes()
    {
        return view('front.pages.legales.termes');
    }

    public function securite()
    {
        return view('front.pages.legales.securite');
    }

    public function confidentialite()
    {
        return view('front.pages.legales.confidentialite');
    }
}
