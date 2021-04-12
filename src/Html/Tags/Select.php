<?php
declare(strict_types=1);
/**
 * @Filename: Select.php
 * @Description:
 * @CreatedAt: 06/05/20 22:53
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Tags;


class Select extends Div
{
    protected $elementType = 'select';

    function __construct(string $name, array $classes = [], bool $hidden = false)
    {
        parent::__construct($name, $classes, $hidden);
        $this->pushProperty('name', $name);
    }
}
