<?php

namespace App\Observers;

use App\Models\CitySector;
use App\Models\Maison;

class MaisonObserver
{

    public function created(Maison $maison)
    {
        $city_sector = CitySector::find($maison->city_sector_id);
        $city_sector->counter++;
        $city_sector->save();
    }

    public function deleted(Maison $maison)
    {
        $city_sector = CitySector::find($maison->city_sector_id);
        $city_sector->counter--;
        $city_sector->save();
    }
}
