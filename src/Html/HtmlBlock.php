<?php
declare(strict_types=1);


namespace Rcc\Html;


class HtmlBlock implements Dom
{
    /** @var string */
    private $html;

    /**
     * HtmlBlock constructor.
     * @param string $html
     */
    function __construct(string $html = '')
    {
        $this->html = $html;
    }

    function toHtml(): string
    {
        return $this->html;
    }

    static function new(string $html = '')
    {
        return new self($html);
    }
}
