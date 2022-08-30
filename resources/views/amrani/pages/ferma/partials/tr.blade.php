<tr class="border-b border-gray-200 bg-white hover:bg-gray-100">
    <td class="py-1 px-6 text-left">
        <div class="flex items-center">
            @if( isset($loop->index) )
                <span class="font-medium -ml-4 w-6 text-xs text-gray-400">{{ $loop->index + 1 }}</span>
            @else
                <span class="font-medium -ml-4 w-6 text-xs text-gray-400">{{ $index + 1 }}</span>
            @endif
            <span class="font-medium">{{$ferma->ferma_code}}</span>
        </div>
    </td>
    <td class="py-1 px-6 text-left">
        <div class="flex items-center">
            <span class="font-medium">{{$ferma->service->ferma_service}}</span>
        </div>
    </td>
    <td class="py-1 px-6 text-left">
        <div class="flex items-center">
            <span class="font-medium">{{$ferma->ferma_situation}}</span>
        </div>
    </td>
    <td class="py-1 px-6 text-left">
        <div class="flex items-center">
            <span class="font-medium">
                @isset($ferma->city)
                    {{$ferma->city->city_name_fr }} @isset($ferma->city_sector) -> {{$ferma->city_sector->city_sector_name_fr}} @endisset 
                @endisset
           </span>
        </div>
    </td>

    <td class="py-1 px-6 text-center">
        <div class="font-bold">
            {{$ferma->ferma_surface_total}}
        </div>
    </td>

    <td class="py-1 px-6 text-right text-pink-700 font-bold">
        @money($ferma->prix_total) <span style="font-size: 8px" class="font-light">MAD</span>
    </td>
    <td class="py-1 text-right" style="width: 90px">
        <div class="flex justify-end pt-1">
            <div class="pt-1 w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                @include('amrani.pages.ferma.partials.btn-edit')
            </div>
            <form class="pt-1 " action="{{route('ferma.destroy', $ferma->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="destroy_ferma w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                    @include('amrani.pages.ferma.partials.btn-delete')
                </button>
            </form>
        </div>
    </td>
</tr>