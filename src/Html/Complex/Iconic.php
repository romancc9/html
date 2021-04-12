<?php
declare(strict_types=1);


namespace Rcc\Html\Complex;


use Rcc\Html\Tags\Span;

class Iconic extends Span
{
    function __construct(string $name, string $color = 'secondary', array $classes = [])
    {
        parent::__construct('', $classes);
        $this->pushClasses(['oi', "oi-{$name}"]);
        if (!empty($color)) {
            $this->pushOneClass("text-{$color}");
        }
    }
}
