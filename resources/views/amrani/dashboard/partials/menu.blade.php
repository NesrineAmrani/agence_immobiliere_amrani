@php
    $links = [
        ['Appartement', '<i class="far fa-building text-2xl block"></i>', 'appartement.create'],
        ['Terrain', '<i class="fas fa-map-marked text-2xl block"></i>', 'terrain.create'],
        ['Maison', '<i class="fas fas fa-home text-2xl block"></i>', 'maison.create'],
        ['L. Commercial', '<i class="fas fa-warehouse text-2xl block"></i>', 'lc.create'],
        ['Villa', '<i class="fas fas fa-home text-2xl block"></i>', 'villa.create'],
        ['Ferme', '<i class="fas fa-horse-head text-2xl block"></i>', 'ferma.create']
    ]
@endphp

<div class="p-2 py-4 bg-gray-50 flex justify-center gap-4 overflow-hidden">
    @foreach ($links as $l)
        <a href="{{ route($l[2]) }}" class="relative bg-white border shadow rounded-lg text-center p-4 w-32 cursor-pointer hover:bg-blue-100 focus:bg-blue-200">
            {!! $l[1] !!}
            <div class="text-sm">
                {{$l[0]}}
            </div> 
            <div class="absolute top-0 right-0 m-1 rounded-lg bg-green-50 p-1">
                <i class="far fa-plus"></i>
            </div>
        </a>
    @endforeach
</div>