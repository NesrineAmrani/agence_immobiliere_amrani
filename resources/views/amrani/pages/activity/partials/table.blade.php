<div class="overflow-x-auto">
    <div class="min-w-screen flex items-center justify-center font-sans overflow-hidden bg-gray-100">
        <div class="w-full px-4 overflow-auto">
            
            <div class="bg-white shadow-md rounded my-6 pb-6 relative overflow-auto">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left cursor-pointer">DESCRIPTION</th>
                            <th class="py-3 px-6 text-left cursor-pointer">ACTION</th>
                            <th class="py-3 px-6 text-left cursor-pointer">ID</th>
                            <th class="py-3 px-6 text-left cursor-pointer">#DATE</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($activities as $log)
                            @include('amrani.pages.activity.partials.tr', ['log'=>$log])
                        @endforeach
                    </tbody>
                </table>

                <div class="paginator hidden">
                    <div class="pp">20</div>
                    <div class="page">1</div>
                </div>

                <div class="infinit_loader hidden">
                    <div class="w-24 mx-auto text-center text-xl text-gray-400 pt-4">
                        <i class="fas fa-sync fa-spin"></i>
                    </div>
                </div>

                <div class="absolute hidden loader_ top-0 left-0 right-0 bottom-0 bg-gray-600 bg-opacity-30">
                    <div class="w-24 mt-24 mx-auto text-center text-2xl">
                        <i class="fas fa-sync fa-spin"></i>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
