<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Intermediaire;
use App\Models\IntermediaireCategory;
use App\Models\IntermediaireStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class IntermediaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('amrani.pages.intermediaire.index')->with([
            'intermediaires'   =>  Intermediaire::orderBy('intermediaire_name')->paginate(20),
            'categories'    =>  IntermediaireCategory::all(),
            'cities'        =>  City::all()
        ]);
    }

    public function create()
    {
        return view('amrani.pages.intermediaire.create')->with([
            'categories'    =>  IntermediaireCategory::all(),
            'statuses'      =>  IntermediaireStatus::all(),
            'cities'        =>  City::all(),
            'code_intermediaire'   =>  $this->newCodeIntermediaire()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'intermediaire_code'           => 'required|max:10',
            'intermediaire_name'           => 'required|max:255',
            'intermediaire_category_id'    => 'required',
            'intermediaire_status_id'      => 'required'
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
            'intermediaire_city_id' =>  isset($request->city_id)? $request->city_id:0,
            'intermediaire_city_sector_id' =>  isset($request->city_sector_id)? $request->city_sector_id:0,
            'contacts'      =>  json_encode($contacts)
        ]);
        Intermediaire::create($request->all());

        Alert::success('L\'intermédiaire a été ajouté!');
        
        return redirect()->route('intermediaire.index');
    }

    public function show(Intermediaire $intermediaire)
    {
        //
    }

    public function edit(Intermediaire $intermediaire)
    {
        return view('amrani.pages.intermediaire.edit')->with([
            'categories'    =>  IntermediaireCategory::all(),
            'statuses'      =>  IntermediaireStatus::all(),
            'intermediaire'        =>  $intermediaire,
            'cities'        =>  City::all(),
        ]);
    }

    public function update(Request $request, Intermediaire $intermediaire)
    {
        $validated = $request->validate([
            'intermediaire_code'           => 'required|max:10',
            'intermediaire_name'           => 'required|max:255',
            'intermediaire_category_id'    => 'required',
            'intermediaire_status_id'      => 'required'
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
            'intermediaire_city_id' =>  isset($request->city_id)? $request->city_id:0,
            'intermediaire_city_sector_id' =>  isset($request->city_sector_id)? $request->city_sector_id:0,
            'contacts'      =>  json_encode($contacts)
        ]);
        $intermediaire->update($request->all());

        Alert::success('L\'intermédiaire a été modifié!');

        return redirect()->route('intermediaire.index');
    }

    public function destroy(Intermediaire $intermediaire)
    {
        $intermediaire->delete();

        Alert::success('L\'intermédiaire a été supprimé!');

        return redirect()->route('intermediaire.index');
    }

    public function newCodeIntermediaire(){
        return 'INT' . (Intermediaire::max('id') + 1);
    }

    public function getDefaultIntermediaireCategory(){
        $cc_default = IntermediaireCategory::where('is_default', 1)->first();
        return $cc_default->id;
    }

    public function getDefaultIntermediaireStatus(){
        $cs_default = IntermediaireStatus::where('is_default', 1)->first();
        return $cs_default->id;
    }   
    
    public function filter(Request $request){
        try {

            $intermediaires = Intermediaire::with('category', 'status');

            if($request->req){
                $intermediaires = $intermediaires->where('intermediaire_name', 'like', '%'.$request->req.'%');
            }

            if($request->intermediaire_category_id){
                $intermediaires = $intermediaires->where('intermediaire_category_id', '=', $request->intermediaire_category_id);
            }

            if($request->intermediaire_city_id){
                $intermediaires = $intermediaires->where('intermediaire_city_id', '=', $request->intermediaire_city_id);
            }

            if($request->intermediaire_city_sector_id){
                $intermediaires = $intermediaires->where('intermediaire_city_sector_id', '=', $request->intermediaire_city_sector_id);
            }

            $count = $intermediaires->count();

            $page = isset($request->paginator['page'])? $request->paginator['page']*$request->paginator['pp']: 0;
            $pp = isset($request->paginator['pp'])? $request->paginator['pp']: 20;

            $intermediaires = $intermediaires->orderBy('intermediaire_name')->offset($page)->limit($pp)->get(); 

            $trs = "";
            foreach($intermediaires as $index=>$intermediaire){
                $trs .= view('amrani.pages.intermediaire.partials.tr', ['intermediaire'=>$intermediaire, 'index'=>$page+$index]);
            }

            return response()->json([
                'success'   => $trs,
                'total'     =>  $intermediaires->count() . ' / ' . $count
            ]);
        } catch (\Throwable $th) {
            return $th;
        }

    }
}
