<?php
declare(strict_types=1);


namespace Rcc\Html\Tags;


use Rcc\Html\BootstrapElementBase;
use Rcc\Html\Dom;

class Div extends BootstrapElementBase
{
    protected $elementType = 'div';

    function __construct(string $htmlId = '', array $classes = [], bool $hidden = false)
    {
        $this->htmlId = $htmlId;
        $this->classes = $classes;
        $this->hidden = $hidden;
    }

    function toHtml(): string
    {
        return <<<html
<{$this->elementType} {$this->generateStringHtmlId()} {$this->generateStringClasses()} {$this->generateStringProperties()}>
  {$this->generateHtmlElements()}
</{$this->elementType}>

html;
    }
}
