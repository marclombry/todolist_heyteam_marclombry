<?php

namespace App\Services;

interface ApiInterface
{
    /**
     * @param string $key
     * @param string|int|null $data
     * @return mixed
     */
    public function get(string $key, string|int|null $data);

    /**
     * @param string $key
     * @param string|array|int $data
     * @return mixed
     */
    public function post(string $key, string|array|int $data);
}
