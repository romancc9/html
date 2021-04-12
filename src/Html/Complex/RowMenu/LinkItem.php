<?php
declare(strict_types=1);
/**
 * @Filename: LinkItem.php
 * @Description:
 * @CreatedAt: 29/04/20 11:43
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\RowMenu;


use Rcc\Html\Dom;
use Rcc\Html\Tags\A;

class LinkItem extends A implements Item
{

    function __construct(Dom $innerDom, string $color = 'success', string $href = '#', array $classes = [])
    {
        parent::__construct($href);
        if (!empty($classes)) {
            $this->pushClasses($classes);
        }
        $this->pushClasses(['btn', "btn-outline-{$color}"])
            ->pushProperty('role', 'button');
        $this->append($innerDom);
    }
}
