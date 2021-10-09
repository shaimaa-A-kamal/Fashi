<div class='row'>
        <div class='col-md-3'>
                <div class="group-input">
                        <label for="flat">Flat </label>
                        <input type="text" id="flat" name="address[id][{{$id}}][flat]" value='{{$flat}}'>
                        @error('flat')
                        <small class="text-danger">{{ $message }}</small>
                       @enderror
                </div>
        </div>
        <div class='col-md-3'>
                <div class="group-input">
                        <label for="floor">Floor </label>
                        <input type="text" id="floor" name="address[id][{{$id}}][floor]" value='{{$floor}}'>
                        @error('floor')
                        <small class="text-danger">{{ $message }}</small>
                       @enderror
                </div>
        </div>
        <div class='col-md-3'>
                <div class="group-input">
                        <label for="building">Building *</label>
                        <input type="text" id="building" name="address[id][{{$id}}][building]"value='{{$building}}'>
                        @error('building')
                        <small class="text-danger">{{ $message }}</small>
                       @enderror
                </div>
        </div>
        <div class='col-md-3'>
                <div class="group-input">
                        <label for="street">Street *</label>
                        <input type="text" id="street"name="address[id][{{$id}}][street]" value='{{$street}}'>
                        @error('street')
                        <small class="text-danger">{{ $message }}</small>
                       @enderror
                </div>
        </div>
</div>
<div class='row'>
    <div class='col-md-6'>
            <div class="group-input">
                    <label for="region">Region *</label>
                    <select class="form-select sel" id='region' name="address[id][{{$id}}][region_id]" aria-label="select region">
                            <option ></option>
                            @foreach($regions as $region)
                            <option value='{{$region->id}}'  {{($region->id==$addressRegionId)?"selected":"";}}>{{ucfirst($region->name)}}</option>
                            @endforeach
                     </select>
                     @error('region_id')
                     <small class="text-danger">{{ $message }}</small>
                    @enderror
               </div>
    </div>
</div>
