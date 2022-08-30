<div class="border rounded-lg p-2 bg-white shadow mb-4">
    <div class="flex items-center justify-between h-12 px-4 text-gray-600">
        <h1 class="font-bold text-lg">Activités</h1>
        <button class="text-blue-400 p-2 hover:text-gray-600"><i class="fas fa-sync-alt"></i></button>
    </div>
    @foreach ($activities as $log)
        <div class="flex items-center justify-between bg-white border-b py-2 px-4">
            <p class="text-xs">
                @php
                switch($log->subject_type){
                        case 'App\Models\Client':
                            echo isset($log->subject->client_name)?'Client : ' . $log->subject->client_name: 'Error!';
                            break;
                        case 'App\Models\Maison':
                            echo isset($log->subject->maison_code)?$log->subject->maison_code . " (" . $log->subject->service->maison_service . ")": 'Error!';
                            break;
                        case 'App\Models\Appartement':
                            echo isset($log->subject->appartement_code)?$log->subject->appartement_code . " (" . $log->subject->service->appartement_service . ")": 'Error!';
                            break;
                        case 'App\Models\LocalCommercial':
                            echo isset($log->subject->lc_code)?$log->subject->lc_code . " (" . $log->subject->service->lc_service . ")": 'Error!';
                            break;
                        case 'App\Models\Ferma':
                            echo isset($log->subject->ferma_code)?$log->subject->ferma_code . " (" . $log->subject->service->ferma_service . ")": 'Error!';
                            break;
                        case 'App\Models\Terrain':
                            echo isset($log->subject->terrain_code)?$log->subject->terrain_code . " (" . $log->subject->service->terrain_service . ")": 'Error!';
                            break;
                        case 'App\Models\Villa':
                            //echo $log->changes;
                            echo isset($log->subject->villa_code)?$log->subject->villa_code . " (" . $log->subject->service->villa_service . ")": 'Error!';
                            break;
                        case 'App\Models\Intermediaire':
                            //echo $log->changes;
                            //this echo below has been added
                            echo isset($log->subject->intermediaire_name)?'Intermediaire : ' . $log->subject->intermediaire_name: 'Error!';
                            break;
                        default:
                            echo $log->subject_type;
                            break;
                }
                @endphp
            </p>
            <p class="text-xs font-bold">
                {{$log->created_at->diffForHumans()}}
            </p>
        </div>                        
    @endforeach
    <div class="text-center">
        <a href="{{ route('activity.log') }}" class="text-blue-400 pt-4 px-4 block text-sm">Voir Tous</a>
    </div>
</div>