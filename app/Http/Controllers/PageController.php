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

    public function team()
    {
        return view('web.team');
    }

    public function features()
    {
        return redirect('benefits', 301);
    }


    public function benefits()
    {
        return view('web.benefits');
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

    public function faq()
    {
        return view('web.faq');
    }

    public function registerCoupon(Request $request)
    {
        switch($request->id){

            case "coupon50":

                // Add the coupon to the session
                session(['coupon' => 'coupon50']);
                return redirect('register');

                break;

            default:

                abort(404);

        }
    }

    public function registerCouponUnset(Request $request)
    {
        session()->forget('coupon');
        return redirect('register');
    }


}
