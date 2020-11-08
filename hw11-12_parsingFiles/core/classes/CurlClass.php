<?php

namespace Core\Classes;

class CurlClass
{
    public $data;
    public $result = [];

    ///put data with domain and rang
    public function __construct($data)
    {
        $this->data = $data;

    }

    ///return response status and time for answer from server
    public function getStatus()
    {
        foreach($this->data as $domain => $rang)
        {
            //init work with curl
            $ch = curl_init($domain);

            //return answer in string unless showing in brows 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //for redirects
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            //take a headers in answer (status coming)
            curl_setopt($ch, CURLOPT_HEADER, false);

            //make request to curk
            curl_exec($ch);

            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $time = round(curl_getinfo($ch, CURLINFO_CONNECT_TIME), 2);

            curl_close($ch);

            //complited array with result
            $this->result[] = [
                'domain' => $domain,
                'rang' => $rang,
                'http_code' => $http_code,
                'time' => $time
            ];

        }

        return $this->result; 
    }
}