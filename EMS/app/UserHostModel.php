<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHostModel extends Model
{
    public $table='UserHostTable';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;
}
