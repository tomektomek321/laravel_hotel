<?php

namespace App\Enjoythetrip\Interfaces;

interface BackendRepositoryInterface {

    function getOwnerReservations($request);

    function getTouristReservations($request);

}


