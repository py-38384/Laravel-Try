<?php

namespace App\Http\Controllers;

use App\Facades\SodiumEncription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PrimaryController extends Controller
{
    public function __invoke(){
        $data = "Hallo my name is piyal";
        dump("Data = {$data}");
        $encripted_data = SodiumEncription::encript($data);
        dump("Encripted Data = {$encripted_data}");
        $decripted_data = SodiumEncription::decript($encripted_data);
        dump("Decripted Data = $decripted_data");

        $encripted_data = encrypt($data);
        dump("Encripted Data = {$encripted_data}");
        $decripted_data = decrypt($encripted_data);
        dd("Decripted Data = $decripted_data");



        $password = "piyal";
        $hash = Hash::make($password);
        $newPassword = "piyal1";
        if(Hash::check($newPassword, $hash)){
            dump('Password Matched');
        } else {
            dump("Password Didn't Matched");
        }

        // $password = "piyal";
        // $hash = bcrypt($password);
        // $newPassword = "piyal1";
        // if(password_verify($password, $hash)){
        //     dd('Password Matched');
        // } else {
        //     dd("Password Didn't Matched");
        // }

        die();
    }
}
