<?php
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Response;

if (!function_exists('request')) {
 /**
     * Get an instance of the current request or an input item from the request.
     *
     * @param  string $key
     * @param  mixed  $default
     *
     * @return \Illuminate\Http\Request|string|array
     */
    function request($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('request');
        }

        return app('request')->input($key, $default);
    }
}

if (!function_exists('response')) {
    /**
     * Return a new response from the application.
     *
     * @param  string $content
     * @param  int    $status
     * @param  array  $headers
     *
     * @return \Symfony\Component\HttpFoundation\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    function response($content = '', $status = 200, array $headers = [])
    {
        $factory = app(\Illuminate\Support\Facades\Response::class);

        if (func_num_args() === 0) {
            return $factory;
        }

        return $factory->make($content, $status, $headers);
    }
}


if (!function_exists("guid")) {
    function guid()
    {
        $guid = Uuid::uuid4();

        return $guid->toString();
    }
}