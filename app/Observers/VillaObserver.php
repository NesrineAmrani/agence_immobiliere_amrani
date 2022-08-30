<?php

namespace App\Observers;

use App\Models\CitySector;
use App\Models\Villa;

class VillaObserver
{

    public function created(Villa $villa)
    {
        $city_sector = CitySector::find($villa->city_sector_id);
        $city_sector->counter++;
        $city_sector->save();
    }

    public function deleted(Villa $villa)
    {
        $city_sector = CitySector::find($villa->city_sector_id);
        $city_sector->counter--;
        $city_sector->save();
    }
}
