<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Intermediaire extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected $fillable = [
        'intermediaire_code',
        'intermediaire_name',
        'intermediaire_category_id',
        'intermediaire_status_id',
        'intermediaire_city_id',
        'intermediaire_city_sector_id',
        'intermediaire_telephone',
        'contacts',
        'created_at',
        'updated_at'
    ];

    public function status()
    {
        return $this->HasOne(IntermediaireStatus::class,'id', 'intermediaire_status_id');
    }
    public function category()
    {
        return $this->HasOne(IntermediaireCategory::class,'id', 'intermediaire_category_id');
    }

    public function city(){
        return $this->belongsTo(City::class,'intermediaire_city_id','id');
    }

    public function sector(){
        return $this->belongsTo(CitySector::class,'intermediaire_city_sector_id','id');
    }
}
