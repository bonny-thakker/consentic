<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Carbon\Carbon;

trait SearchFilters
{

    protected $filter_consent = 'all';
    protected $filter_consent_type = 'all';

    protected function setFilters(Request $request, $filterPage)
    {

        if ($request->filter_consent || $request->isMethod('post')) {
            $this->filter_consent = $request->consent;
            $request->session()->put('app.page.'.$filterPage.'.filter.filter_consent', $request->consent);
        } else {
            if ($request->session()->has('app.page.'.$filterPage.'.filter.filter_consent')) {
                $this->filter_consent = $request->session()->get('app.page.'.$filterPage.'.filter.filter_consent');
            }
        }

        if ($request->filter_consent_type || $request->isMethod('post')) {
            $this->filter_consent_type = $request->consent_type;
            $request->session()->put('app.page.'.$filterPage.'.filter.filter_consent_type', $request->consent_type);
        } else {
            if ($request->session()->has('app.page.'.$filterPage.'.filter.filter_consent_type')) {
                $this->filter_consent_type = $request->session()->get('app.page.'.$filterPage.'.filter.filter_consent_type');
            }
        }

    }

}