<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Element;

class SiteController extends Controller
{
    public function renderDemoPage(){
        $items_feature = Element::where('page', 'demo')->where('position', 'feature')->where('enabled', 1)->orderBy('sort', 'asc')->get();
        return view('demo', compact('items_feature'));
    }
}
