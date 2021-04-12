<?php
declare(strict_types=1);


namespace Rcc\Html\Complex\Nav\Dropdown;


use Rcc\Html\Tags\A;

class Item extends A
{

    function __construct(string $href, string $caption, array $classes = [])
    {
        parent::__construct($href);
        if (!empty($classes)) {
            $this->pushClasses($classes);
        }
        $this->pushOneClass('dropdown-item')->appendText($caption);
    }
}
