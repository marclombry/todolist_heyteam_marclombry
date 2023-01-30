<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ApiService;

class HomeController extends Controller
{
    private $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        $todoLists = $this->apiService->get('GET', null);
        return view('pages.home', ["todoLists" => $todoLists]);
    }
}
