<?php
declare(strict_types=1);
/**
 * @Filename: Label.php
 * @Description:
 * @CreatedAt: 06/05/20 20:52
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Tags;


class Label extends Span
{
    protected $elementType = 'label';

    function __construct(string $for, string $htmlId = '', array $classes = [], string $innerText = '')
    {
        parent::__construct($htmlId, $classes, $innerText);
        $this->pushProperty('for', $for);
    }
}
