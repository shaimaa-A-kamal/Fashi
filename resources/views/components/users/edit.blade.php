<div class='row'>
        <div class='col-md-3'>
                <div class='group-input'>
                        <label for='flat'>Flat </label>
                        <input type='text' id='flat' name='flat' value='{{ $flat?$flat:old("flat")}}'>
                        @error('flat')
                        <small class='text-danger'>{{ $message }}</small>
                       @enderror
                </div>
        </div>
        <div class='col-md-3'>
                <div class='group-input'>
                        <label for='floor'>Floor </label>
                        <input type='text' id='floor' name='floor' value='{{ $floor?$floor:old("floor")}}'>
                        @error('floor')
                        <small class='text-danger'>{{ $message }}</small>
                       @enderror
                </div>
        </div>
        <div class='col-md-3'>
                <div class='group-input'>
                        <label for='building'>Building *</label>
                        <input type='text' id='building' name='building' value='{{ $building?$building:old("building")}}'>
                        @error('building')
                        <small class='text-danger'>{{ $message }}</small>
                       @enderror
                </div>
        </div>
        <div class='col-md-3'>
                <div class='group-input'>
                        <label for='street'>Street *</label>
                        <input type='text' id='street' name='street' value='{{ $street?$street:old("street")}}'>
                        @error('street')
                        <small class='text-danger'>{{ $message }}</small>
                       @enderror
                </div>
        </div>
</div>
<div class='row'>
    <div class='col-md-6'>
            <div class='group-input'>
                    <label for='region'>Region *</label>
                    <select class='form-select sel' id='region' name='region_id' aria-label='select region'>
                            <option ></option>
                            @foreach($regions as $region)
                            <option value='{{$region->id}}'  {{($region->id==($addressRegionId?$addressRegionId:old("region_id")))?'selected':'';}}>{{ucfirst($region->name)}}</option>
                            @endforeach
                     </select>
                     @error('region_id')
                     <small class='text-danger'>{{ $message }}</small>
                    @enderror
               </div>
    </div>
    <div class='col-md-6'>
            <div class='group-input'>
                    <label for='city'>City *</label>
                    <select class='form-select sel' id='city' name='city_id' aria-label='select city'>
                            <option ></option>
                            @foreach($cities as $city)
                            <option value='{{$city->id}}'  {{($city->id==($addressCityId?$addressCityId:old("city_id")))?'selected':'';}}>{{ucfirst($city->name)}}</option>
                            @endforeach
                     </select>
                     @error('city_id')
                     <small class='text-danger'>{{ $message }}</small>
                    @enderror
               </div>
    </div>
</div>
