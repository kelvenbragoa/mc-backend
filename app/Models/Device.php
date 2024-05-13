<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Device extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;
    use HasSlug;


    protected $fillable = [
        'make',
        'name',
        'model',
        'serial',
        'image',
        'type_device_id',
        'device_status_id',
        'device_availability_id'
    ];

    public function devicestatus(): BelongsTo
    {
        return $this->belongsTo(DeviceStatus::class,'device_status_id','id')->withTrashed();
    }

    public function deviceavailability(): BelongsTo
    {
        return $this->belongsTo(DeviceAvailability::class,'device_availability_id','id')->withTrashed();
    }

    public function typedevice(): BelongsTo
    {
        return $this->belongsTo(TypeDevice::class,'type_device_id','id')->withTrashed();
    }

    public function employeeholding(): HasOne
    {
        return $this->hasOne(Delivery::class,'device_id','id')->where('operation_id',1)->withTrashed();
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
        ->generateSlugsFrom('name')
        ->saveSlugsTo('slug')
        ->preventOverwrite();
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }
}
