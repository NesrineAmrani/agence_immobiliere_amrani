<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Villa extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected $fillable = [
        'villa_code',
        'villa_facade', // array
        'villa_situation', // array
        'villa_etat', // array
        'villa_surface_total',
        'villa_surface_batie',
        'nbr_garage',
        'surface_jardin',
        'surface_patio',
        'nbr_etages',
        'villa_details', // array
        'largeur_1',
        'largeur_2',
        'largeur_3',
        'activite',
        'description',
        'prix_metre',
        'prix_total',
        'prix_declaration',
        'client_id',
        'city_id',
        'city_sector_id',
        'intermediaire_id',
        'villa_service_id',
        'created_at',
        'updated_at'
    ];
    public const ETATS = ['Nouveau', 'Déjà Utilisé'];
    public const FACADES = ['Rue', 'Place', 'Piscine', 'Sur Mer'];
    public const SITUATIONS = ['Titré', 'Melkia', 'Contrat', 'Miftah', 'Contrat Judiciaire'];
    public const DETAILS = ['Piscine', 'Sous Sol'];

    public function client(){
        return $this->belongsTo(Client::class);
    }
    
    public function intermediaire(){
        return $this->belongsTo(Intermediaire::class);
    }

    public function service(){
        return $this->belongsTo(VillaService::class, 'villa_service_id', 'id');
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function city_sector(){
        return $this->belongsTo(CitySector::class);
    }
}
