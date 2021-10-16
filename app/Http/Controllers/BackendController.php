<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Enjoythetrip\Interfaces\BackendRepositoryInterface;
use App\Enjoythetrip\Gateways\BackendGateway;

class BackendController extends Controller
{
    use \App\Enjoythetrip\Traits\Ajax;

    public function __construct(BackendGateway $backendGateway, BackendRepositoryInterface $backendRepository)
    {
        $this->bG = $backendGateway;
        $this->bR = $backendRepository;
    }


    public function index(Request $request)
    {
        $objects = $this->bG->getReservations($request);
        return view('backend.index',['objects'=>$objects]);
    }

    public function cities()
    {
        return view('backend.cities');
    }

    public function myobjects()
    {
        return view('backend.myobjects');
    }

    public function profile()
    {
        return view('backend.profile');
    }

    public function saveobject()
    {
        return view('backend.saveobject');
    }

    public function saveroom()
    {
        return view('backend.saveroom');
    }
}
