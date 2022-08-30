<div class="flex items-center justify-between shadow-lg border-b border-gray-300 h-14">
    <div class="flex items-center">
        <button class="mr-3 p-4 py-5 hover:bg-gray-100 text-lg active:bg-blue-500 focus:outline-none hover:bg-gray-300 focuse:border-0 toggle_vertical_navbar"><i class="fas fa-bars"></i></button>
        <div class="rounded-lg border overflow-hidden relative">
            <input type="text" class="border-0 text-sm w-64" placeholder="Chercher">
            <button class="absolute top-0 right-0 m-2 pt-1 text-sm text-gray-400"><i class="fas fa-search"></i></button>
        </div>
    </div>
    
    
    <div class="flex items-center pr-4">

<button class="cursor-pointer hover:bg-gray-300 p-2 bg-gray-200 m-2 rounded-lg text-sm px-4 py-2 text-center inline-flex items-center"
    type="button" data-dropdown-toggle="dropdown">

        <i class="fas fa-user"></i>&nbsp&nbsp
        <div class="font-semibold">{{ Auth::user()->name }}</div>

    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
</button>

<!-- Dropdown menu -->
<div class="h-36 hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
    <div class="px-4 py-3">
        <span class="block text-sm"><div class="italic font-semibold">{{ Auth::user()->name }}</div></span>
        <span class="block text-sm font-medium text-gray-900 truncate"><div class="">{{ Auth::user()->email }}</div></span>
    </div>
    <ul class="py-1" aria-labelledby="dropdown">
        <li>
        <a href="{{ route('dashboard.index') }}" class="text-sm font-semibold hover:bg-gray-100 text-gray-700 block px-4 py-2">
            Dashboard
        </a>
        </li>

        <li>
        <form method="POST" action="{{ route('logout') }}">
                    @csrf
        <a href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                class="text-sm font-semibold hover:bg-gray-100 text-gray-700 block px-4 py-2"
        >
                        Se déconnecter
            </a>
            </form>
        </li>

    </ul>
</div>

    </div>



</div>
<script>
    $(document).ready(function(){
        $('.toggle_vertical_navbar').on('click', function(){
            $(this).toggleClass('bg-gray-600 text-gray-100')
            $('.vertical_menu').toggleClass('hidden', 1000);
        })
    });
</script>