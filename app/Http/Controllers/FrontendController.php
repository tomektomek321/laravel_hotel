<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enjoythetrip\Interfaces\FrontendRepositoryInterface;
use App\Enjoythetrip\Gateways\FrontendGateway;

class FrontendController extends Controller
{

    public function __construct(FrontendRepositoryInterface $frontendRepository, FrontendGateway $frontendGateway)
    {
        $this->middleware('auth')->only(['makeReservation','addComment','like','unlike']);

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
        $article = $this->fR->getArticle($id);
        return view('frontend.article',compact('article'));
    }

    public function object($id)
    {
        $object = $this->fR->getObject($id);
        //dd($object);
        return view('frontend.object', ['object'=>$object]);
    }

    public function person()
    {
        $user = $this->fR->getPerson($id);
        return view('frontend.person', ['user'=>$user]);
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

    public function addComment($commentable_id, $type, Request $request)
    {
        $this->fG->addComment($commentable_id, $type, $request);

        return redirect()->back();
    }

}
