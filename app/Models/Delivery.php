<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Delivery extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = [
        'observation_delivery',
        'observation_returning',
        'delivered_by_user_id',
        'returned_by_user_id',
        'delivered_date',
        'returned_date',
        'employee_id',
        'company_id',
        'device_id',
        'operation_id',
        
        
        
    ];

    public function device(): HasOne
    {
        return $this->hasOne(Device::class,'id','device_id')->withTrashed();
    }

    public function delivereduser(): HasOne
    {
        return $this->hasOne(User::class,'id','delivered_by_user_id')->withTrashed();
    }
    public function returninguser(): HasOne
    {
        return $this->hasOne(User::class,'id','returning_by_user_id')->withTrashed();
    }


    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class,'id','employee_id')->withTrashed();
    }

    public function company(): HasOne
    {
        return $this->hasOne(Company::class,'id','company_id')->withTrashed();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }

}
