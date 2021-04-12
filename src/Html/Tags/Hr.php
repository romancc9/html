<?php
declare(strict_types=1);
/**
 * @Filename: Hr.php
 * @Description:
 * @CreatedAt: 24/04/20 22:33
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Tags;


use Rcc\Html\BootstrapElementBase;

class Hr extends BootstrapElementBase
{
    protected $elementType = 'hr';

    function __construct(array $classes = [])
    {
        $this->classes = $classes;
    }

    function toHtml(): string
    {
        return <<<html
<{$this->elementType} {$this->generateStringHtmlId()} {$this->generateStringClasses()} {$this->generateStringProperties()}>

html;
    }
}
