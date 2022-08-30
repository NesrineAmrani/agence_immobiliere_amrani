<?php

namespace App\Observers;

use App\Models\CitySector;
use App\Models\Terrain;

class TerrainObserver
{

    public function created(Terrain $terrain)
    {
        $city_sector = CitySector::find($terrain->city_sector_id);
        $city_sector->counter++;
        $city_sector->save();
    }

    public function deleted(Terrain $terrain)
    {
        $city_sector = CitySector::find($terrain->city_sector_id);
        $city_sector->counter--;
        $city_sector->save();
    }
}
