<?php
if (!function_exists('scopeExists')) {
    /**
     * @param $class
     * @param $scopeName
     * @return bool
     */
    function scopeExists($class, $scopeName)
    {
        return method_exists($class, 'scope' . ucfirst($scopeName));
    }
}

if (!function_exists('arrayConcat')) {
    /**
     * @param array $values
     * @return string
     */
    function arrayConcat($array = array(), $glue = ',')
    {
        $result = '';
        $count  = 0;
        foreach ($array as $value) {
            $result .= "'$value'";
            if ($count != count($array) - 1) {
                $result .= "$glue";
            }
            $count++;
        }
        return $result;
    }
}

if (!function_exists('clearCache')) {
    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    function clearCache()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => env('API_CLOUDFLARE'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => "{\"purge_everything\":true}",
            CURLOPT_HTTPHEADER     => array(
                "Content-Type: application/json",
                "Postman-Token: 8bebf8e3-8341-44ad-8c01-cc40edb915cd",
                "X-Auth-Email: " . env('AUTH_EMAIL'),
                "X-Auth-Key: " . env('AUTH_KEY'),
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err      = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            \Log::info('clearCache::response::' . json_encode($response));
            return $response;
        }
    }
}