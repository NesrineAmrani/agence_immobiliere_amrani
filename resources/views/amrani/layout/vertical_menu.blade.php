<div class="vertical_menu flex flex-col justify-between min-w-48 w-48 h-full bg-gradient-to-r from-gray-100 to-gray-200 border-r border-gray-300 pb-4 overflow-y-auto" style="min-width: 185px">
    <div class="">
        <div class="flex items-center border-b border-gray-300 px-2 h-14 mb-2">
            
            <img class="w-10 h-8 mr-1" src="/images/logo.png" alt="logo">
            <div class="text-gray-100 text-sm text-gray-800">
                <span class="font-extrabold">Agence</span> 
                <span class="font-extrabold">Amrani</span>
            </div>
        </div>
        <ul>
            <li class="">
                <a href="{{ route('dashboard.index') }}" 
                    class="flex items-center block py-2 px-3 text-sm 
                    @if(Route::currentRouteNamed( 'dashboard.index' )) 
                        bg-gray-600 rounded-r-full text-gray-100 pointer-events-none
                    @else 
                        hover:bg-gray-300 cursor-pointer hover:text-gray-800 text-gray-600 @endif "
                >                                
                    <div class="w-6"><i class="fas fa-columns"></i> </div>
                    Dashboard
                </a>
                <a href="{{ route('client.index') }}" 
                    class="flex items-center block py-2 px-3 text-sm 
                    @if( Str::contains(Route::currentRouteName(), 'client') ) 
                        bg-gray-600 rounded-r-full text-gray-100 pointer-events-none
                    @else 
                        hover:bg-gray-300 cursor-pointer hover:text-gray-800 text-gray-600 @endif "
                >                                
                    <div class="w-6"><i class="fas fa-user-tie"></i> </div>
                     Clients
                     <small class="ml-2 text-xs font-bold total_clients">
                         <i class="fas fa-sync fa-spin"></i>
                    </small>
                </a>
                <a href="{{ route('intermediaire.index') }}" 
                    class="flex items-center block py-2 px-3 text-sm 
                    @if( Str::contains(Route::currentRouteName(), 'intermediaire') ) 
                        bg-gray-600 rounded-r-full text-gray-100 pointer-events-none
                    @else 
                        hover:bg-gray-300 cursor-pointer hover:text-gray-800 text-gray-600 @endif "
                >                                
                    <div class="w-6"><i class="fas fa-user-friends"></i> </div>
                    Intermédiaires 
                    <small class="ml-2 text-xs font-bold total_intermediaires">
                        <i class="fas fa-sync fa-spin"></i>
                   </small>
               </a>
               <a href="{{ route('appartement.index') }}" 
                    class="flex items-center block py-2 px-3 text-sm 
                    @if( Str::contains(Route::currentRouteName(), 'appartement') ) 
                        bg-gray-600 rounded-r-full text-gray-100 pointer-events-none
                    @else 
                        hover:bg-gray-300 cursor-pointer hover:text-gray-800 text-gray-600 @endif "
                >                                 
                    <div class="w-6"><i class="far fa-building"></i> </div>
                     Appartements 
                     <small class="ml-2 text-xs font-bold total_appartements">
                        <i class="fas fa-sync fa-spin"></i>
                   </small>
                </a>
                <a href="{{ route('terrain.index') }}" 
                    class="flex items-center block py-2 px-3 text-sm
                    @if( Str::contains(Route::currentRouteName(), 'terrain') )  
                    
                        bg-gray-600 rounded-r-full text-gray-100 pointer-events-none
                    @else 
                        hover:bg-gray-300 cursor-pointer hover:text-gray-800 text-gray-600 @endif "
                >                                
                    <div class="w-6"><i class="fas fa-map-marked"></i> </div>
                     Terrains
                    <small class="ml-2 text-xs font-bold total_terrains">
                        <i class="fas fa-sync fa-spin"></i>
                    </small>
                </a>
                <a href="{{ route('maison.index') }}" 
                    class="flex items-center block py-2 px-3 text-sm 
                    @if( Str::contains(Route::currentRouteName(), 'maison') )  
                    
                        bg-gray-600 rounded-r-full text-gray-100 pointer-events-none
                    @else 
                        hover:bg-gray-300 cursor-pointer hover:text-gray-800 text-gray-600 @endif "
                >                                
                    <div class="w-6"><i class="fas fa-home"></i> </div>
                     Maisons 
                     <small class="ml-2 text-xs font-bold total_maisons">
                        <i class="fas fa-sync fa-spin"></i>
                    </small>
                </a>
                <a href="{{ route('lc.index') }}" 
                    class="flex items-center block py-2 px-3 text-sm 
                    @if( Str::contains(Route::currentRouteName(), 'lc') )
                    
                        bg-gray-600 rounded-r-full text-gray-100 pointer-events-none
                    @else 
                        hover:bg-gray-300 cursor-pointer hover:text-gray-800 text-gray-600 @endif "
                >                                 
                    <div class="w-6"><i class="fas fa-warehouse"></i> </div>
                     <div class="ml-1">Locaux Commerciaux</div>
                     <small class="ml-2 text-xs font-bold total_lcs">
                        <i class="fas fa-sync fa-spin"></i>
                     </small>
                </a>
                <a href="{{ route('villa.index') }}" 
                    class="flex items-center block py-2 px-3 text-sm 
                    @if( Str::contains(Route::currentRouteName(), 'villa') )
                    
                        bg-gray-600 rounded-r-full text-gray-100 pointer-events-none
                    @else 
                        hover:bg-gray-300 cursor-pointer hover:text-gray-800 text-gray-600 @endif "
                >                                
                    <div class="w-6"><i class="fas fa-home"></i> </div>
                     Villas 
                     <small class="ml-2 text-xs font-bold total_villas">
                        <i class="fas fa-sync fa-spin"></i>
                     </small>
                </a>
                <a href="{{ route('ferma.index') }}" 
                    class="flex items-center block py-2 px-3 text-sm 
                    @if( Str::contains(Route::currentRouteName(), 'ferma') )
                   
                        bg-gray-600 rounded-r-full text-gray-100 pointer-events-none
                    @else 
                        hover:bg-gray-300 cursor-pointer hover:text-gray-800 text-gray-600 @endif "
                >                               
                    <div class="w-6"><i class="fas fa-horse-head"></i> </div>
                     Fermes 
                     <small class="ml-2 text-xs font-bold total_fermas">
                        <i class="fas fa-sync fa-spin"></i>
                    </small>
                </a>
            </li>
        </ul>
    </div>
    <ul>
        <li>
            <a href="{{ route('params') }}" 
                class="flex mb-2 items-center block py-2 px-3 text-sm 
                @if(Route::currentRouteNamed( 'params' )) 
                    bg-gray-600 rounded-r-full text-gray-100 pointer-events-none
                @else 
                    hover:bg-gray-300 cursor-pointer hover:text-gray-800 text-gray-600 @endif "
            > 
                <div class="w-6"><i class="fas fa-city"></i> </div>
                Villes
            </a> 
        </li>
    </ul>
</div>
<script>
    $(document).ready(function(){
        $.get(
            "{{route('dashboard.totals')}}",
            function(r){
                $('.total_clients').html('(' + r.total_clients + ')');
                $('.total_intermediaires').html('(' + r.total_intermediaires + ')');
                $('.total_appartements').html('(' + r.total_appartements + ')');
                $('.total_terrains').html('(' + r.total_terrains + ')');
                $('.total_lcs').html('(' + r.total_lcs + ')');
                $('.total_maisons').html('(' + r.total_maisons + ')');
                $('.total_villas').html('(' + r.total_villas + ')');
                $('.total_fermas').html('(' + r.total_fermas + ')');
            }
        );
    });
</script>