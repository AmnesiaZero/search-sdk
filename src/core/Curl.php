<?php

namespace Search\Sdk\Core;


class Curl
{
    const API = 'https://dev.api.search.ipr-smart.ru/api';


    /**
     * Отправка запроса
     * @param $apiMethod
     * @param $token
     * @param array $params
     * @return array|mixed
     */
    public static function exec($apiMethod, $token, array $params): mixed
    {
        if (!empty($params)) {
            $apiMethod = sprintf("%s?%s", $apiMethod, http_build_query($params, '', '&'));
        };
        $url = self::API.$apiMethod;
        $headers = array(
            'Authorization:Bearer ' . $token,
            'Content-Type: application/json',
            'Accept: application/json'
        );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl,CURLOPT_FOLLOWLOCATION, true);

        $curlResult = curl_exec($curl);
        if (curl_errno($curl)) {
            return Curl::getError('Curl error ' . curl_errno($curl) . ': ' . curl_error($curl), 500);
        }
        curl_close($curl);
        $result = json_decode($curlResult, true);
        if($result==null){
            return Curl::getError('API null response',400);
        }
        return $result;
    }


    /**
     * Вормирование сообщения в случае ошибки
     * @param $message
     * @param $code
     * @return array
     */
    private static function getError($message, $code): array
    {
        return [
            'success' => false,
            'message' => $message,
            'total' => 0,
            'status' => $code,
            'data' => null,
        ];
    }
}
