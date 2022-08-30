<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Client;
use App\Models\ClientCategory;
use App\Models\ClientStatus;
use App\Models\Intermediaire;
use App\Models\Villa;
use App\Models\VillaService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VillaController extends Controller
{

    public function index()
    {
        return view('amrani.pages.villa.index')->with([
            'villas'           =>  Villa::all(),
            'services'          =>  VillaService::all(),
            'cities'            =>  City::all(),
            'situations'        =>  Villa::SITUATIONS,
        ]);
    }

    public function create()
    {
        $client = new ClientController;
        $lastID = 'VIL' . (Villa::max('id') + 1);
        return view('amrani.pages.villa.create')->with([
            'code_client'           =>  $client->newCodeClient(),
            'client_categories'     =>  ClientCategory::all(),
            'client_statuses'       =>  ClientStatus::all(),
            'services'              =>  VillaService::all(),
            'cities'                =>  City::all(),
            'facades'               =>  Villa::FACADES,
            'etats'                 =>  Villa::ETATS,
            'situations'            =>  Villa::SITUATIONS,
            'details'               =>  Villa::DETAILS,
            'villa_code'           =>  $lastID
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'villa_code'              => 'required|max:10',
            'client_name'          => 'required|string|max:255',
            'villa_service_id'         => 'required|integer|min:1'
        ]);
        $contacts = [];
        foreach($request->client_contact_name as $k=>$contact){
            if($contact){
                $contacts[] = [
                    "name"          =>  $contact,
                    "telephone"     =>  isset($request->client_contact_telephone[$k])? $request->client_contact_telephone[$k]:''
                ];               
            }

        }
        if($request->is_intermediaire){
            if(!$request->intermediaire_id){
                $intermediaireTemp = new IntermediaireController;
                $intermediaire = Intermediaire::create([
                    'intermediaire_name'            =>  $request->client_name,
                    'intermediaire_telephone'          =>  $request->client_telephone? $request->client_telephone: "",
                    'intermediaire_code'           =>  $intermediaireTemp->newCodeIntermediaire(),
                    'intermediaire_category_id'    =>  $intermediaireTemp->getDefaultIntermediaireCategory(),
                    'intermediaire_status_id'    =>  $intermediaireTemp->getDefaultIntermediaireStatus(),
                    'contacts'      =>  json_encode($contacts)
                ]);
                $request->merge([
                    'intermediaire_id' =>  $intermediaire->id
                ]);
            }  
        }else{
            if(!$request->client_id){
                $clientTemp = new ClientController;
                $client = Client::create([
                    'client_name'            =>  $request->client_name,
                    'client_telephone'          =>  $request->client_telephone? $request->client_telephone: "",
                    'client_code'           =>  $clientTemp->newCodeClient(),
                    'client_category_id'    =>  $clientTemp->getDefaultClientCategory(),
                    'client_status_id'    =>  $clientTemp->getDefaultClientStatus(),
                    'contacts'      =>  json_encode($contacts)
                ]);
                $request->merge([
                    'client_id' =>  $client->id
                ]);
            }            
        }

        $request->merge([
            'villa_details'    =>  isset($request->villa_details)? json_encode($request->villa_details): '',
            'city_id' => $request->city_id? $request->city_id:-1,
            'city_sector_id' => $request->city_sector_id? $request->city_sector_id:-1,
        ]);
        Villa::create($request->all());

        Alert::success('La villa a été ajouté!');

        return redirect()->route('villa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Villa  $villa
     * @return \Illuminate\Http\Response
     */
    public function show(Villa $villa)
    {
        //
    }

    public function edit(Villa $villa)
    {
        try {
            return view('amrani.pages.villa.edit')->with([
                'client_categories'     =>  ClientCategory::all(),
                'client_statuses'       =>  ClientStatus::all(),
                'services'              =>  VillaService::all(),
                'cities'                =>  City::all(),
                'facades'               =>  Villa::FACADES,
                'etats'                 =>  Villa::ETATS,
                'situations'            =>  Villa::SITUATIONS,
                'details'               =>  Villa::DETAILS,
                'villa'                =>  $villa
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function update(Request $request, Villa $villa)
    {
        $request->validate([
            'villa_code'                   => 'required|max:10',
            'client_name'               => 'required|string|max:255'
        ]);
        $request->merge([
            'villa_details'    =>  isset($request->villa_details)? json_encode($request->villa_details): '',
            'city_id' => $request->city_id? $request->city_id:-1,
            'city_sector_id' => $request->city_sector_id? $request->city_sector_id:-1,
        ]);
        $villa->update($request->all());

        Alert::success('La villa a été modifié!');

        return redirect()->route('villa.index');
    }


    public function destroy(Villa $villa)
    {
        $villa->delete();

        Alert::success('La villa a été supprimé!');

        return redirect()->route('villa.index');
    }

    public function filter(Request $request){
        try {

            $villas = Villa::with('service', 'city');

            if($request->req){
                $villas = $villas->where('villa_code', 'like', '%'.$request->req.'%');
            }

            if($request->villa_service_id){
                $villas = $villas->where('villa_service_id', '=', $request->villa_service_id);
            }

            if($request->villa_situation){
                $villas = $villas->where('villa_situation', '=', $request->villa_situation);
            }

            if($request->city_id){
                $villas = $villas->where('city_id', '=', $request->city_id);
            }

            if($request->city_sector_id){
                $villas = $villas->where('city_sector_id', '=', $request->city_sector_id);
            }

            $count = $villas->count();

            $page = isset($request->paginator['page'])? $request->paginator['page']*$request->paginator['pp']: 0;
            $pp = isset($request->paginator['pp'])? $request->paginator['pp']: 20;

            $villas = $villas->orderBy('created_at')->offset($page)->limit($pp)->get(); 

            $trs = "";
            foreach($villas as $index=>$villa){
                $trs .= view('amrani.pages.villa.partials.tr', ['villa'=>$villa, 'index'=>$page+$index]);
            }

            return response()->json([
                'success'   => $trs,
                'total'     =>  $villas->count() . ' / ' . $count
            ]);

        } catch (\Throwable $th) {
            return $th;
        }
    }
}
