<?php
/* Generated by neoan3-cli */

namespace Neoan3\Components;

use Neoan3\Core\Unicore;

class Tac extends Unicore
{
    function init()
    {
        $this->uni('neoan3')->addHead('title', 'Terms, conditions, privacy')->hook('header', 'header')->hook(
            'main',
            'tac'
        )->output();
    }

}
