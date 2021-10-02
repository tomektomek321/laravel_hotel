<?php

namespace App\Enjoythetrip\Repositories;

use App\TouristObject;
use App\Enjoythetrip\Interfaces\FrontendRepositoryInterface;

class FrontendRepository implements FrontendRepositoryInterface {

    public function getObjectsForMainPage()
    {
        return TouristObject::with(['city','photos'])->ordered()->paginate(8);
    }

    public function getObject($id)
    {
        return TouristObject::with(['city', 'photos', 'address', 'users.photos', 'rooms.   photos', 'comments.user', 'articles.user', 'rooms.object.city'])->find($id);
    }

    public function getSearchCities( string $term)
    {
        return City::where('name', 'LIKE', $term . '%')->get();
    }

}


