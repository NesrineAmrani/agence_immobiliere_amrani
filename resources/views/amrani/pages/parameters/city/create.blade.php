<div class="create_container flex border rounded items-center justify-between bg-white my-2 overflow-hidden rounded-lg" style="display: none">
    <div class="flex items-center w-full">
        <input placeholder="Nouvelle ville" type="text" class="create_input border-0 bg-transparent w-full p-2 text-md font-semibold" value="">
    </div>
    <div class="flex gap-2">
        <div class="m-2">
            <i class="loader hidden text-gray-500 fas fa-sync fa-spin"></i>
        </div>
        <button class="p-2 create bg-green-500 text-white rounded-lg"><i class="far fa-save"></i></button>
        <button class="p-2 abort bg-red-500 text-white rounded-lg"><i class="fas fa-times"></i></button>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.abort').on('click', function(){
            $('.create_input').val('');
            $('.create_container').toggle('hidden')
        });

        $('.add_city').on('click', function(){
            $('.create_input').val('');
            $('.create_container').toggle('hidden') 
        });

        $('.create').on('click', function(){
            if($('.create_input').val() !== ""){
                var city = $('.create_input').val();
                var route = "{{ route('city.create') }}";
                var data = {
                    '_token'        :   $('meta[name="csrf-token"]').attr('content'),
                    'city_name_fr'  :   city
                };
                var that = $(this);
                that.parent().find('.loader').toggleClass('hidden');
                $.ajax({
                    url: route,
                    data: data,
                    type: 'POST',
                    success: function(data){
                        that.parent().find('.loader').toggleClass('hidden');
                        $('.abort').trigger('click');
                        location.reload();
                    }
                });                    
            }
        });

    });

</script>