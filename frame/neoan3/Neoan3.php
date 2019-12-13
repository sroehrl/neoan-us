<?php
/* Generated by neoan3-cli */

namespace Neoan3\Frame;

use Neoan3\Core\Serve;

class Neoan3 extends Serve
{
    protected $credentials;

    function __construct()
    {
        parent::__construct();
        try {
            $this->credentials = getCredentials();
        } catch (\Exception $e) {
            var_dump('credential error');
            die();
        }


    }

    function getCredentials($what)
    {
        return $this->credentials['neoan_us'][$what];
    }

    function constants()
    {
        return [
            'base' => [base],
            'link' => [
                [
                    'sizes' => '32x32',
                    'type' => 'image/png',
                    'rel' => 'icon',
                    'href' => 'asset/neoan-favicon.png'
                ]
            ],
            'meta' => [
                ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']
            ],
            'stylesheet' => [
                '' . base . 'frame/neoan3/style.css',
            ],
            'js' => [
                ['src' => base . 'node_modules/axios/dist/axios.min.js'],
                ['src' => 'https://hcaptcha.com/1/api.js' ],
                ['src' => 'https://unpkg.com/scrollreveal@4.0.5' ],
                ['src' => base . 'frame/neoan3/common.js' ],
            ]
        ];
    }
}
