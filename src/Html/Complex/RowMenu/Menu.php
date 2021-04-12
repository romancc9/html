<?php
declare(strict_types=1);
/**
 * @Filename: Menu.php
 * @Description:
 * @CreatedAt: 29/04/20 11:43
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\RowMenu;


use Rcc\Html\Tags\Li;
use Rcc\Html\Tags\Nav;
use Rcc\Html\Tags\Ul;

class Menu extends Nav
{
    /** @var Item[] */
    private $items = [];

    function __construct(string $htmlId = '', array $classes = [])
    {
        parent::__construct($htmlId, $classes);
        $this->pushClasses(['row', 'm-0', 'py-2']);
    }

    function pushMenuItem(Item $menuItem): Menu
    {
        $this->items[] = $menuItem;

        return $this;
    }

    function toHtml(): string
    {
        $ul = (new Ul())->pushClasses(['nav', 'ml-auto']);
        foreach ($this->items as $item) {
            $ul->append(
                (new Li())->pushOneClass('nav-item')->append($item)
            );
        }

        $this->removeAllElements()->append($ul);
        return parent::toHtml();
    }
}
