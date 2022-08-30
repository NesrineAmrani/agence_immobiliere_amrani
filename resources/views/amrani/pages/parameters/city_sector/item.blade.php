
    @foreach ($sectors as $sector)
        <div class="flex items-center justify-between ml-4 text-sm mt-2 hover:bg-gray-50 rounded-lg px-2">
            <div class="flex items-center">
                <i class="fas fa-caret-right mr-2"></i>
                <input type="text" data-id="{{$sector->id}}" data-value="{{$sector->city_sector_name_fr}}" readonly class="input-sector form-control border-0 bg-transparent flex-1 p-0 text-sm font-semibold" value="{{$sector->city_sector_name_fr}}">
                <i class="loader hidden text-gray-500 fas fa-sync fa-spin"></i>
            </div>
            <div class="flex">
                <button class="p-2 edit_sector hover:text-green-600"><i class="far fa-edit"></i></button>
                <button data-id="{{$sector->id}}" class="p-2 destroy_city_sector hover:text-red-500"><i class="far fa-trash-alt"></i></button>
            </div>
        </div>
    @endforeach
