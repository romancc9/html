<?php
declare(strict_types=1);
/**
 * @Filename: ButtonItem.php
 * @Description:
 * @CreatedAt: 29/04/20 9:28
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Card\HeaderMenu;


use Rcc\Html\Complex\Iconic;
use Rcc\Html\Tags\Button;

class ButtonItem extends Button implements Item
{

    function __construct(string $iconicName, string $color = 'secondary', string $title = '', string $htmlId = '', array $classes = [])
    {
        parent::__construct($htmlId, $classes);
        $this->pushClasses(['ml-1', 'mb-0', 'p-0'])
            ->append(new Iconic($iconicName, $color));
        if (!empty($title)) {
            $this->pushProperty('title', $title);
        }
    }
}
