<?php
declare(strict_types=1);
/**
 * @Filename: Tr.php
 * @Description:
 * @CreatedAt: 25/04/20 9:32
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Tags;


class Tr extends Ul
{
    protected $elementType = 'tr';

    function appendBasicTd(string $plainText = '', array $classes = []): Tr
    {
        $td = (new Td())->appendText($plainText);
        if (!empty($classes)) {
            $td->pushClasses($classes);
        }

        $this->append($td);

        return $this;
    }

    function appendBasicTh(string $plainText = '', array $classes = []): Tr
    {
        $th = (new Th())->appendText($plainText);
        if (!empty($classes)) {
            $th->pushClasses($classes);
        }

        $this->append($th);

        return $this;
    }
}
