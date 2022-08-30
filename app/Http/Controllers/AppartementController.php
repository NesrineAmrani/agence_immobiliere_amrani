<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\AppartementService;
use App\Models\City;
use App\Models\Client;
use App\Models\ClientCategory;
use App\Models\ClientStatus;
use App\Models\Intermediaire;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AppartementController extends Controller
{

    public function index()
    {
        return view('amrani.pages.appartement.index')->with([
            'appartements'      =>  Appartement::orderBy('created_at')->offset(0)->limit(20)->get(),
            'services'          =>  AppartementService::all(),
            'cities'            =>  City::all(),
            'situations'        =>  Appartement::SITUATIONS,
        ]);
    }

    public function create()  
    {   
        $client = new ClientController;
        $lastID = 'APP' . (Appartement::max('id') + 1);
        return view('amrani.pages.appartement.create')->with([
            'code_client'           =>  $client->newCodeClient(),
            'client_categories'     =>  ClientCategory::all(),
            'client_statuses'       =>  ClientStatus::all(),
            'services'              =>  AppartementService::all(),
            'cities'                =>  City::all(),
            'facades'               =>  Appartement::FACADES,
            'etats'                 =>  ['Nouveau', 'Déjà Utilisé'],
            'types'                 =>  ['Appartement', 'Duplexe', 'Triplexe'],
            'situations'            =>  Appartement::SITUATIONS,
            'code_appartement'      =>  $lastID
        ]);
    }


    public function store(Request $request)
    {

        $request->validate([
            'appartement_code'           => 'required|max:10',
            'client_name'                => 'required|string|max:255',
            'appartement_service_id'     => 'required|integer|min:1'
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
            if($request->intermediaire_id == 0){
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
            if($request->client_id == 0){
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
            'appartements_en_etage' => $request->appartements_en_etage? $request->appartements_en_etage:0,
            'city_id' => $request->city_id? $request->city_id:-1,
            'city_sector_id' => $request->city_sector_id? $request->city_sector_id:-1,
        ]);
        Appartement::create($request->all());

        Alert::success('L\'appartement a été ajouté!');

        return redirect()->route('appartement.index');
    }

    public function show(Appartement $appartement)
    {
        //
    }

    public function edit(Appartement $appartement)
    {
        return view('amrani.pages.appartement.edit')->with([
            'client_categories'     =>  ClientCategory::all(),
            'client_statuses'       =>  ClientStatus::all(),
            'services'              =>  AppartementService::all(),
            'cities'                =>  City::all(),
            'facades'               =>  Appartement::FACADES,
            'etats'                 =>  ['Nouveau', 'Déjà Utilisé'],
            'types'                 =>  ['Appartement', 'Duplexe', 'Triplexe'],
            'situations'            =>  Appartement::SITUATIONS,
            'appartement'        =>  $appartement
        ]);
    }

    public function update(Request $request, Appartement $appartement)
    {
        $request->validate([
            'appartement_code'           => 'required|max:10',
            'client_name'                => 'required|string|max:255'
        ]);
        $request->merge([
            'appartements_en_etage' => $request->appartements_en_etage? $request->appartements_en_etage:0,
            'is_demande' => $request->is_demande? true:false,
        ]);
        $appartement->update($request->all());

        Alert::success('L\'appartement a été modifié!');

        return redirect()->route('appartement.index');
    }

    public function destroy(Appartement $appartement)
    {
        $appartement->delete();

        Alert::success('L\'appartement a été supprimé!');

        return redirect()->route('appartement.index');
    }

    public function filter(Request $request){
        try {

            $appartements = Appartement::with('service', 'city');

            if($request->req){
                $appartements = $appartements->where('appartement_code', 'like', '%'.$request->req.'%');
            }

            if($request->appartement_service_id){
                $appartements = $appartements->where('appartement_service_id', '=', $request->appartement_service_id);
            }

            if($request->appartement_situation){
                $appartements = $appartements->where('appartement_situation', '=', $request->appartement_situation);
            }

            if($request->city_id){
                $appartements = $appartements->where('city_id', '=', $request->city_id);
            }

            if($request->city_sector_id){
                $appartements = $appartements->where('city_sector_id', '=', $request->city_sector_id);
            }

            $count = $appartements->count();

            $page = isset($request->paginator['page'])? $request->paginator['page']*$request->paginator['pp']: 0;
            $pp = isset($request->paginator['pp'])? $request->paginator['pp']: 20;

            $appartements = $appartements->orderBy('created_at')->offset($page)->limit($pp)->get(); 

            $trs = "";
            foreach($appartements as $index=>$appartement){
                $trs .= view('amrani.pages.appartement.partials.tr', ['appartement'=>$appartement, 'index'=>$page+$index]);
            }

            return response()->json([
                'success'   => $trs,
                'total'     =>  $appartements->count() . ' / ' . $count
            ]);

        } catch (\Throwable $th) {
            return $th;
        }

    }


}
