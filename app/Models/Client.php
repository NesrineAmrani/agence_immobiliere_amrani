<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected $fillable = [
        'client_code',
        'client_name',
        'client_category_id',
        'client_status_id',
        'client_city_id',
        'client_city_sector_id',
        'client_city',
        'client_telephone',
        'contacts',
        'created_at',
        'updated_at'
    ];

    public function status()
    {
        return $this->HasOne(ClientStatus::class,'id', 'client_status_id');
    }
    public function category()
    {
        return $this->HasOne(ClientCategory::class,'id', 'client_category_id');
    }

    public function city(){
        return $this->belongsTo(City::class,'client_city_id','id');
    }

    public function sector(){
        return $this->belongsTo(CitySector::class,'client_city_sector_id','id');
    }

    public function appartements(){
        return $this->hasMany(Appartement::class);
    }

}
