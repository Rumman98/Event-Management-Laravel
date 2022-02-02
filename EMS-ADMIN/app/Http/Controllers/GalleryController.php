<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GalleryPhotoModel;

class GalleryController extends Controller
{
    function GalleryIndex(){
        $galleryphoto=GalleryPhotoModel::get();

        return View('Gallery',[
            'galleryphoto'=>$galleryphoto
        ]);
    }

    function GalleryPhotoUpload(Request $request)
    {
        $galleryphotoPath = $request->file('photo')->store('public');
        $photoName = (explode('/',$galleryphotoPath))[1];

        $host = $_SERVER['HTTP_HOST'];
        $location = "http://".$host."/storage/".$photoName;

        $result = GalleryPhotoModel::insert([
            'gallery_photo_location'=>$location
        ]);

        return 1;
    }


}
