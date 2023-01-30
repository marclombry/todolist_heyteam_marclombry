<?php

namespace Tests\Unit;

use App\Services\ApiService;
use PHPUnit\Framework\TestCase;

class ApiServiceTest extends TestCase
{
    const uri_aws = [
        "POST" => "https://arfkcpx7m7.execute-api.us-east-1.amazonaws.com/dev/todos",
        "GET" => "https://arfkcpx7m7.execute-api.us-east-1.amazonaws.com/dev/todos",
        "GET_ID" => "https://arfkcpx7m7.execute-api.us-east-1.amazonaws.com/dev/todos/{id}",
        "PUT" => "https://arfkcpx7m7.execute-api.us-east-1.amazonaws.com/dev/todos/{id}",
        "DELETE" => "https://arfkcpx7m7.execute-api.us-east-1.amazonaws.com/dev/todos/{id}"
    ];

    /**
     * @test
     * @return void
     */
    public function test_uri_aws_is_array()
    {
        $this->assertIsArray(self::uri_aws);
    }

    /**
     * @test
     * @return void
     */
    public function test_uri_aws_contains_crud_key()
    {
        $this->assertArrayHasKey("POST", self::uri_aws);
        $this->assertArrayHasKey("GET", self::uri_aws);
        $this->assertArrayHasKey("GET_ID", self::uri_aws);
        $this->assertArrayHasKey("PUT", self::uri_aws);
        $this->assertArrayHasKey("DELETE", self::uri_aws);
    }

    /**
     * @test
     * @return void
     */
    public function test_api_service_exists()
    {
        $apiService = new ApiService();
        $this->assertInstanceOf(ApiService::class, $apiService);
    }

    /**
     * @test
     * @return void
     */
    public function test_method_get_exists()
    {
        $apiService = new ApiService();
        $this->assertTrue(method_exists($apiService,'get'),true);
    }

    /**
     * @test
     * @return void
     */
    public function test_method_post_exists()
    {
        $apiService = new ApiService();
        $this->assertTrue(method_exists($apiService,'post'),true);
    }

}
