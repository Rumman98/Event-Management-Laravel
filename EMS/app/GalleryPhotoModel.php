<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryPhotoModel extends Model
{
    public $table='gallery_photo';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;
}
