<?php

namespace App\Observers;

use App\Models\CitySector;
use App\Models\Ferma;

class FermaObserver
{

    public function created(Ferma $ferma)
    {
        $city_sector = CitySector::find($ferma->city_sector_id);
        $city_sector->counter++;
        $city_sector->save();
    }

    public function deleted(Ferma $ferma)
    {
        $city_sector = CitySector::find($ferma->city_sector_id);
        $city_sector->counter--;
        $city_sector->save();
    }
}
