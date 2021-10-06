<?php
namespace  App\Traits;
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
          return $add;
        }


    return $address;
    }
}
?>
