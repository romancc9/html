<?php
declare(strict_types=1);


namespace Rcc\Html\Tags;


class Button extends Div
{
    protected $elementType = 'button';

    function __construct(string $htmlId = '', array $classes = [], bool $hidden = false, bool $defaultBtnClass = true)
    {
        parent::__construct($htmlId, $classes, $hidden);
        if ($defaultBtnClass) {
            $this->pushOneClass('btn');
        }
        $this->pushProperty('type', 'button');
    }
}
