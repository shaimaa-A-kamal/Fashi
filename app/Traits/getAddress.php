<?php
namespace  App\Traits;
use App\Models\Address\Address;
Trait GetAddress{

    public function getAddress($addresses){
        $add=[];
        if($addresses){
            foreach($addresses as $address){
              $street=ucfirst($address->street);
              $region=ucfirst($address->region->name);
              $city= ucfirst($address->region->city->name);
              $userAddress=$street.' St,'.$region." , ".$city.".";
               array_push($add,$userAddress);
               }
        }
                  return $add;

    }

    public function checkAddress($address){
               if($address['building'] and $address['street'] and $address['region_id'])
           return true;
        else
        return false;

    }

    public function updateAddress($user,$addresses){
        foreach($addresses as $key=>$address){
            if($key != "new address"){
                $userAddress=Address::find($key);
                if($userAddress){
                    $address['user_id']=$user->id;
                    Address::where('id',$key)->update($address);
                }
                else{
                    abort(400);
                }
            }
            else{
               if($this->checkAddress($address)){
                $data=$address;
                $data['user_id']=$user->id;
               Address::create($data);
               }
            }
  }
    }


}
?>
