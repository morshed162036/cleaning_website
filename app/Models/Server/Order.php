<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Server\Service\Service;
use App\Models\Server\PricingPlane;
class Order extends Model
{
    use HasFactory;
    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
    public function plan()
    {
        return $this->belongsTo(PricingPlane::class,'plan_id');
    }
}
