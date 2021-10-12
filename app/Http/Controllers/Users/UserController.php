<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\EditRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Traits\UploadImage;
use  App\Traits\GetAddress;


class UserController extends Controller
{
    use UploadImage;
    use GetAddress;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if (auth()->id() == $id) {
            $address = $user->addresses->where('defaultAddress', '1')->first();
            return view('users.profile', compact('user', 'address'));
        } else
            abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        if (auth()->id() == $id) {
            return view('users.edit', compact('user'));
        } else
            abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            if (auth()->id() == $id) {
                $data = $request->except(['_token', 'image', '_method']);
                if ($request['image']) {
                    $data['image'] =   $this->uploadImage($request->file('image'), 'users/');
                }
                User::where('id', $id)->update($data);
                $user = User::find($id);
                $address = $user->addresses->where('defaultAddress', '1')->first();
                return redirect(route('users.show',$user->id))->with('success','<div class="text-center alert alert-success">Your Profile has been updated successfully</div>');
            } else
                abort(403);
        } catch (Exception $e) {
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
        //
    }
}
