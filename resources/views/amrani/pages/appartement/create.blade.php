@extends('amrani.layout.app')
@section('title') {{ __('Ajouter un Appartement') }} @endsection

@section('content')
<div class="w-full h-full bg-gray-100">
    <div class="flex gap-4 items-center h-12 px-4 text-gray-600 bg-white">
        @include('components.ui.back')
        <h1 class="font-bold text-xl">{{ __('Ajouter un Appartement') }} </h1>
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
            <form class="m-0 w-full" action="{{route('appartement.store')}}" method="POST">
                @csrf
                @include('amrani.pages.common.upload', ['folder'=>'appartements/'.$code_appartement])
                @include('amrani.pages.common.client')

                <div class="w-full lg:w-4/6 mx-auto bg-white my-5 rounded border pb-4 shadow-sm">

                    @include('components.ui.title', ['title'=>'Appartement / شقة'])
                    <hr>

                    <div class="flex items-center block gap-4 mb-4 mt-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="appartement_code">Code Appartement</label>
                        <input id="appartement_code" readonly value="{{$code_appartement}}" class="form-input bg-green-100 font-bold" type="text" name="appartement_code" required>
                    </div>

                    <div class="flex items-center block gap-4 mb-4 flex-1">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="appartement_service_id">Services</label>
                        <select class="form-input w-3/5" name="appartement_service_id">
                            <option value="-1">-- Services --</option> 
                            @foreach ($services as $service)
                                <option value="{{$service->id}}">{{$service->appartement_service}}</option>    
                            @endforeach
                        </select>
                    </div>  
                                    
                    <div class="flex items-center block gap-4 mb-4 flex-1">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="appartement_service_id">Ville</label>
                        @include('amrani.pages.common.city', ['cities'=>$cities])
                    </div> 
                    
                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="description">Description</label>
                        <input value="" class="form-input w-3/5" type="text" name="description">
                    </div>

                    <div class="flex items-center block gap-4 mb-4 flex-1">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="appartement_etat">État</label>
                        <select class="form-input w-3/5" name="appartement_etat">
                            <option value="-1">-- États --</option> 
                            @foreach ($etats as $etat)
                                <option value="{{$etat}}">{{$etat}}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center block gap-4 mb-4 flex-1">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="appartement_type">Type</label>
                        <select class="form-input w-3/5" name="appartement_type">
                            <option value="-1">-- Types --</option> 
                            @foreach ($types as $type)
                                <option value="{{$type}}">{{$type}}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center block gap-4 mb-4 flex-1">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="appartement_situation">Situation</label>
                        <select class="form-input w-3/5" name="appartement_situation">
                            <option value="-1">-- Situation --</option> 
                            @foreach ($situations as $situation)
                                <option value="{{$situation}}">{{$situation}}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center block gap-4 mb-4 flex-1">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="appartement_facade">Façades</label>
                        <select class="form-input w-3/5" name="appartement_facade" id="appartement_facade">
                            <option value="-1">-- Façade --</option> 
                            @foreach ($facades as $facade)
                                <option value="{{$facade}}">{{$facade}}</option>    
                            @endforeach
                        </select>
                    </div>

                    <div class="largeur hidden flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="appartement_etage">Largeur</label>
                        <input value="" placeholder="0" class="form-input w-16 text-center" type="text" name="largeur_1">
                        <input value="" placeholder="0" class="form-input w-16 text-center" type="text" name="largeur_2">
                        <input value="" placeholder="0" class="form-input w-16 text-center" type="text" name="largeur_3">
                    </div> 

                    <div class="facade hidden flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="facade_details">Détails</label>
                        <input value="" class="form-input w-3/5" type="text" name="facade_details">
                    </div> 

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="appartement_etage">Étage</label>
                        <input value="" placeholder="0" class="form-input" type="text" name="appartement_etage">
                    </div>
                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="appartements_en_etage">App. / Étage</label>
                        <input value="" placeholder="0" class="form-input" type="number" name="appartements_en_etage">
                    </div>
                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="appartements_en_immeuble">App. / Immeuble</label>
                        <input value="" placeholder="0" class="form-input" type="number" name="appartements_en_immeuble">
                    </div>
                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="surface">Surface</label>
                        <input value="" placeholder="0" class="form-input" type="number" name="surface">
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="ascenseur">Ascenseur</label>
                        <input value="" placeholder="0" class="form-input" type="number" name="ascenseur">
                    </div>
                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="parking">Place Parking</label>
                        <input value="" placeholder="0" class="form-input" type="number" name="parking">
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="nbr_chambre">Nbr. Chambres</label>
                        <input value="" placeholder="0" class="form-input" type="number" name="nbr_chambre">
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="nbr_salon">Nbr. Salons</label>
                        <input value="" placeholder="0" class="form-input" type="number" name="nbr_salon">
                    </div>
                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="nbr_balcon">Nbr. Balcons</label>
                        <input value="" placeholder="0" class="form-input" type="number" name="nbr_balcon">
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="nbr_patio">nbr. Patios</label>
                        <input value="" placeholder="0" class="form-input" type="number" name="nbr_patio">
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="nbr_toilette">Nbr. Toilettes</label>
                        <input value="" placeholder="0" class="form-input" type="number" name="nbr_toilette">
                    </div>

                    <div class="flex items-center block gap-4 mb-4">
                        <label class="w-1/5 text-right text-gray-500 text-sm" for="nbr_cuisine">Nbr. Cuisines</label>
                        <input value="" placeholder="0" class="form-input" type="number" name="nbr_cuisine">
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
        $('#appartement_facade').on('change', function(){

            $('.largeur').addClass('hidden')
            $('.facade').addClass('hidden');

            if($(this).val() == 'Rue'){
                $('.largeur').removeClass('hidden');
            }else if($(this).val() == 'Vue Panoramique'){
                $('.facade').removeClass('hidden');
            }
        })
    });
</script>

@endsection