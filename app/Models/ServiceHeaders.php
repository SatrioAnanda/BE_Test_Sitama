<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceHeaders extends Model
{
    protected $table = 'service_headers';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    public function serviceDetail(): HasMany
    {
        return $this->hasMany(ServiceDetails::class, "service_id", "id");
    }
}
