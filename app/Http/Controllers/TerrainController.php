<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Client;
use App\Models\Terrain;
use App\Models\TerrainService;
use App\Models\ClientCategory;
use App\Models\ClientStatus;
use App\Models\Intermediaire;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TerrainController extends Controller
{

    public function index()
    {
        return view('amrani.pages.terrain.index')->with([
            'terrains'          =>  Terrain::all(),
            'services'          =>  TerrainService::all(),
            'cities'            =>  City::all(),
            'situations'        =>  Terrain::SITUATIONS,
        ]);
    }

    public function create()
    {
        $client = new ClientController;
        $lastID = 'TER' . (Terrain::max('id') + 1);
        return view('amrani.pages.terrain.create')->with([
            'code_client'           =>  $client->newCodeClient(),
            'client_categories'     =>  ClientCategory::all(),
            'client_statuses'       =>  ClientStatus::all(),
            'services'              =>  TerrainService::all(),
            'cities'                =>  City::all(),
            'facades'               =>  Terrain::$FACADES,
            'etats'                 =>  Terrain::$ETATS,
            'situations'            =>  Terrain::SITUATIONS,
            'recules'               =>  Terrain::$RECULES,
            'terrain_code'          =>  $lastID
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'terrain_code'              => 'required|max:10',
            'client_name'                => 'required|string|max:255',
            'terrain_service_id'     => 'required|integer|min:1'
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
        //dd(json_encode($request->terrain_recule));

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
                    'city_id' => $request->city_id? $request->city_id:-1,
                    'city_sector_id' => $request->city_sector_id? $request->city_sector_id:-1,
                    'client_id' =>  $client->id
                ]);
            }            
        }

        $request->merge([
            'terrain_recule'    =>  isset($request->terrain_recule)? json_encode($request->terrain_recule): '',
            'city_id' => $request->city_id? $request->city_id:-1,
            'city_sector_id' => $request->city_sector_id? $request->city_sector_id:-1,
        ]);
        Terrain::create($request->all());

        Alert::success('Le terrain a été ajouté!');

        return redirect()->route('terrain.index');
    }

    public function show(Terrain $terrain)
    {
        //
    }

    public function edit(Terrain $terrain)
    {
        return view('amrani.pages.terrain.edit')->with([
            'client_categories'     =>  ClientCategory::all(),
            'client_statuses'       =>  ClientStatus::all(),
            'services'              =>  TerrainService::all(),
            'cities'                =>  City::all(),
            'facades'               =>  Terrain::$FACADES,
            'etats'                 =>  Terrain::$ETATS,
            'situations'            =>  Terrain::SITUATIONS,
            'recules'               =>  Terrain::$RECULES,
            'terrain'           =>  $terrain
        ]);
    }

    public function update(Request $request, Terrain $terrain)
    {
        $request->validate([
            'terrain_code'           => 'required|max:10',
            'client_name'                => 'required|string|max:255'
        ]);
        $request->merge([
            'terrain_recule'    =>  isset($request->terrain_recule)? json_encode($request->terrain_recule): '',
            'terrains_en_etage' => $request->terrains_en_etage? $request->terrains_en_etage:0,
            'is_demande' => $request->is_demande? true:false,
        ]);
        $terrain->update($request->all());

        Alert::success('Le terrain a été modifié!');

        return redirect()->route('terrain.index');

    }

    public function destroy(Terrain $terrain)
    {
        $terrain->delete();

        Alert::success('Le terrain a été supprimé!');

        return redirect()->route('terrain.index');
    }

    public function filter(Request $request){
        try {

            $terrains = Terrain::with('service', 'city');

            if($request->req){
                $terrains = $terrains->where('terrain_code', 'like', '%'.$request->req.'%');
            }

            if($request->terrain_service_id){
                $terrains = $terrains->where('terrain_service_id', '=', $request->terrain_service_id);
            }

            if($request->terrain_situation){
                $terrains = $terrains->where('terrain_situation', '=', $request->terrain_situation);
            }

            if($request->city_id){
                $terrains = $terrains->where('city_id', '=', $request->city_id);
            }

            if($request->city_sector_id){
                $terrains = $terrains->where('city_sector_id', '=', $request->city_sector_id);
            }

            $count = $terrains->count();

            $page = isset($request->paginator['page'])? $request->paginator['page']*$request->paginator['pp']: 0;
            $pp = isset($request->paginator['pp'])? $request->paginator['pp']: 20;

            $terrains = $terrains->orderBy('created_at')->offset($page)->limit($pp)->get(); 

            $trs = "";
            foreach($terrains as $index=>$terrain){
                $trs .= view('amrani.pages.terrain.partials.tr', ['terrain'=>$terrain, 'index'=>$page+$index]);
            }

            return response()->json([
                'success'   => $trs,
                'total'     =>  $terrains->count() . ' / ' . $count
            ]);

        } catch (\Throwable $th) {
            return $th;
        }

    }
}
