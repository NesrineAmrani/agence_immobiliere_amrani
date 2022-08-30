<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Client;
use App\Models\ClientCategory;
use App\Models\ClientStatus;
use App\Models\Ferma;
use App\Models\FermaService;
use App\Models\Intermediaire;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class FermaController extends Controller
{
    public function index()
    {
        return view('amrani.pages.ferma.index')->with([
            'fermas'           =>  Ferma::all(),
            'services'          =>  FermaService::all(),
            'cities'            =>  City::all(),
            'situations'        =>  Ferma::SITUATIONS,
        ]);
    }

    public function create()
    {
        $client = new ClientController;
        $lastID = 'FER' . (Ferma::max('id') + 1);
        return view('amrani.pages.ferma.create')->with([
            'code_client'           =>  $client->newCodeClient(),
            'client_categories'     =>  ClientCategory::all(),
            'client_statuses'       =>  ClientStatus::all(),
            'services'              =>  FermaService::all(),
            'cities'                =>  City::all(),
            'facades'               =>  Ferma::FACADES,
            'etats'                 =>  Ferma::ETATS,
            'situations'            =>  Ferma::SITUATIONS,
            'details'               =>  Ferma::DETAILS,
            'ferma_code'           =>  $lastID
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ferma_code'              => 'required|max:10',
            'client_name'          => 'required|string|max:255',
            'ferma_service_id'         => 'required|integer|min:1'
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
            'ferma_details'    =>  isset($request->ferma_details)? json_encode($request->ferma_details): '',
            'city_id' => $request->city_id? $request->city_id:-1,
            'city_sector_id' => $request->city_sector_id? $request->city_sector_id:-1,
        ]);
        Ferma::create($request->all());

        Alert::success('La ferme a été ajouté!');

        return redirect()->route('ferma.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ferma  $ferma
     * @return \Illuminate\Http\Response
     */
    public function show(Ferma $ferma)
    {
        //
    }

    public function edit(Ferma $ferma)
    {
        try {
            return view('amrani.pages.ferma.edit')->with([
                'client_categories'     =>  ClientCategory::all(),
                'client_statuses'       =>  ClientStatus::all(),
                'services'              =>  FermaService::all(),
                'cities'                =>  City::all(),
                'facades'               =>  Ferma::FACADES,
                'etats'                 =>  Ferma::ETATS,
                'situations'            =>  Ferma::SITUATIONS,
                'details'               =>  Ferma::DETAILS,
                'ferma'                =>  $ferma
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function update(Request $request, Ferma $ferma)
    {
        $request->validate([
            'ferma_code'                   => 'required|max:10',
            'client_name'               => 'required|string|max:255'
        ]);
        $request->merge([
            'ferma_details'    =>  isset($request->ferma_details)? json_encode($request->ferma_details): '',
            'city_id' => $request->city_id? $request->city_id:-1,
            'city_sector_id' => $request->city_sector_id? $request->city_sector_id:-1,
        ]);
        $ferma->update($request->all());

        Alert::success('La ferme a été modifié!');

        return redirect()->route('ferma.index');
    }


    public function destroy(Ferma $ferma)
    {
        $ferma->delete();

        Alert::success('La ferme a été supprimé!');

        return redirect()->route('ferma.index');
    }

    public function filter(Request $request){
        try {

            $fermas = Ferma::with('service', 'city');

            if($request->req){
                $fermas = $fermas->where('ferma_code', 'like', '%'.$request->req.'%');
            }

            if($request->ferma_service_id){
                $fermas = $fermas->where('ferma_service_id', '=', $request->ferma_service_id);
            }

            if($request->ferma_situation){
                $fermas = $fermas->where('ferma_situation', '=', $request->ferma_situation);
            }

            if($request->city_id){
                $fermas = $fermas->where('city_id', '=', $request->city_id);
            }

            if($request->city_sector_id){
                $fermas = $fermas->where('city_sector_id', '=', $request->city_sector_id);
            }

            $count = $fermas->count();

            $page = isset($request->paginator['page'])? $request->paginator['page']*$request->paginator['pp']: 0;
            $pp = isset($request->paginator['pp'])? $request->paginator['pp']: 20;

            $fermas = $fermas->orderBy('created_at')->offset($page)->limit($pp)->get(); 

            $trs = "";
            foreach($fermas as $index=>$ferma){
                $trs .= view('amrani.pages.ferma.partials.tr', ['ferma'=>$ferma, 'index'=>$page+$index]);
            }

            return response()->json([
                'success'   => $trs,
                'total'     =>  $fermas->count() . ' / ' . $count
            ]);

        } catch (\Throwable $th) {
            return $th;
        }
    }
}
