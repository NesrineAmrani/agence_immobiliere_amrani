<tr class="border-b border-gray-200 bg-white hover:bg-gray-100">
    <td class="py-3 px-6 text-left">
        <div class="flex items-center">
            @if( isset($loop->index) )
                <span class="font-medium -ml-4 w-6 text-xs text-gray-400">{{ $loop->index + 1 }}</span>
            @else
                <span class="font-medium -ml-4 w-6 text-xs text-gray-400">{{ $index + 1 }}</span>
            @endif
            <span class="font-medium">{{$intermediaire->intermediaire_code}}</span>
        </div>
    </td>
    <td class="py-3 px-6 text-left">
        <div class="flex items-center">
            <span class="font-medium">{{$intermediaire->intermediaire_name}}</span>
        </div>
    </td>
    <td class="py-3 px-6 text-left">
        <div class="flex items-center">
            {{$intermediaire->category->intermediaire_category}}
        </div>
    </td>
    <td class="py-3 px-6 text-left">
        <div class="flex items-center">
            {{$intermediaire->intermediaire_telephone}}
        </div>
    </td>
    <td class="py-3 px-6 text-left">
        <div class="flex items-center">
            @isset($intermediaire->city->city_name_fr)
                {{$intermediaire->city->city_name_fr}}
                @isset($intermediaire->sector)
                    ->{{$intermediaire->sector->city_sector_name_fr}}
                @endisset
            @endisset
        </div>
    </td>
    <td class="py-3 px-6 text-center">
        @if ($intermediaire->intermediaire_status_id == 1)
            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{$intermediaire->status->intermediaire_status}}</span>
        @endif

        @if ($intermediaire->intermediaire_status_id == 2)
            <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">{{$intermediaire->status->intermediaire_status}}</span>
        @endif

        @if ($intermediaire->intermediaire_status_id == 3)
            <span class="bg-gray-200 text-gray-600 py-1 px-3 rounded-full text-xs">{{$intermediaire->status->intermediaire_status}}</span>
        @endif

    </td>
    <td class=" px-6 text-center">
        <div class="flex item-center justify-end">
            <div class="w-4 mr-2 pt-1 transform hover:text-purple-500 hover:scale-110">
                @include('amrani.pages.intermediaire.partials.btn-edit')
            </div>
            <form class=" pt-1" action="{{route('intermediaire.destroy', $intermediaire->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="destroy_intermediaire w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                    @include('amrani.pages.intermediaire.partials.btn-delete')
                </button>
            </form>
        </div>
    </td>
</tr>