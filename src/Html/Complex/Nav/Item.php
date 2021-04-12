<?php
declare(strict_types=1);


namespace Rcc\Html\Complex\Nav;


use Rcc\Html\Tags\A;
use Rcc\Html\Tags\Li;

class Item extends Li
{

    function __construct(string $href, string $caption, array $classes = [])
    {
        parent::__construct();
        if (!empty($classes)) {
            $this->pushClasses($classes);
        }
        $this->pushOneClass('nav-item')
            ->append((new A($href))->pushOneClass('nav-link')->appendText($caption));
    }
}
