<div id="dropdown">
        <a  class="dropbtn" href="#" onclick="myfunction(event)" id='link'>Add New Address +</a>
        <div id="myDropdown" class="dropdown-content">
                <label style='font-size:18px;color:#252525;'>Address</label>
                <x-users.edit :regions='$regions'/>
                <button class='btn btn-primary' onclick="fun(event)" class='address'>Add Address</button>
        </div>
</div>
