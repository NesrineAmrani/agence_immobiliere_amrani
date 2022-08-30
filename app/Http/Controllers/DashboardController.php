<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\CitySector;
use App\Models\Client;
use App\Models\Ferma;
use App\Models\Intermediaire;
use App\Models\LocalCommercial;
use App\Models\Maison;
use App\Models\Terrain;
use App\Models\Villa;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function index()
    {
        return view('amrani.dashboard.index')->with([
            'activities'    =>  Activity::orderBy('created_at', 'desc')->paginate(5)
        ]);
    }

    public function activity()
    {
        $actions = [
            'created'   =>  '<i class="fas fa-plus text-green-400 text-xl"></i> Ajout',
            'updated'   =>  '<i class="fas fa-pencil text-blue-400 text-xl"></i> Modification',
            'deleted'   =>  '<i class="fas fa-trash text-red-700 text-xl"></i> Suppression',
        ];
        $colors = [
            'created'   =>  'bg-green-50',
            'updated'   =>  'bg-blue-50',
            'deleted'   =>  'bg-red-50',
        ];
        return view('amrani.pages.activity.log')->with([
            'activities'    =>  Activity::orderBy('created_at', 'desc')->get(),
            'actions'       =>  $actions,
            'colors'       =>  $colors
        ]);
    }

    public function getTotals(){
        $totals = [
            'total_clients'          =>   Client::count(),
            'total_intermediaires'   =>   Intermediaire::count(),
            'total_appartements'     =>   Appartement::count(),
            'total_terrains'         =>   Terrain::count(),
            'total_lcs'              =>   LocalCommercial::count(),
            'total_maisons'          =>   Maison::count(),
            'total_villas'           =>   Villa::count(),
            'total_fermas'           =>   Ferma::count()
        ];
        return $totals;
    }

    public function topTenCitySectors(){
        return CitySector::orderBy('counter', 'desc')->take(10)->get(['city_sector_name_fr', 'counter']);
    }


    public function cityCounter(){
        foreach(Appartement::all() as $appartement){
            if($appartement->city_sector_id !== -1){
                $city_sector = CitySector::find($appartement->city_sector_id);
                $city_sector->counter++;
                $city_sector->save();
            }
        }

        foreach(Terrain::all() as $terrain){
            if($terrain->city_sector_id !== -1){
                $city_sector = CitySector::find($terrain->city_sector_id);
                $city_sector->counter++;
                $city_sector->save();
            }
        }

        foreach(Maison::all() as $maison){
            if($maison->city_sector_id !== -1){
                $city_sector = CitySector::find($maison->city_sector_id);
                $city_sector->counter++;
                $city_sector->save();
            }
        }

        foreach(LocalCommercial::all() as $lc){
            if($lc->city_sector_id !== -1){
                $city_sector = CitySector::find($lc->city_sector_id);
                $city_sector->counter++;
                $city_sector->save();
            }
        }

        foreach(Villa::all() as $villa){
            if($villa->city_sector_id !== -1){
                $city_sector = CitySector::find($villa->city_sector_id);
                $city_sector->counter++;
                $city_sector->save();
            }
        }

        foreach(Ferma::all() as $ferma){
            if($ferma->city_sector_id !== -1){
                $city_sector = CitySector::find($ferma->city_sector_id);
                $city_sector->counter++;
                $city_sector->save();
            }
        }

        return 'success';
    }
}
