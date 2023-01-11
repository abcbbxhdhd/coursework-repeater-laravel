<?php

namespace App\Utils;

class FieldFormatter
{
    private static FieldFormatter $instance;

    private function __construct() {}

    public static function getInstance(): FieldFormatter
    {
        $cls = static::class;
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public function formatCookie($cookies): string
    {
        if ($cookies !== null) {
            $cookieOut = "";
            foreach ($cookies as $cookie) {
                $cookieOut .= $cookie->cookie_key . "=" . $cookie->cookie_value . "; ";
            }
            return rtrim($cookieOut, "; ");
        }
        return "";
    }

    public function formatData($data): string
    {
        if ($data !== null) {
            $dataOut = "";
            foreach ($data as $d) {
                $dataOut .= $d->data_key . "=" . $d->data_value . "&";
            }
            return rtrim($dataOut, "&");
        }
        return "";
    }

    public function formatHeader($headers): array
    {
        $headerArr = [];
        if ($headers !== null) {
            foreach ($headers as $header) {
                $headerArr[] = $header->header_key . ': ' . $header->header_value;
            }
        }
        return $headerArr;
    }
}
