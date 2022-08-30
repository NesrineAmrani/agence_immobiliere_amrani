<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Ferma extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected $fillable = [
        'ferma_code',
        'ferma_facade', // array
        'ferma_situation', // array
        'ferma_etat', // array
        'ferma_surface_total',
        'ferma_surface_batie',
        'surface_jardin',
        'nbr_etages',
        'surface',
        'ferma_details', // array
        'largeur_1',
        'largeur_2',
        'largeur_3',
        'activite',
        'projet',
        'description',
        'prix_metre',
        'prix_total',
        'prix_declaration',
        'client_id',
        'city_id',
        'city_sector_id',
        'intermediaire_id',
        'ferma_service_id',
        'created_at',
        'updated_at'
    ];
    public const ETATS = ['Nouveau', 'Déjà Utilisé'];
    public const FACADES = ['Rue', 'Place', 'Piscine'];
    public const SITUATIONS = ['Titré', 'Melkia', 'Contrat', 'Contrat Judiciaire'];
    public const DETAILS = ['Piscine', 'Eau', 'Électricité', 'Puits'];

    public function client(){
        return $this->belongsTo(Client::class);
    }
    
    public function intermediaire(){
        return $this->belongsTo(Intermediaire::class);
    }

    public function service(){
        return $this->belongsTo(FermaService::class, 'ferma_service_id', 'id');
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function city_sector(){
        return $this->belongsTo(CitySector::class);
    }
}
