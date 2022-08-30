<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Client;
use App\Models\ClientCategory;
use App\Models\ClientStatus;
use App\Models\Intermediaire;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{

    public function index()
    {
        return view('amrani.pages.client.index')->with([
            'clients'       =>  Client::orderBy('client_name')->paginate(20),
            'categories'    =>  ClientCategory::all(),
            'cities'        =>  City::all()
        ]);
    }

    public function create()
    {
        return view('amrani.pages.client.create')->with([
            'categories'    =>  ClientCategory::all(),
            'statuses'      =>  ClientStatus::all(),
            'cities'        =>  City::all(),
            'code_client'   =>  $this->newCodeClient()
        ]);
    }

    public function store(Request $request)
    {
        

        $request->validate([
            'client_code'           => 'required|max:10',
            'client_name'           => 'required|max:255',
            'client_category_id'    => 'required',
            'client_status_id'      => 'required'
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
        $request->merge([
            'client_city_id' =>  isset($request->city_id)? $request->city_id:0,
            'client_city_sector_id' =>  isset($request->city_sector_id)? $request->city_sector_id:0,
            'contacts'      =>  json_encode($contacts)
        ]);
        Client::create($request->all());

        Alert::success('Le client a été ajouté!');

        return redirect()->route('client.index');
    }

    public function show(Client $client)
    {
        //
    }

    public function edit(Client $client)
    {
        return view('amrani.pages.client.edit')->with([
            'categories'    =>  ClientCategory::all(),
            'statuses'      =>  ClientStatus::all(),
            'cities'        =>  City::all(),
            'client'        =>  $client
        ]);
    }


    public function update(Request $request, Client $client)
    {
        $request->validate([
            'client_code'           => 'required|max:10',
            'client_name'           => 'required|max:255',
            'client_category_id'    => 'required',
            'client_status_id'      => 'required'
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
        $request->merge([
            'client_city_id' =>  isset($request->city_id)? $request->city_id:0,
            'client_city_sector_id' =>  isset($request->city_sector_id)? $request->city_sector_id:0,
            'contacts'      =>  json_encode($contacts)
        ]);
        $client->update($request->all());

        Alert::success('Le client a été modifié!');

        return redirect()->route('client.index');
    }


    public function destroy(Client $client)
    {

        if($client->appartements->count() == 0)
            $client->delete();

        Alert::success('Le client a été supprimé!');

        return redirect()->route('client.index');
    }

    public function newCodeClient(){
        return 'CL' . (Client::max('id') + 1);
    }

    public function getDefaultClientCategory(){
        $cc_default = ClientCategory::where('is_default', 1)->first();
        return $cc_default->id;
    }

    public function getDefaultClientStatus(){
        $cs_default = ClientStatus::where('is_default', 1)->first();
        return $cs_default->id;
    }

    public function search(Request $request){
        $str = addslashes( $request->req );
        if($request->is_intermediaire)
            return Intermediaire::with('category', 'status')->where('intermediaire_name', 'like', '%'.$str.'%')->get()->toJson();
        else
            return Client::with('category', 'status')->where('client_name', 'like', '%'.$str.'%')->get()->toJson();
    }

    public function filter(Request $request){
        try {

            $clients = Client::with('category', 'status');

            if($request->req){
                $clients = $clients->where('client_name', 'like', '%'.$request->req.'%');
            }

            if($request->client_category_id){
                $clients = $clients->where('client_category_id', '=', $request->client_category_id);
            }

            if($request->client_city_id){
                $clients = $clients->where('client_city_id', '=', $request->client_city_id);
            }

            if($request->client_city_sector_id){
                $clients = $clients->where('client_city_sector_id', '=', $request->client_city_sector_id);
            }

            $count = $clients->count();

            $page = isset($request->paginator['page'])? $request->paginator['page']*$request->paginator['pp']: 0;
            $pp = isset($request->paginator['pp'])? $request->paginator['pp']: 20;

            $clients = $clients->orderBy('client_name')->offset($page)->limit($pp)->get(); 

            $trs = "";
            foreach($clients as $index=>$client){
                $trs .= view('amrani.pages.client.partials.tr', ['client'=>$client, 'index'=>$page+$index]);
            }

            return response()->json([
                'success'   => $trs,
                'total'     =>  $clients->count() . ' / ' . $count
            ]);

        } catch (\Throwable $th) {
            return $th;
        }

    }
}
