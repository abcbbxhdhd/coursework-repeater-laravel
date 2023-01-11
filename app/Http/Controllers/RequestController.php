<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Utils\Curl;
use App\Utils\FieldFormatter;
use App\Utils\HtmlUtil;
use App\Utils\PostFormatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use WpOrg\Requests\Requests;

class RequestController extends Controller
{
    public function show(\App\Models\Request $request)
    {
        $ff = FieldFormatter::getInstance();
        $dataOut = $ff->formatData($request->data);
        $cookiesOut = $ff->formatCookie($request->cookies);
        $headerOut = $ff->formatHeader($request->headers);
        return view('request', ['req' => $request, 'dataOut' => $dataOut, 'cookiesOut' => $cookiesOut, 'headerOut' => $headerOut]);
    }

    public function sendRequest(\App\Models\Request $request)
    {
        $curlResponse = Curl::request($request);
        return view('sendRequest', ['response' => $curlResponse]);
    }

    public function all()
    {
        $requests = \App\Models\Request::all();
        return view('allRequests', ['reqs' => $requests]);
    }

    public function getCreate()
    {
        return view('createRequest');
    }

    public function postCreate(Request $request)
    {
        $req = $request->all();
        $formattedPost = PostFormatter::requestFormatToArray($req);

        $newRequest = new \App\Models\Request();
        $newRequest->url = $formattedPost['url'];
        $newRequest->method = $formattedPost['method'];
        $newRequest->save();
        if (isset($formattedPost['cookies'])) {
            foreach ($formattedPost['cookies'] as $cookie) {
                $newRequest->cookies()->create([
                    'cookie_key' => $cookie['cookie_key'],
                    'cookie_value' => $cookie['cookie_value']
                ]);
            }
        }

        if (isset($formattedPost['headers'])) {
            foreach ($formattedPost['headers'] as $header) {
                $newRequest->headers()->create([
                    'header_key' => $header['header_key'],
                    'header_value' => $header['header_value']
                ]);
            }
        }

        if (isset($formattedPost['data'])) {
            foreach ($formattedPost['data'] as $data) {
                $newRequest->data()->create([
                    'data_key' => $data['data_key'],
                    'data_value' => $data['data_value']
                ]);
            }
        }

        return redirect('/');
    }

    public function deleteRequest(\App\Models\Request $request)
    {
        $request->delete();
        return redirect('/');
    }

    public function findComments(\App\Models\Request $request)
    {
        $curlResponse = Curl::request($request);
        if (isset($curlResponse['error'])) {
            $comments = [];
        } else {
            $htmlResponse = $curlResponse['response'];
            $comments = HtmlUtil::findComments($htmlResponse);
        }
        Log::debug(json_encode($comments));
        Log::debug($comments[0]);
        return view('findComments', ['request' => $request, 'comments' => $comments]);
    }
}
