<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function change($locale)
    {
        if (array_key_exists($locale, config('app.locales'))) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        }else{
            return 404;
        }
      
       // return App::getLocale();
        return redirect()->back();
    }
}
