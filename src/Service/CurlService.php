<?php

namespace App\Service;

class CurlService{

    const API_URL = "https://api.stackexchange.com/2.2/questions?site=stackoverflow";

    public function call_api(string $parameters):string{

        $request_url  =  CurlService::API_URL.(strlen($parameters)>0?"&".$parameters:'');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$request_url);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');  
        curl_setopt($ch, CURLOPT_HEADER, 0);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
    
        return $response;
    }
}