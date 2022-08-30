<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CitySector;
use Illuminate\Http\Request;
//use RealRashid\SweetAlert\Facades\Alert;


class CitySectorController extends Controller
{

    public function getByCity($id_city){
        $city = City::with('sectors')->find($id_city)->toArray();
        if($city){
            return $city['sectors'];
        }
        return [];
    }

    public function destroy(CitySector $sector)
    {
        try {
            $sector->delete();

            //Alert::success('Le secteur a été supprimé!');

            return response()->json([
                'success' => 'Record deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Request $request, CitySector $sector)
    {
        try {

            $request->validate([
                'city_sector_name_fr'                => 'required|string|max:255'
            ]);
            
            if( $sector->update($request->all()) ){

                //Alert::success('Le secteur a été modifié!');

                return response()->json([
                    'success' => 'Record updated successfully!'
                ]);
            }
        
        } catch (\Exception $e) {
        
            return $e->getMessage();
        }

    }

    public function create(Request $request)
    {
        try {

            $request->validate([
                'city_sector_name_fr'                => 'required|string|max:255',
                'city_id'                => 'required|integer|min:1',
            ]);

            $request->merge([
                'city_sector_status' => 1,
            ]);

            if( CitySector::create($request->all()) ){

                //Alert::success('Le secteur a été ajouté!');

                return response()->json([
                    'success' => 'Record created successfully!'
                ]);
            }
        
        } catch (\Exception $e) {
        
            return $e->getMessage();
        }

    }

    public function lastSector(Request $request){
        try {
            $sector = CitySector::where('city_id', $request->city_id)->orderBy('id', 'desc')->first();

            return view( 'amrani.pages.parameters.city_sector.item', ['sectors'=>[$sector]] );
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

    }
}
