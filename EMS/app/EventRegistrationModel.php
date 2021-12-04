<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventRegistrationModel extends Model
{
    public $table='EventRegistration';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;
}
