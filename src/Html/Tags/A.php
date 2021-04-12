<?php
declare(strict_types=1);


namespace Rcc\Html\Tags;


class A extends Div
{
    protected $elementType = 'a';

    function __construct(string $href = '#', string $htmlId = '', array $classes = [])
    {
        parent::__construct($htmlId, $classes);
        $this->pushProperty('href', $href);
    }
}
