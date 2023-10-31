<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('decrypter'))
{
    function decrypter($string = "") {
        $keyphrase = 'rolplay_acumulados';
        $method = 'aes-256-cbc';
        $key = substr(hash('sha256', $keyphrase, true), 0, 32);
        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
    
        return openssl_decrypt(base64_decode($string), $method, $key, OPENSSL_RAW_DATA, $iv);
    }
}