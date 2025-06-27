<?php

namespace App\Services;

class SodiumEncriptionService
{
    private $key;
    public function __construct()
    {
        $this->key = config("app.sodium_key");
    }
    public function encript($data){
        $key_base64 = config("app.sodium_key");
        $key = base64_decode($key_base64);
        $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        $ciphertext = sodium_crypto_secretbox($data, $nonce, $key);
        return base64_encode($nonce . $ciphertext);
    }
    public function decript($base64_combine){
        $key_base64 = config("app.sodium_key");
        $key = base64_decode($key_base64);
        $combine = base64_decode($base64_combine);
        $nonce = substr($combine,0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        $ciphertext = substr($combine, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        return sodium_crypto_secretbox_open($ciphertext, $nonce, $key);
    }
}
