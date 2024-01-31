<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceHeaderIcons extends Model
{
    protected $table = 'service_header_icons';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    public function contacts(): BelongsTo
    {
        return $this->belongsTo(ServiceDetails::class, "service_header_id", "id");
    }
}
