<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Maison extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }


    protected $fillable = [
        'maison_code',
        'maison_facade', // array
        'maison_situation', // array
        'maison_etat', // array
        'garage_surface',
        'garage_hauteur',
        'surface_etage',
        'surface_recule',
        'nbr_etages',
        'maison_details', // array
        'largeur_1',
        'largeur_2',
        'largeur_3',
        'description',
        'prix_metre',
        'prix_total',
        'prix_declaration',
        'client_id',
        'city_id',
        'city_sector_id',
        'intermediaire_id',
        'maison_service_id',
        'created_at',
        'updated_at'
    ];
    public const ETATS = ['Nouveau', 'Déjà Utilisé'];
    public const FACADES = ['Rue', 'Centre Commercial', 'Place', 'Marché', 'Sur Mer'];
    public const SITUATIONS = ['Titré', 'Melkia', 'Contrat', 'Miftah', 'Contrat Judiciaire'];
    public const DETAILS = ['RDC', 'Sous Sol', 'Garage', 'Mezzanine'];

    public function client(){
        return $this->belongsTo(Client::class);
    }
    
    public function intermediaire(){
        return $this->belongsTo(Intermediaire::class);
    }

    public function service(){
        return $this->belongsTo(MaisonService::class, 'maison_service_id', 'id');
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function city_sector(){
        return $this->belongsTo(CitySector::class);
    }
}
