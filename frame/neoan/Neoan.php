<?php
/* Generated by neoan3-cli */

namespace Neoan3\Frame;

use Neoan3\Apps\Db;
use Neoan3\Apps\Ops;
use Neoan3\Apps\Cache;
use Neoan3\Core\Serve;
use Leafo\ScssPhp\Compiler;
use Leafo\ScssPhp\Server;

class Neoan extends Serve {
    private $developmentMode = false;
    function __construct() {
//        Cache::setCaching('+2 hours');
//        Cache::invalidate('demo');
        parent::__construct();

        Db::setEnvironment(['name'=>'neoan_us','assumes_uuid'=>true]);
        $this->includeElement('header');
        $this->hook('header','header');
        $this->hook('footer','footer');

        if($this->developmentMode){
            $scss = new Compiler();

            $scss->addImportPath(path.'/frame/neoan');
            $scss->setLineNumberStyle(Compiler::LINE_COMMENTS);
            $this->style .= $scss->compile('@import "main";');
        }
    }
    function output($params = []) {
        parent::output($params);
        Cache::write();
    }

    function constants() {
        return [
            'base'=>[base],
            'link'=>[
                [
                    'sizes'=>'32x32',
                    'type'=>'image/png',
                    'rel'=>'icon',
                    'href'=>'asset/neoan-favicon.png'
                ]
            ],
            'meta'=>[
                ['name'=>'viewport','content'=>'width=device-width, initial-scale=1']
            ],
            'js'=>[
                ['src'=> 'https://use.fontawesome.com/releases/v5.3.1/js/all.js'],
                ['src'=> base.'node_modules/vue/dist/vue.min.js'],
                ['src'=> base.'node_modules/axios/dist/axios.min.js'],
            ],
            'stylesheet'=>[
                ''.base.'frame/neoan/main.css'
            ]
        ];
    }
}
