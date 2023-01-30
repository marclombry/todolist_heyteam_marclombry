<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic test for home page.
     * @test
     * @return void
     */
    public function a_render_homepage_route_is_good()
    {
        $response = $this->get(url('/'));
        $response->assertStatus(200);
    }
    /**
     * A basic test for rendering home view.
     * @test
     * @return void
     */
    public function a_render_view_home()
    {
        $response = $this->get(url('/'));
        $response->assertOk();
        $response->assertViewIs('pages.home');
    }

}
