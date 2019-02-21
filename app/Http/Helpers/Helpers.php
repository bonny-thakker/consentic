<?php

namespace App\Http\Helpers;
use Illuminate\Contracts\Encryption\DecryptException;

function decryptField($value){

    try {
        $decrypted = decrypt($value);
    } catch (DecryptException $e) {
        //
    }

    return $decrypted ?? null;

}