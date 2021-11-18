<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventInfoTable extends Model
{
    public $table='EventInfoTable';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;
}
