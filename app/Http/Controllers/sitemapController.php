<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Spot;

class sitemapController extends Controller
{

    public function index(){
        $post = spot::orderBy('created_at', 'desc')->get();

        return response()->view('sitemap/index', [
            'post' => $post
        ])->header('Content-Type', 'text/xml');
    }

}