<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\UpdateAddressRequest;
use App\Models\Address\Address;
use App\Models\Address\City;
use App\Models\Address\Region;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

class DetailedAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        try{
            $addresses=Address::where('user_id',auth()->id())->orderby('defaultAddress','desc')->get();
            return view('Users.Address.allUserAddresses',compact('addresses'));
        }catch(exception $e){
              abort(500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $regions=Region::get();
            $cities=City::get();
            return view('users.address.createAddress',compact('regions','cities'));
        }catch(exception $e){
                abort(500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateAddressRequest $request)
    {
     try{   $address=Address::where('floor',$request->floor)->where('flat',$request->flat)->where('building',         $request->building)->where('region_id',$request->region_id)->where('user_id',auth()->id())->first(       );
           if(!$address){
            $data=$request->except('_token','city_id');
            $data['user_id']=auth()->id();
            if(isset($request->defaultAddress) and $request->defaultAddress ){
                Address::where('defaultAddress','1')->update(['defaultAddress'=> Null]);
                $data['defaultAddress']=1;
               }
            else{
               $defaultAddress=Address::where('defaultAddress','1')->first();
               if(!$defaultAddress){
                $data['defaultAddress']=1;
               }
            }
            Address::create($data);
            $addresses=Address::where('user_id',auth()->id())->get();
            return redirect()->route('address.index')->with('addresses',$addresses);
           }
           else{
               return redirect()->back()->with('error','<div class="text-center alert alert-danger">Address is already exist</div>')->withInput($request->all());
           }


         }catch(Exception $e){
             abort(500);
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $address=Address::findOrFail($id);
            if($address)
            {
                $regions=Region::get();
                $cities=City::get();
                return view('users.address.editAddress',compact('address','regions','cities'));
            }
            else{
                abort(404);
            }
        }
        catch(Exception $e){
            abort(500);
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddressRequest $request, $id)
    {
        try{
            $address=Address::findOrFail($id);
            $data=$request->except(['_token','_method','city_id']);

            if($address)
            {
                if(isset($request->defaultAddress) and $request->defaultAddress ){
                 Address::where('defaultAddress','1')->update(['defaultAddress'=> Null]);
                 $data['defaultAddress']=1;
                }
                Address::where('id', $id)->update($data);
                $addresses=Address::where('user_id',auth()->id())->get();
                return view('Users.Address.allUserAddresses')->with('success','<div class="text-center alert alert-success">Address has been updated successfully</div>')->with('addresses',$addresses);

             }
            else{
                abort(404);
            }
        }
        catch(Exception $e){
            abort(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $address=Address::findOrFail($id);
            if($address)
            {
                $address->delete();
                $addresses=Address::where('user_id',auth()->id())->get();
                return response()->json(['status'=>true,
                                       'addresses'=>$addresses,
                             'message' =>'Address has been deleted successfully.']);
            }
            else{
                abort(404);
            }
        }
        catch(Exception $e){
            abort(500);
        }
    }

public function show($id){
    try{

        $address=Address::findOrFail($id);
        if($address){
            Address::where('defaultAddress',1)->update(['defaultAddress'=> Null]);
            $address->defaultAddress=1;
            $address->save();
            return redirect()->route('address.index');
        }
        else{
            abort(404);
        }
    }catch(Exception $e){
        abort(500);
    }

}
}
