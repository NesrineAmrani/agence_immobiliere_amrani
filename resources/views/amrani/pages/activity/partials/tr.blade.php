<tr class="border-b border-gray-200 {{ $colors[ $log->description ] }} hover:bg-gray-100">
    <td class="py-1 px-6 text-left">
        <div class="flex items-center">
            <span class="font-medium">{!! $actions[ $log->description ] !!}</span>
        </div>
    </td>
    <td class="py-1 px-6 text-left">
        <div class="flex items-center">
            <span class="font-medium">
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
            </span>
        </div>
    </td>
    <td class="py-1 px-6 text-left">
        <div class="flex items-center">
            <span class="font-medium">{{$log->subject_id}}</span>
        </div>
    </td>
    <td class="py-1 px-6 text-left">
        <div class="flex items-center">
            <span class="font-medium">{{$log->created_at->diffForHumans()}}</span>
        </div>
    </td>


</tr>