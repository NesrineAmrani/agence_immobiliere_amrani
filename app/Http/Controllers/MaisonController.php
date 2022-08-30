<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Client;
use App\Models\ClientCategory;
use App\Models\ClientStatus;
use App\Models\Intermediaire;
use App\Models\Maison;
use App\Models\MaisonService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MaisonController extends Controller
{

    public function index()
    {
        return view('amrani.pages.maison.index')->with([
            'maisons'           =>  Maison::all(),
            'services'          =>  MaisonService::all(),
            'cities'            =>  City::all(),
            'situations'        =>  Maison::SITUATIONS,
        ]);
    }

    public function create()
    {
        $client = new ClientController;
        $lastID = 'MAI' . (Maison::max('id') + 1);
        return view('amrani.pages.maison.create')->with([
            'code_client'           =>  $client->newCodeClient(),
            'client_categories'     =>  ClientCategory::all(),
            'client_statuses'       =>  ClientStatus::all(),
            'services'              =>  MaisonService::all(),
            'cities'                =>  City::all(),
            'facades'               =>  Maison::FACADES,
            'etats'                 =>  Maison::ETATS,
            'situations'            =>  Maison::SITUATIONS,
            'details'               =>  Maison::DETAILS,
            'maison_code'           =>  $lastID
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'maison_code'              => 'required|max:10',
            'client_name'          => 'required|string|max:255',
            'maison_service_id'         => 'required|integer|min:1'
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
            'maison_details'    =>  isset($request->maison_details)? json_encode($request->maison_details): '',
            'city_id' => $request->city_id? $request->city_id:-1,
            'city_sector_id' => $request->city_sector_id? $request->city_sector_id:-1,
        ]);
        Maison::create($request->all());

        Alert::success('La maison a été ajouté!');

        return redirect()->route('maison.index');
    }


    public function show(Maison $maison)
    {
        //
    }

    public function edit(Maison $maison)
    {
        try {
            return view('amrani.pages.maison.edit')->with([
                'client_categories'     =>  ClientCategory::all(),
                'client_statuses'       =>  ClientStatus::all(),
                'services'              =>  MaisonService::all(),
                'cities'                =>  City::all(),
                'facades'               =>  Maison::FACADES,
                'etats'                 =>  Maison::ETATS,
                'situations'            =>  Maison::SITUATIONS,
                'details'               =>  Maison::DETAILS,
                'maison'                =>  $maison
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function update(Request $request, Maison $maison)
    {
        $request->validate([
            'maison_code'                   => 'required|max:10',
            'client_name'               => 'required|string|max:255'
        ]);
        $request->merge([
            'maison_details'    =>  isset($request->maison_details)? json_encode($request->maison_details): '',
            'city_id' => $request->city_id? $request->city_id:-1,
            'city_sector_id' => $request->city_sector_id? $request->city_sector_id:-1,
        ]);
        $maison->update($request->all());

        Alert::success('La maison a été modifié!');

        return redirect()->route('maison.index');
    }

    public function destroy(Maison $maison)
    {
        $maison->delete();

        Alert::success('La maison a été supprimé!');

        return redirect()->route('maison.index');
    }


    public function filter(Request $request){
        try {

            $maisons = Maison::with('service', 'city');

            if($request->req){
                $maisons = $maisons->where('maison_code', 'like', '%'.$request->req.'%');
            }

            if($request->maison_service_id){
                $maisons = $maisons->where('maison_service_id', '=', $request->maison_service_id);
            }

            if($request->maison_situation){
                $maisons = $maisons->where('maison_situation', '=', $request->maison_situation);
            }

            if($request->city_id){
                $maisons = $maisons->where('city_id', '=', $request->city_id);
            }

            if($request->city_sector_id){
                $maisons = $maisons->where('city_sector_id', '=', $request->city_sector_id);
            }

            $count = $maisons->count();

            $page = isset($request->paginator['page'])? $request->paginator['page']*$request->paginator['pp']: 0;
            $pp = isset($request->paginator['pp'])? $request->paginator['pp']: 20;

            $maisons = $maisons->orderBy('created_at')->offset($page)->limit($pp)->get(); 

            $trs = "";
            foreach($maisons as $index=>$maison){
                $trs .= view('amrani.pages.maison.partials.tr', ['maison'=>$maison, 'index'=>$page+$index]);
            }

            return response()->json([
                'success'   => $trs,
                'total'     =>  $maisons->count() . ' / ' . $count
            ]);

        } catch (\Throwable $th) {
            return $th;
        }
    }
}
