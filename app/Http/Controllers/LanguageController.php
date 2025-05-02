<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request){

        $langs = $request->lang;
        Session::put('locale',$langs);
     return redirect()->back();
    }
}
