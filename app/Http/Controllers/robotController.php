<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use MadWeb\Robots\Robots;

class robotController extends Controller
{
    /**
     * Generate robots.txt
     */
    public function index(Robots $robots)
    {
        $robots->addUserAgent('*');

        if ($robots->shouldIndex()) {
            // If on the live server, serve a nice, welcoming robots.txt.
            $robots->addDisallow('/admin');
            $robots->addSitemap('sitemap.xml');
        } else {
            // If you're on any other server, tell everyone to go away.
            $robots->addDisallow('/');
        }

        return response($robots->generate(), 200, ['Content-Type' => 'text/plain']);
    }
}