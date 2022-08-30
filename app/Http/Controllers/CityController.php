<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
//use RealRashid\SweetAlert\Facades\Alert;


class CityController extends Controller
{
    public function destroy(City $city)
    {
        $city->sectors()->delete();
        $city->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function update(Request $request, City $city)
    {
        try {

            $request->validate([
                'city_name_fr'                => 'required|string|max:255'
            ]);

            if( $city->update($request->all()) ){

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
                'city_name_fr'                => 'required|string|max:255'
            ]);

            $request->merge([
                'city_status' => 1,
                'is_default' => 0,
            ]);

            if( City::create($request->all()) ){

                return response()->json([
                    'success' => 'Record created successfully!'
                ]);
            }
        
        } catch (\Exception $e) {
        
            return $e->getMessage();
        }

    }
}
