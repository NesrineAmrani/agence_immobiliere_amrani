<?php

namespace App\Observers;

use App\Models\Appartement;
use App\Models\CitySector;

class AppartementObserver
{

    public function created(Appartement $appartement)
    {
        $city_sector = CitySector::find($appartement->city_sector_id);
        $city_sector->counter++;
        $city_sector->save();
    }

    public function deleted(Appartement $appartement)
    {
        $city_sector = CitySector::find($appartement->city_sector_id);
        $city_sector->counter--;
        $city_sector->save();
    }

}
