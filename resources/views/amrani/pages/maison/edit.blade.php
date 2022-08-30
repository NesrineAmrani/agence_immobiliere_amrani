@extends('amrani.layout.app')
@section('title') {{ __('Modifier une Maison') }} @endsection
@section('content')
<div class="w-full h-full bg-gray-100">
    <div class="flex gap-4 items-center h-12 px-4 text-gray-600 bg-white">
        @include('components.ui.back')
        <h1 class="font-bold text-xl">{{ __('Modifier une Maison') }} </h1>
    </div>

    <div class="overflow-x-auto">
        <div class="min-w-screen justify-center font-sans overflow-hidden bg-gray-100">
            @if ($errors->any())
                <div class="w-full lg:w-4/6 mx-auto bg-white my-5 rounded border shadow-sm">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif
            <form class="m-0" action="{{route('maison.update', ['maison'=>$maison->id])}}" method="POST">
                @csrf
                @method('PUT')

                @include('amrani.pages.common.upload', ['folder'=>'maisons/'.$maison->maison_code])
                @include('amrani.pages.common.client', ['client'=>$maison->client, 'intermediaire'=>$maison->intermediaire])

                <div class="w-full lg:w-4/6 mx-auto bg-white my-5 rounded border pb-4 shadow-sm">

                    @include('components.ui.title', ['title'=>'Maison / منزل مستقل'])
                    <hr>

                    <div class="flex items-center block gap-4 mb-4 mt-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="maison_code">Code Maison</label>
                        <input readonly value="{{$maison->maison_code}}" class="form-input bg-green-100 font-bold" type="text" name="maison_code" required>
                    </div>
                    
                    <div class="flex items-center block gap-4 mb-4 flex-1">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="maison_service_id">Services</label>
                        <select class="form-input w-3/5" name="maison_service_id">
                            <option value="-1">-- Services --</option> 
                            @foreach ($services as $service)
                                <option @if($service->id == $maison->maison_service_id) selected @endif value="{{$service->id}}">{{$service->maison_service}}</option>    
                            @endforeach
                        </select>
                    </div>  

                    <div class="flex items-center block gap-4 mb-4 flex-1">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="city_id">Ville</label>
                        @include('amrani.pages.common.city', ['cities'=>$cities, 'city_id'=>$maison->city_id, 'city_sector_id'=>$maison->city_sector_id])
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="description">Description</label>
                        <input value="{{$maison->description}}" class="form-input w-3/5" type="text" name="description">
                    </div>

                    <div class="flex items-center block gap-4 mb-4 flex-1">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="maison_etat">État</label>
                        <select class="form-input w-3/5" name="maison_etat">
                            <option value="-1">-- États --</option> 
                            @foreach ($etats as $etat)
                                <option @if($etat == $maison->maison_etat) selected @endif value="{{$etat}}">{{$etat}}</option>    
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center block gap-4 mb-4 flex-1">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="maison_situation">Situation</label>
                        <select class="form-input w-3/5" name="maison_situation">
                            <option value="-1">-- Situation --</option> 
                            @foreach ($situations as $situation)
                                <option @if($situation == $maison->maison_situation) selected @endif value="{{$situation}}">{{$situation}}</option>    
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-top block gap-4 mb-4 flex-1">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="maison_details">Détails</label>
                        <div class="w-3/5 grid grid-cols-2 gap-4">
                            @foreach ($details as $detail)
                                <label class="flex items-center space-x-3">
                                    @if(isset($maison->maison_details) && !empty($maison->maison_details))
                                        @if (in_array($detail, json_decode($maison->maison_details)))
                                            <input type="checkbox" checked name="maison_details[]" value="{{$detail}}" class="form-tick appearance-none h-6 w-6 border border-gray-300 rounded-md checked:bg-blue-600 checked:border-transparent focus:outline-none">
                                            <span class="text-gray-900 font-medium">{{$detail}}</span>  
                                        @else
                                            <input type="checkbox" name="maison_details[]" value="{{$detail}}" class="form-tick appearance-none h-6 w-6 border border-gray-300 rounded-md checked:bg-blue-600 checked:border-transparent focus:outline-none">
                                            <span class="text-gray-900 font-medium">{{$detail}}</span>   
                                        @endif
                                    @else
                                        <input type="checkbox" name="maison_details[]" value="{{$detail}}" class="form-tick appearance-none h-6 w-6 border border-gray-300 rounded-md checked:bg-blue-600 checked:border-transparent focus:outline-none">
                                        <span class="text-gray-900 font-medium">{{$detail}}</span>   
                                    @endif


                                </label>
                            @endforeach
                        </div>
                    </div>


                    <div class="flex items-center block gap-4 mb-4 flex-1">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="maison_facade">Façades</label>
                        <select class="facade form-input w-3/5" name="maison_facade">
                            <option value="-1">-- Façade --</option> 
                            @foreach ($facades as $facade)
                                <option @if($facade == $maison->maison_facade) selected @endif value="{{$facade}}">{{$facade}}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="largeur @if($maison->maison_facade != 'Rue') hidden @endif flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="largeur_1">Largeur</label>
                        <input value="{{$maison->largeur_1}}" placeholder="0" class="form-input w-16 text-center" type="text" name="largeur_1">
                        <input value="{{$maison->largeur_2}}" placeholder="0" class="form-input w-16 text-center" type="text" name="largeur_2">
                        <input value="{{$maison->largeur_3}}" placeholder="0" class="form-input w-16 text-center" type="text" name="largeur_3">
                    </div> 


                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="garage_hauteur">H. Garage</label>
                        <input value="{{$maison->garage_hauteur}}" placeholder="0" class="form-input" type="text" name="garage_hauteur">
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="garage_surface">Surface Garage</label>
                        <input value="{{$maison->garage_surface}}" placeholder="0" class="form-input" type="text" name="garage_surface">
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="surface_etage">Surface 1er Étg.</label>
                        <input value="{{$maison->surface_etage}}" placeholder="0" class="form-input" type="number" name="surface_etage">
                    </div>


                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="surface_recule">Surface Recule</label>
                        <input value="{{$maison->surface_recule}}" placeholder="0" class="form-input" type="text" name="surface_recule">
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="nbr_etages">Nbr. Étages</label>
                        <input value="{{$maison->nbr_etages}}" placeholder="0" class="form-input" type="text" name="nbr_etages">
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="prix_metre">Prix / M</label>
                        <input value="{{$maison->prix_metre}}" placeholder="0" class="form-input bg-red-50" type="number" name="prix_metre">
                        <span class="text-xs text-gray-500">DH</span>
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="prix_total">Prix Total</label>
                        <input value="{{$maison->prix_total}}" placeholder="0" class="form-input bg-blue-50" type="number" name="prix_total">
                        <span class="text-xs text-gray-500">DH</span>
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="prix_declaration">Prix Déclaré</label>
                        <input value="{{$maison->prix_declaration}}"placeholder="0" class="form-input bg-blue-50" type="number" name="prix_declaration">
                        <span class="text-xs text-gray-500">DH</span>
                    </div>

                    <hr>

                    <div class="flex justify-center lg:justify-start items-center block gap-4 mt-4">
                        <div class="lg:block lg:w-1/5 hidden"></div>
                        <button class="py-2 px-4 border rounded-lg bg-green-500 text-white center"><i class="far fa-save"></i> Enregistrer</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        $('.facade').on('change', function(){
            if($(this).val() == 'Rue'){
                $('.largeur').removeClass('hidden');
            }else{
                $('.largeur').addClass('hidden')
            }
        })
    });
</script>

@endsection