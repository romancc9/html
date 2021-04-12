<?php
declare(strict_types=1);


namespace Rcc\Html;


class PlainText implements Dom
{
    /** @var string */
    private $text;

    /**
     * PlainText constructor.
     * @param string $text
     */
    function __construct(string $text = '')
    {
        $this->text = $text;
    }

    function toHtml(): string
    {
        return $this->text;
    }

    static function new(string $text = '')
    {
        return new self($text);
    }
}
