<?php

namespace App\Models\Server\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Server\Service\Service_detail;
class Service extends Model
{
    use HasFactory;
    public function service_details()
    {
        return $this->hasOne(Service_detail::class,'service_id');
    }
}
