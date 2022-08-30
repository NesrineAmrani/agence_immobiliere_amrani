<?php

namespace App\Observers;

use App\Models\CitySector;
use App\Models\LocalCommercial;

class LocalCommercialObserver
{

    public function created(LocalCommercial $localCommercial)
    {
        $city_sector = CitySector::find($localCommercial->city_sector_id);
        $city_sector->counter++;
        $city_sector->save();
    }

    public function deleted(LocalCommercial $localCommercial)
    {
        $city_sector = CitySector::find($localCommercial->city_sector_id);
        $city_sector->counter--;
        $city_sector->save();
    }
}
