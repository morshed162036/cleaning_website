<?php

namespace App\Models\Server\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Server\Service\Service;
class Service_detail extends Model
{
    use HasFactory;
    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }
}
