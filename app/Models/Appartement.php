<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Appartement extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected $fillable = [
        'appartement_etat',
        'appartement_code',
        'appartement_type',
        'appartement_situation',
        'appartement_etage',
        'appartements_en_etage',
        'appartements_en_immeuble',
        'largeur_1',
        'largeur_2',
        'largeur_3',
        'appartement_facade',
        'facade_details',
        'surface',
        'description',
        'ascenseur',
        'parking',
        'nbr_chambre',
        'nbr_salon',
        'nbr_balcon',
        'nbr_patio',
        'nbr_toilette',
        'nbr_cuisine',
        'prix_metre',
        'prix_total',
        'prix_declaration',
        'client_id',
        'intermediaire_id',
        'city_id',
        'city_sector_id',
        'appartement_service_id',
        'created_at',
        'updated_at'
    ];

    public const FACADES = ['Rue', 'Patio', 'Place', 'Piscine', 'Sur Mer', 'Vue Panoramique'];
    public const SITUATIONS = ['Titré', 'Melkia', 'Contrat', 'Miftah', 'Contrat Judiciaire'];

    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function intermediaire(){
        return $this->belongsTo(Intermediaire::class);
    }
    public function service(){
        return $this->belongsTo(AppartementService::class, 'appartement_service_id', 'id');
    }
    public function city(){
        return $this->belongsTo(City::class);
    }

    public function city_sector(){
        return $this->belongsTo(CitySector::class);
    }

}
