
<div class="overflow-x-auto">
    <div class="min-w-screen flex items-center justify-center font-sans overflow-hidden bg-gray-100">
        <div class="w-full lg:w-1/2 mb-20">
            <div class="flex items-center justify-between py-2">
                <div class="font-bold text-lg">Villes</div>
                <button class="add_city border px-4 py-1 rounded-lg bg-blue-400 hover:bg-gray-400 text-white text-md font-semibold">
                    <i class="fas fa-plus"></i> Ajouter
                </button>
            </div>

            @include('amrani.pages.parameters.city.create')


            @foreach ($cities as $city)
                @include('amrani.pages.parameters.city.item', ['city'=>$city])
            @endforeach
        </div>
    </div>
</div>
<style>
.form-control:focus {
  border-color: inherit;
  -webkit-box-shadow: none;
  box-shadow: none;
}
</style>

<script>
    $(document).ready(function(){

        $('.show').on('click', function(){
            $(this).find('.fas').toggleClass('hidden');
            $(this).parent().parent().parent().find('.sector').toggleClass('hidden');
        });

        $('.edit').on('click', function(){
            $(this).parent().parent().find('.input-city').prop('readonly', false).select();
        });

        $('.input-city').on('focusout', function(){
            if($(this).val() == ""){
                $(this).val( $(this).data('value') );
            }
            $(this).prop('readonly', true)
        });

        $('.input-city').keyup(function(e){
            if(e.keyCode == 13)
            {
                if($(this).val() == ""){
                    $(this).val( $(this).data('value') );
                }else{
                    var city = $(this).data('id');
                    var route = "{{ route('city.update', 69) }}";
                    route = route.replace(69, city);
                    var data = {
                        '_token'        :   $('meta[name="csrf-token"]').attr('content'),
                        'city_name_fr'  :   $(this).val()
                    };
                    var that = $(this);
                    that.parent().find('.loader').toggleClass('hidden');
                    $.ajax({
                        url: route,
                        data: data,
                        type: 'PUT',
                        success: function(data){
                            that.parent().find('.loader').toggleClass('hidden');
                            that.prop('readonly', true)
                            console.log(data);
                        }
                    });                    
                }

            }
        });

        $('.destroy_city').on('click', function(e){
            e.preventDefault();
            var that = $(this);
            Swal.fire({
                title: 'Supprimer la ville?',
                icon: 'warning',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `Supprimer`,
                denyButtonText: `Annuler`,
            }).then((result) => {
                if (result.isConfirmed) {
                    var city = that.data('id');
                    var route = "{{ route('city.destroy', 69) }}";
                    route = route.replace(69, city);
                    var data = {
                        '_token'    :   $('meta[name="csrf-token"]').attr('content')
                    };
                    that.parent().parent().find('.loader').toggleClass('hidden');
                    $.ajax({
                        url: route,
                        data: data,
                        type: 'DELETE',
                        success: function(data){
                            that.parent().parent().parent().remove();
                        }
                    });
                }
            });
        });

        /** Sectors **/

        $(document).on('click', '.edit_sector', function(){
            $(this).parent().parent().find('.input-sector').prop('readonly', false).select();
        });

        $(document).on('focusout', '.input-sector', function(){
            if($(this).val() == ""){
                $(this).val( $(this).data('value') );
            }
            $(this).prop('readonly', true)
        });

        $(document).on('keyup', '.input-sector', function(e){
            if(e.keyCode == 13)
            {
                if($(this).val() == ""){
                    $(this).val( $(this).data('value') );
                }else{
                    var sector = $(this).data('id');
                    var route = "{{ route('city.sector.update', 69) }}";
                    route = route.replace(69, sector);
                    var data = {
                        '_token'        :   $('meta[name="csrf-token"]').attr('content'),
                        'city_sector_name_fr'  :   $(this).val()
                    };
                    var that = $(this);
                    that.parent().find('.loader').toggleClass('hidden');
                    $.ajax({
                        url: route,
                        data: data,
                        type: 'PUT',
                        success: function(data){
                            that.parent().find('.loader').toggleClass('hidden');
                            that.prop('readonly', true)
                            console.log(data);
                        }
                    });                    
                }

            }
        });

        $(document).on('click', '.destroy_city_sector', function(e){
            e.preventDefault();
            var that = $(this);
            Swal.fire({
                title: 'Supprimer le secteur?',
                icon: 'warning',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `Supprimer`,
                denyButtonText: `Annuler`,
            }).then((result) => {
                if (result.isConfirmed) {
                    var city = that.data('id');
                    var route = "{{ route('city.sector.destroy', 69) }}";
                    route = route.replace(69, city);
                    var data = {
                        '_token'    :   $('meta[name="csrf-token"]').attr('content')
                    };
                    that.parent().parent().find('.loader').toggleClass('hidden');
                    $.ajax({
                        url: route,
                        data: data,
                        type: 'DELETE',
                        success: function(data){
                            console.log(data);
                            that.parent().parent().remove();
                        }
                    });
                }
            });
        });

        $('.sector_create').on('click', function(){
            var that = $(this);
            if(that.parent().parent().find('.sector_create_input').val() !== ""){
                var city = that.parent().parent().find('.sector_create_input').val();
                var route = "{{ route('city.sector.create') }}";
                var city_id = that.parent().parent().find('.sector_create_input').data('ville');
                var data = {
                    '_token'        :   $('meta[name="csrf-token"]').attr('content'),
                    'city_sector_name_fr'  :   city,
                    'city_id'       :   city_id
                };
                that.parent().find('.loader').removeClass('hidden');
                $.ajax({
                    url: route,
                    data: data,
                    type: 'POST',
                    success: function(response){
                        console.log(response)
                        that.parent().find('.loader').addClass('hidden');
                        $('.sector_create_input').val('');

                        route = "{{ route('city.sector.last') }}";
                        data = {
                            '_token'        :   $('meta[name="csrf-token"]').attr('content'),
                            'city_id'       :   city_id
                        };
                        $.ajax({
                            url: route,
                            data: data,
                            type: 'POST',
                            success: function(response){
                                that.parent().parent().parent().append(response)
                            }
                        }); 

                    }
                });                    
            }else{
                that.parent().parent().find('.sector_create_input').focus()
            }
        });
    })
</script>