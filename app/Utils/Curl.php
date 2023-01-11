<?php

namespace App\Utils;

class Curl
{
    public static function request($request): array
    {
        $ff = FieldFormatter::getInstance();
        $cookies = $ff->formatCookie($request->cookies);
        $headers = $ff->formatHeader($request->headers);
        $data = $ff->formatData($request->data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $request->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request->method);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

        if (strlen($cookies) != 0) {
            curl_setopt($ch, CURLOPT_COOKIE, $cookies);
        }

        if ($request->method == 'POST' && strlen($data) != 0) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        $response = curl_exec($ch);
        if ($response === FALSE) {
            return ['error' => curl_error($ch)];
        }
        $info = curl_getinfo($ch);
        curl_close($ch);

        return ['response' => $response, 'info' => $info];
    }
}
