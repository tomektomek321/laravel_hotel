<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enjoythetrip\Repositories\FrontendRepository;

class FrontendController extends Controller
{

    public function __construct(FrontendRepository $frontendRepository)
    {
        $this->fR = $frontendRepository;
    }

    public function index()
    {
        $objects = $this->fR->getObjectsForMainPage();
        //dd($objects);
        return view('frontend.index', ['objects'=>$objects]);
    }

    public function article()
    {
        return view('frontend.article');
    }

    public function object()
    {
        return view('frontend.object');
    }

    public function person()
    {
        return view('frontend.person');
    }

    public function room()
    {
        return view('frontend.room');
    }

    public function roomsearch()
    {
        return view('frontend.roomsearch');
    }
}
