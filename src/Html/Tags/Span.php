<?php
declare(strict_types=1);


namespace Rcc\Html\Tags;


use Rcc\Html\PlainText;

class Span extends Div
{
    protected $elementType = 'span';

    function __construct(string $htmlId = '', array $classes = [], string $innerText = '')
    {
        parent::__construct($htmlId, $classes);

        if (!empty($innerText)) {
            $this->append(new PlainText($innerText));
        }
    }
}
