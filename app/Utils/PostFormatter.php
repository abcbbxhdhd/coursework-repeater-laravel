<?php

namespace App\Utils;

use Illuminate\Support\Facades\Log;

class PostFormatter
{
    public static function requestFormatToArray($request): array
    {
        $res = [];
        $headers = $request['headers'] ?? [];
        $cookies = $request['cookies'] ?? [];
        $data = $request['data'] ?? [];
        $url = $request['url'];
        $method = $request['method'];
        if (!empty($cookies)) {
            try {
                foreach (explode('; ', $cookies) as $cookiePair) {
                    $cookieParts = explode('=', $cookiePair);
                    Log::debug($cookieParts[0] . ' ' . $cookieParts[1]);
                    $res['cookies'][] = ['cookie_key' => $cookieParts[0], 'cookie_value' => $cookieParts[1]];
                }
            } catch (\Exception $e) {
                $cookieParts = explode('=', $cookiePair);
                $res['cookies'][] = ['cookie_key' => $cookieParts[0], 'cookie_value' => $cookieParts[1]];
            }
        }

        if (!empty($data)) {
            try {
                foreach (explode('&', $data) as $d) {
                    $dataParts = explode('=', $d);
                    $res['data'][] = ['data_key' => $dataParts[0], 'data_value' => $dataParts[1]];
                }
            } catch (\Exception $e) {
                $dataParts = explode('=', $d);
                $res['data'][] = ['data_key' => $dataParts[0], 'data_value' => $dataParts[1]];
            }
        }
        if (!empty($headers)) {
            Log::debug($headers);
            try {
                foreach (explode("\r\n", $headers) as $h) {
                    $headerParts = explode(': ', $h);
                    $res['headers'][] = ['header_key' => $headerParts[0], 'header_value' => $headerParts[1]];
                }
            } catch(\Exception $e) {
                $headerParts = explode(':', $headers);
                $res['headers'][] = ['header_key' => $headerParts[0], 'header_value' => $headerParts[1]];
            }
        }
        $res['url'] = $url;
        $res['method'] = $method;
        Log::debug(json_encode($res));
        return $res;
    }
}
