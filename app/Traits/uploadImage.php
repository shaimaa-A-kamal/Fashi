<?php
namespace  App\Traits;
Trait UploadImage{

    public function uploadImage($image,$folder){
        $extension=$image->getClientOriginalExtension();
        $path='images/'.$folder;
        $profilePic=time().".".$extension;
        $image->move($path,$profilePic);

        return $profilePic;
    }
}
?>
