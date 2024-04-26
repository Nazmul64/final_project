<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Models\Vandor;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\VenorNotifaction;
class VandorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('vandor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $random_password =Str::random(9);
    $user_info=User::create([
        'name' => $request->vendor_name,
        'email' =>$request->vendor_email,
        'phone_number' => $request->vendor_phone,
        'password' =>bcrypt($random_password),
        'role'=>3,
        'create_at'=>Carbon::now(),
      ]);
      Vandor::insert([
            'user_id'=>$user_info->id,
            'address' => $request->vendor_address,
      ]);
        Mail::to($request->vendor_email)->send(new VenorNotifaction($random_password));
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Vandor $vandor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vandor $vandor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vandor $vandor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vandor $vandor)
    {
        //
    }
}
