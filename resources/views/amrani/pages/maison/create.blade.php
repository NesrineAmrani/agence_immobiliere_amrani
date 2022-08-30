@extends('amrani.layout.app')
@section('title') {{ __('Ajouter une Maison') }} @endsection

@section('content')
<div class="w-full h-full bg-gray-100">
    <div class="flex gap-4 items-center h-12 px-4 text-gray-600 bg-white">
        @include('components.ui.back')
        <h1 class="font-bold text-xl">{{ __('Ajouter une Maison') }} </h1>
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
            <form class="m-0 w-full" action="{{route('maison.store')}}" method="POST">
                @csrf
                @include('amrani.pages.common.upload', ['folder'=>'maisons/'.$maison_code])
                @include('amrani.pages.common.client')

                <div class="w-full lg:w-4/6 mx-auto bg-white my-5 rounded border pb-4 shadow-sm">

                    @include('components.ui.title', ['title'=>'Maison / منزل'])
                    <hr>

                    <div class="flex items-center block gap-4 mb-4 mt-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="maison_code">Code Local</label>
                        <input id="maison_code" readonly value="{{$maison_code}}" class="form-input bg-green-100 font-bold" type="text" name="maison_code" required>
                    </div>

                    <div class="flex items-center block gap-4 mb-4 flex-1">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="maison_service_id">Services</label>
                        <select class="form-input w-3/5" name="maison_service_id">
                            <option value="-1">-- Services --</option> 
                            @foreach ($services as $service)
                                <option value="{{$service->id}}">{{$service->maison_service}}</option>    
                            @endforeach
                        </select>
                    </div>  
                                      
                    <div class="flex items-center block gap-4 mb-4 flex-1">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="city_id">Ville</label>
                        @include('amrani.pages.common.city', ['cities'=>$cities])
                    </div> 
                    
                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="description">Description</label>
                        <input value="" class="form-input w-3/5" type="text" name="description">
                    </div>

                    <div class="flex items-center block gap-4 mb-4 flex-1">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="maison_etat">État</label>
                        <select class="form-input w-3/5" name="maison_etat">
                            <option value="-1">-- États --</option> 
                            @foreach ($etats as $etat)
                                <option value="{{$etat}}">{{$etat}}</option>    
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center block gap-4 mb-4 flex-1">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="maison_situation">Situation</label>
                        <select class="form-input w-3/5" name="maison_situation">
                            <option value="-1">-- Situation --</option> 
                            @foreach ($situations as $situation)
                                <option value="{{$situation}}">{{$situation}}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-top block gap-4 mb-4 flex-1">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="maison_details">Détails</label>
                        <div class="w-3/5 grid grid-cols-2 gap-4">
                            @foreach ($details as $detail)
                                <label class="flex items-center space-x-3">
                                    <input type="checkbox" name="maison_details[]" value="{{$detail}}" class="form-tick appearance-none h-6 w-6 border border-gray-300 rounded-md checked:bg-blue-600 checked:border-transparent focus:outline-none">
                                    <span class="text-gray-900 font-medium">{{$detail}}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex items-center block gap-4 mb-4 flex-1">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="maison_facade">Façades</label>
                        <select class="facade form-input w-3/5" name="maison_facade">
                            <option value="-1">-- Façade --</option> 
                            @foreach ($facades as $facade)
                                <option value="{{$facade}}">{{$facade}}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="largeur hidden flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="largeur_1">Largeur</label>
                        <input value="" placeholder="0" class="form-input w-16 text-center" type="text" name="largeur_1">
                        <input value="" placeholder="0" class="form-input w-16 text-center" type="text" name="largeur_2">
                        <input value="" placeholder="0" class="form-input w-16 text-center" type="text" name="largeur_3">
                    </div> 

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="garage_hauteur">H. Garage</label>
                        <input value="" placeholder="0" class="form-input" type="text" name="garage_hauteur">
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="garage_surface">Surface Garage</label>
                        <input value="" placeholder="0" class="form-input" type="text" name="garage_surface">
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="surface_etage">Surface 1er Étg.</label>
                        <input value="" placeholder="0" class="form-input" type="number" name="surface_etage">
                    </div>


                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="surface_recule">Surface Recule</label>
                        <input value="" placeholder="0" class="form-input" type="text" name="surface_recule">
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="nbr_etages">Nbr. Étages</label>
                        <input value="" placeholder="0" class="form-input" type="text" name="nbr_etages">
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="prix_metre">Prix / M</label>
                        <input value="" placeholder="0" class="form-input bg-red-50" type="number" name="prix_metre">
                        <span class="text-xs text-gray-500">DH</span>
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="prix_total">Prix Total</label>
                        <input value="" placeholder="0" class="form-input bg-blue-50" type="number" name="prix_total">
                        <span class="text-xs text-gray-500">DH</span>
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="prix_declaration">Prix Déclaré</label>
                        <input value="" placeholder="0" class="form-input bg-blue-50" type="number" name="prix_declaration">
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