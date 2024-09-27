<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Jobs\JobQueueAddUser; 
use Carbon\Carbon;
use Faker\Factory;

class ApiKController extends Controller
{
    public function __construct()
    {
         
    }

    public function create(Request $request){

        //$user = User::create($request->all()); 
        $faker = Factory::create();
        $email  = $faker->email;
        $data = User::create(
            ['name' => 'John Doe', 
            'email' => $email, 
            'password' => 'mnn',
            'id_jabatan' => '1',
            'no_tel_pejabat' => '1',
            'no_hp' => '1',
            'peranan' => '1',
            'no_kp' => '99999999999944',
            'status_peserta' => '1',
            'batch' => 'SPIK PDRM 2024', 
        ]);

        // Return a success response
        return response()->json(['message' => 'User created successfully'], 201);
        /*
        $record = DB::table('personaliti_spik_pdrm')
        ->where('id', 1)
        ->update([
            //'masa' => $request->masa,
            'soalan_1' => $request->soalan_1,
            'soalan_2' => $request->soalan_2,
            'soalan_3' => $request->soalan_3,
            'soalan_4' => $request->soalan_4,
            'soalan_5' => $request->soalan_5,
            'soalan_6' => $request->soalan_6,
            'soalan_7' => $request->soalan_7,
            'soalan_8' => $request->soalan_8,
            'soalan_9' => $request->soalan_9,
            'soalan_10' => $request->soalan_10,
            'soalan_11' => $request->soalan_11,
            'soalan_12' => $request->soalan_12,
            'soalan_13' => $request->soalan_13,
            'soalan_14' => $request->soalan_14,
            'soalan_15' => $request->soalan_15,
            'soalan_16' => $request->soalan_16,
            'soalan_11' => $request->soalan_17,
            'soalan_18' => $request->soalan_18,
            'soalan_19' => $request->soalan_19,
            'soalan_20' => $request->soalan_20,
        ]);

        if (!$record) {
            // Handle the case where the record doesn't exist
            return response()->json(['message' => 'Record not found'], 404);
        }else{
            return response()->json(['message' => 'Record updated successfully']);
        }
        // Return a success response
        */
    }

    public function update(Request $request){

        $record = User::where('id', 102) ->first();

        if (!$record) {
            // Handle the case where the record doesn't exist
            return response()->json(['message' => 'Record not found'], 404);
        }else{
            // Update the record with the new values
            $record->update($request->all());

        }

        // Return a success response
        return response()->json(['message' => 'record updated successfully', 'record' => $record], 201);
        /*
        $record = DB::table('personaliti_spik_pdrm')
        ->where('id', 1)
        ->update([
            //'masa' => $request->masa,
            'soalan_1' => $request->soalan_1,
            'soalan_2' => $request->soalan_2,
            'soalan_3' => $request->soalan_3,
            'soalan_4' => $request->soalan_4,
            'soalan_5' => $request->soalan_5,
            'soalan_6' => $request->soalan_6,
            'soalan_7' => $request->soalan_7,
            'soalan_8' => $request->soalan_8,
            'soalan_9' => $request->soalan_9,
            'soalan_10' => $request->soalan_10,
            'soalan_11' => $request->soalan_11,
            'soalan_12' => $request->soalan_12,
            'soalan_13' => $request->soalan_13,
            'soalan_14' => $request->soalan_14,
            'soalan_15' => $request->soalan_15,
            'soalan_16' => $request->soalan_16,
            'soalan_11' => $request->soalan_17,
            'soalan_18' => $request->soalan_18,
            'soalan_19' => $request->soalan_19,
            'soalan_20' => $request->soalan_20,
        ]);

        if (!$record) {
            // Handle the case where the record doesn't exist
            return response()->json(['message' => 'Record not found'], 404);
        }else{
            return response()->json(['message' => 'Record updated successfully']);
        }
        // Return a success response
        */
    }

    public function job_queue_create(){

        //$user = User::create($request->all());

        JobQueueAddUser::dispatch()->delay(Carbon::now()->addMinutes(1));

        // Return a success response
        return response()->json(['message' => 'User Job created successfully'], 201);
         
    }

    public function get()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function apilogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate  the user
        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Generate a new token if necessary (e.g., using Laravel Passport or Sanctum)
        // $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'token' => $token,
            // Add other response data as needed
        ]);
    }

     
}
