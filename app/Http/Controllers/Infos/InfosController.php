<?php

namespace App\Http\Controllers\Infos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfosController extends Controller
{
    public function about()
    {
        return view('front.pages.infos.about');
    }

    public function faq()
    {
        return view('front.pages.infos.faq');
    }

    public function ccm()
    {
        return view('front.pages.infos.ccm');
    }
}
