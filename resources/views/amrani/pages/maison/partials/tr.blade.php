<tr class="border-b border-gray-200 bg-white hover:bg-gray-100">
    <td class="py-1 px-6 text-left">
        <div class="flex items-center">
            @if( isset($loop->index) )
                <span class="font-medium -ml-4 w-6 text-xs text-gray-400">{{ $loop->index + 1 }}</span>
            @else
                <span class="font-medium -ml-4 w-6 text-xs text-gray-400">{{ $index + 1 }}</span>
            @endif
            <span class="font-medium">{{$maison->maison_code}}</span>
        </div>
    </td>
    <td class="py-1 px-6 text-left">
        <div class="flex items-center">
            <span class="font-medium">{{$maison->service->maison_service}}</span>
        </div>
    </td>
    <td class="py-1 px-6 text-left">
        <div class="flex items-center">
            <span class="font-medium">{{$maison->maison_situation}}</span>
        </div>
    </td>
    <td class="py-1 px-6 text-left">
        <div class="flex items-center">
            <span class="font-medium">
                @isset($maison->city)
                    {{$maison->city->city_name_fr }} @isset($maison->city_sector) -> {{$maison->city_sector->city_sector_name_fr}} @endisset 
                @endisset
           </span>
        </div>
    </td>

    <td class="py-1 px-6 text-center">
        <div class="font-bold">
            {{$maison->nbr_etages}}
        </div>
    </td>

    <td class="py-1 px-6 text-right text-pink-700 font-bold">
        @money($maison->prix_total) <span style="font-size: 8px" class="font-light">MAD</span>
    </td>
    <td class="py-1 text-right" style="width: 90px">
        <div class="flex justify-end pt-1">
            <div class="pt-1 w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                @include('amrani.pages.maison.partials.btn-edit')
            </div>
            <form class="pt-1 " action="{{route('maison.destroy', $maison->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="destroy_maison w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                    @include('amrani.pages.maison.partials.btn-delete')
                </button>
            </form>
        </div>
    </td>
</tr>