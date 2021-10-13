<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enjoythetrip\Interfaces\FrontendRepositoryInterface;
use App\Enjoythetrip\Gateways\FrontendGateway;

class FrontendController extends Controller
{

    public function __construct(FrontendRepositoryInterface $frontendRepository, FrontendGateway $frontendGateway)
    {
        $this->fR = $frontendRepository;
        $this->fG = $frontendGateway;
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

    public function object($id)
    {
        $object = $this->fR->getObject($id);
        //dd($object);
        return view('frontend.object', ['object'=>$object]);
    }

    public function person()
    {
        return view('frontend.person');
    }

    public function room(Request $request)
    {
        if($city = $this->fG->getSearchResults($request))
        {
            dd($city);
            return view('frontend.roomsearch',['city'=>$city]);
        } else {
            if (!$request->ajax())
            return redirect('/')->with('norooms', __('No offers were found matching the criteria'));
        }
    }

    public function roomsearch()
    {
        return view('frontend.roomsearch');
    }

    public function searchCities(Request $request)
    {
        $results = $this->fG->searchCities($request);

        return response()->json($results);
    }

    public function like($likeable_id, $type, Request $request)
    {
        $this->fR->like($likeable_id, $type, $request);

        return redirect()->back();
    }

    public function unlike($likeable_id, $type, Request $request)
    {
        $this->fR->unlike($likeable_id, $type, $request);

        return redirect()->back();
    }

}
