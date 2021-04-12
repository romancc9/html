<?php
declare(strict_types=1);
/**
 * @Filename: LinkItem.php
 * @Description:
 * @CreatedAt: 29/04/20 9:29
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Card\HeaderMenu;


use Rcc\Html\Complex\Iconic;
use Rcc\Html\Tags\A;

class LinkItem extends A implements Item
{

    function __construct(string $iconicName, string $color = 'secondary', string $href = '#', string $title = '', string $htmlId = '', array $classes = [])
    {
        parent::__construct($href, $htmlId, $classes);
        $this->pushClasses(['ml-1', 'px-0', 'py-1', 'btn'])
            ->append(new Iconic($iconicName, $color));
        if (!empty($title)) {
            $this->pushProperty('title', $title);
        }
    }
}
