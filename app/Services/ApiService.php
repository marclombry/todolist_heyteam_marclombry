<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService Implements ApiInterface
{
    const uri_aws = [
        "POST" => "https://arfkcpx7m7.execute-api.us-east-1.amazonaws.com/dev/todos",
        "GET" => "https://arfkcpx7m7.execute-api.us-east-1.amazonaws.com/dev/todos",
        "GET_ID" => "https://arfkcpx7m7.execute-api.us-east-1.amazonaws.com/dev/todos/",
        "PUT" => "https://arfkcpx7m7.execute-api.us-east-1.amazonaws.com/dev/todos/",
        "DELETE" => "https://arfkcpx7m7.execute-api.us-east-1.amazonaws.com/dev/todos/"
    ];

    /**
     * @param string|null $key
     * @return string|string[]
     */
    public function getUriAws(string|null $key = null)
    {
        if(null != $key && in_array($key,self::uri_aws))
        {
            return self::uri_aws[$key];
        }
        return self::uri_aws;
    }

    /**
     * @param string $key
     * @param string|int|null $data
     * @return array|bool
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function get(string $key, string|int|null $data) : array|bool
    {
        $methodAuthorized = ['GET','GET_ID'];
        if(! in_array($key, $methodAuthorized)) {
            return false;
        }

        $uri = null !== $data ? self::uri_aws[$key].''.$data : self::uri_aws[$key];
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->withOptions([
                'verify' => false,
        ])->get($uri);

        if (!$response->successful()) {
            return $response->throw()->json();
        }
        return $response->json();
    }

    /**
     * @param string $key
     * @param string|array|int $data
     * @return array|bool
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function post(string $key, string|array|int $data) : array|bool
    {
        $methodAuthorized = ['POST','PUT','PATCH','DELETE'];
        if(! in_array($key, $methodAuthorized)) {
            return false;
        }

        $uri = $key != 'PUT' && $key != 'DELETE' ? self::uri_aws[$key] : self::uri_aws[$key].''.$data ;
        $response = Http::post($uri, $data);

        if (!$response->successful()) {
            return $response->throw()->json();
        }
        return $response->json();
    }

}
