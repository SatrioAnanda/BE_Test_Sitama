<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceDetails extends Model
{
    protected $table = 'service_details';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    public function contacts(): BelongsTo
    {
        return $this->belongsTo(ServiceDetails::class, "service_id", "id");
    }
}
