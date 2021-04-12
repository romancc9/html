<?php
declare(strict_types=1);


namespace Rcc\Html;


abstract class BootstrapElementBase extends ElementBase
{
    protected function generateArrayClasses(): array
    {
        return $this->hidden ? array_merge($this->classes, ['d-none']) : $this->classes;
    }
}
