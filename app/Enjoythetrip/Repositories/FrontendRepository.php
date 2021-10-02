<?php

namespace App\Enjoythetrip\Repositories;

use App\TouristObject;

class FrontendRepository  {

    public function getObjectsForMainPage()
    {
        return TouristObject::all();
    }

}


