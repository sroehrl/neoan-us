<?php
/* Generated by neoan3-cli */

namespace Neoan3\Components;

use Neoan3\Core\Unicore;

class Header extends Unicore
{
    function init()
    {
        $this->uni('neoan3')
             ->hook('main', 'header')
             ->output();
    }

}
