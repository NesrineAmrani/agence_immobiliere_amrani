<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Terrain extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected $fillable = [
        'terrain_code',
        'terrain_etat',
        'terrain_facade',
        'terrain_situation',
        'description',
        'surface',
        'terrain_etage',
        'terrain_recule',
        'terrain_garage_hauteur',
        'prix_metre',
        'prix_total',
        'prix_declaration',
        'client_id',
        'city_id',
        'city_sector_id',
        'intermediaire_id',
        'terrain_service_id',
        'created_at',
        'updated_at'
    ];

    public static $ETATS = ['Lotissement', 'Quartier', 'Zone Villa', 'Agricole', 'Stockage', 'Industrie'];
    public static $FACADES = ['Rue', 'Place', 'Piscine', 'Sur Mer'];
    public const SITUATIONS = ['Titré', 'Melkia', 'Contrat', 'Contrat Judiciaire'];
    
    public static $RECULES = ['Garage', 'RDC', 'Sous Sol', 'Mezzanine'];

    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function intermediaire(){
        return $this->belongsTo(Intermediaire::class);
    }
    public function service(){
        return $this->belongsTo(TerrainService::class, 'terrain_service_id', 'id');
    }
    public function city(){
        return $this->belongsTo(City::class);
    }

    public function city_sector(){
        return $this->belongsTo(CitySector::class);
    }
}
