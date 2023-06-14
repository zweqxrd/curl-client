<?php

namespace Jesuzweq;

class Curl
{
    private static $init;

    public static function Initialize()
    {
        self::$init = curl_init();
        curl_setopt(self::$init, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(self::$init, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36");
    }

    public static function SetOption($option, $value)
    {
        curl_setopt(self::$init, $option, $value);
    }

    public static function Get($url, $data = null)
    {
        if(is_array($data)) {
            $url = $url . '?' . http_build_query($data);
        }

        curl_setopt(self::$init, CURLOPT_URL, $url);
        curl_setopt(self::$init, CURLOPT_HTTPGET, true);
    }

    public static function Post($url, $data = null)
    {
        if(is_array($data)) {
            curl_setopt(self::$init, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        curl_setopt(self::$init, CURLOPT_URL, $url);
        curl_setopt(self::$init, CURLOPT_POST, true);
    }

    public static function Put($url, $data = null)
    {
        if(is_array($data)) {
            curl_setopt(self::$init, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        curl_setopt(self::$init, CURLOPT_URL, $url);
        curl_setopt(self::$init, CURLOPT_CUSTOMREQUEST, 'PUT');
    }

    public static function Delete($url, $data = null)
    {
        if(is_array($data)) {
            curl_setopt(self::$init, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        curl_setopt(self::$init, CURLOPT_URL, $url);
        curl_setopt(self::$init, CURLOPT_CUSTOMREQUEST, 'DELETE');
    }

    public static function Head($url, $data = null)
    {
        if(is_array($data)) {
            $url = $url . '?' . http_build_query($data);
        }

        curl_setopt(self::$init, CURLOPT_URL, $url);
        curl_setopt(self::$init, CURLOPT_NOBODY, true);
        curl_setopt(self::$init, CURLOPT_CUSTOMREQUEST, 'HEAD');
    }

    public static function Options($url, $data = null)
    {
        if(is_array($data)) {
            $url = $url . '?' . http_build_query($data);
        }

        curl_setopt(self::$init, CURLOPT_URL, $url);
        curl_setopt(self::$init, CURLOPT_CUSTOMREQUEST, 'OPTIONS');
    }

    public static function Patch($url, $data = null)
    {
        if(is_array($data)) {
            curl_setopt(self::$init, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        curl_setopt(self::$init, CURLOPT_URL, $url);
        curl_setopt(self::$init, CURLOPT_CUSTOMREQUEST, 'PATCH');
    }

    public static function SetHeaders($headers)
    {
        curl_setopt(self::$init, CURLOPT_HTTPHEADER, $headers);
    }

    public static function SetBasicAuth($username, $password)
    {
        curl_setopt(self::$init, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt(self::$init, CURLOPT_USERPWD, $username . ':' . $password);
    }

    public static function SetBearerToken($token)
    {
        $authorizationHeader = 'Authorization: Bearer ' . $token;
        curl_setopt(self::$init, CURLOPT_HTTPHEADER, [$authorizationHeader]);
    }

    public static function FollowRedirects($follow = true)
    {
        curl_setopt(self::$init, CURLOPT_FOLLOWLOCATION, $follow);
        curl_setopt(self::$init, CURLOPT_MAXREDIRS, 10);
    }

    public static function Timeout($timeout)
    {
        curl_setopt(self::$init, CURLOPT_TIMEOUT, $timeout);
    }

    public static function SSLVerifyPeer($verify = true)
    {
        curl_setopt(self::$init, CURLOPT_SSL_VERIFYPEER, $verify);
    }

    public static function SSLVerifyHost($verify = true)
    {
        curl_setopt(self::$init, CURLOPT_SSL_VERIFYHOST, $verify ? 2 : 0);
    }

    public static function SetProxy($proxy)
    {
        curl_setopt(self::$init, CURLOPT_PROXY, $proxy);
    }

    public static function SetProxyAuth($username, $password)
    {
        curl_setopt(self::$init, CURLOPT_PROXYUSERPWD, $username . ':' . $password);
    }

    public static function SetCookie($name, $value)
    {
        $cookieString = $name . '=' . $value;
        curl_setopt(self::$init, CURLOPT_COOKIE, $cookieString);
    }

    public static function SetCookies($cookies)
    {
        $cookieString = '';
        foreach ($cookies as $name => $value) {
            $cookieString .= $name . '=' . $value . '; ';
        }
        curl_setopt(self::$init, CURLOPT_COOKIE, rtrim($cookieString, '; '));
    }

    public static function Reset()
    {
        curl_reset(self::$init);
    }

    public static function Close()
    {
        curl_close(self::$init);
    }

    public static function Response()
    {
        $response = curl_exec(self::$init);
        
        if ($response === false) {
            $response = curl_error(self::$init);
        }

        return $response;
    }
}
