<?php
/* Generated by neoan3-cli */

namespace Neoan3\Components;

use Neoan3\Core\Unicore;

class VastN3 extends Unicore
{
    function init()
    {
        if($which = sub(1)){
            ob_flush();
            header("Content-Type: text/plain");

            readfile("https://raw.githubusercontent.com/vast-n3/start/$which/install.php");

            exit();
        } else {
            $this->uni('neoan3')
                ->hook('header', 'header')
                ->hook('main', 'vastN3')
                ->output();
        }

    }

}