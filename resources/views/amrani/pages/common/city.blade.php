<div class="flex items-center gap-4">
    <select class="form-input w-48" id="city_id" name="city_id">
        <option value="-1">--Ville</option>
        @foreach ($cities as $city)
            @if (isset($city_id))
                <option @if($city->id == $city_id) selected @endif value="{{$city->id}}">{{$city->city_name_fr}}</option>  
            @else
                <option value="{{$city->id}}">{{$city->city_name_fr}}</option>               
            @endif
        @endforeach
    </select>
    <div class="relative w-56">
        <select class="form-input w-full" id="city_sector_id" name="city_sector_id">
            <option value="-1">--Secteur</option>
        </select>
        <div class="loader absolute top-0 right-0 bottom-0 bg-gray-600 bg-opacity-10 z-10 w-full rounded-lg">
            <i class="fas fa-sync fa-spin mt-2 ml-24"></i>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        
        $('#city_id').on('change', function(){
            $('.loader').removeClass('hidden');
            if( $(this).val() == "-1" ){
                $('#city_sector_id').find('option')
                                        .remove()
                                        .end()
                                        .append('<option value="-1">--Secteur</option>')
                                        .val(-1);
                $('.loader').addClass('hidden');
            }else{
                var route = "{{ route('sectors.list', 69) }}";
                var city_id = $(this).val();
                route = route.replace(69, city_id);
                var city_sector_id = 0;
                @isset($city_sector_id)
                    city_sector_id = "{{$city_sector_id}}";
                @endisset
                
                $.get(
                    route ,
                    function(response){

                        $('#city_sector_id').find('option')
                                        .remove()
                                        .end()
                                        .append('<option value="-1">--Secteur</option>')
                                        .val(-1);

                        for (const key in response) {
                            if (Object.hasOwnProperty.call(response, key)) {
                                const element = response[key].city_sector_name_fr;
                                if(response[key].id == city_sector_id){
                                    $('#city_sector_id').find('option')
                                        .end()
                                        .append('<option selected value="'+response[key].id+'">'+response[key].city_sector_name_fr.trim()+'</option>');
                                }else{
                                    $('#city_sector_id').find('option')
                                        .end()
                                        .append('<option value="'+response[key].id+'">'+response[key].city_sector_name_fr.trim()+'</option>');
                                }
                                
                                
                            }
                        }
                        clearInterval(timer);
                        $('.loader').addClass('hidden');
                    }
                )
            }
           

        });

        let timer = setInterval(() => {
            $('#city_id').trigger('change');
        }, 1000);

    });
</script>