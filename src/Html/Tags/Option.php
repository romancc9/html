<?php
declare(strict_types=1);
/**
 * @Filename: Option.php
 * @Description:
 * @CreatedAt: 06/05/20 22:55
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Tags;


class Option extends Span
{
    protected $elementType = 'option';

    function __construct(string $value, array $classes = [])
    {
        parent::__construct();
        if (!empty($classes)) {
            $this->pushClasses($classes);
        }
        $this->pushProperty('value', $value);
    }
}
