<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        return view('web.index');
    }

    public function about()
    {
        return view('web.about');
    }

    public function features()
    {
        return view('web.features');
    }

    public function pricing()
    {
        return view('web.pricing');
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function termsAndConditions()
    {
        return view('web.terms-and-conditions');
    }

    public function privacyPolicy()
    {
        return view('web.privacy-policy');
    }

    public function individualPricing()
    {
        return redirect('pricing', 301);
        return view('web.individual-pricing');
    }

    public function groupPricing()
    {
        return redirect('pricing', 301);
        return view('web.group-pricing');
    }

}
