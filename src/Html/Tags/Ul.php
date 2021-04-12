<?php
declare(strict_types=1);


namespace Rcc\Html\Tags;


class Ul extends Div
{
    protected $elementType = 'ul';

    function __construct(string $htmlId = '', array $classes = [])
    {
        parent::__construct($htmlId, $classes);
    }
}
