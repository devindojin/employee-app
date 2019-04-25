<?php

namespace App\Repositories\Traits;

trait CurlRequestTrait
{
    /**
     * cURL reuqest 
     *
     * @param $request
     * @param $header
     * 
     * @return json
     */
    
    public function request ($getUrl, $action, $headers = array(), $param = '', $file = '',$fileName='')
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $getUrl);

        if ( count($headers) > 0 ) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        switch($action){

        case "POST":
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        break;

        case "POSTARR":
          curl_setopt_array ( $ch, array (
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array (
              'data' => $param
            )
          ) );
        break;

        case "GET":
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        break;

        case "PUT":
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
          curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        break;

        case "PATCH":
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
          curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        break;

        case "PUTARR":
          curl_setopt_array ( $ch, array (
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => array (
              'data' => $param
            )
          ) );
        break;

        case "DELETE":
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        break;

        case "FILE":
          curl_setopt_array ( $ch, array (
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array (
              'content' => new \CURLFile ( $file, "", $fileName ),
              'id' => $param
            )
          ) );
        break;

        default:
        break;
        }

        $result_fetch_pot = curl_exec($ch);

        curl_close($ch);

        return $result_fetch_pot;
    }
}