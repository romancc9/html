<?php
declare(strict_types=1);


namespace Rcc\Html;


class Property
{
    /** @var string */
    private $name;
    /** @var string */
    private $value;

    /**
     * Property constructor.
     * @param string $name
     * @param string $value
     */
    function __construct(string $name, string $value = '')
    {
        $this->name = $name;
        $this->value = $value;
    }

    function toString(): string
    {
        return "{$this->name}{$this->generateStringValue()}";
    }

    static function fromCustomData(string $key, string $value): Property
    {
        return new self("data-{$key}", $value);
    }

    private function generateStringValue(): string
    {
        if ($this->value === '') {
            return '';
        }

        return "=\"{$this->value}\"";
    }
}
