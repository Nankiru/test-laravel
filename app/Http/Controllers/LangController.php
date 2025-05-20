<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class LangController extends Controller
{
    public function changeLanguage(Request $request)
    {

        //     $changelangs = $request->changelang;
        //     Session::put('locale',$changelangs);
        //  return redirect()->back();

        $changelang = $request->input('changelang');

        // Optional: Validate supported languages
        $supportedLocales = ['en', 'khmer', 'ch'];

        if (in_array($changelang, $supportedLocales)) {
            Session::put('locale', $changelang);
            app()->setLocale($changelang); // Optional if your middleware handles this
        }

        return redirect()->back();
    }
}
