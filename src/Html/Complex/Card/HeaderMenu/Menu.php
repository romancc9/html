<?php
declare(strict_types=1);
/**
 * @Filename: Menu.php
 * @Description:
 * @CreatedAt: 29/04/20 9:28
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Card\HeaderMenu;


use Rcc\Html\Tags\Ul;

class Menu extends Ul
{
    /** @var Item[] */
    private $items = [];

    function __construct()
    {
        parent::__construct();
        $this->pushClasses(['nav', 'ml-auto']);
    }

    function hasItems(): bool
    {
        return count($this->items) > 0;
    }

    function pushItem(Item $item): Menu
    {
        $this->items[] = $item;

        return $this;
    }

    function toHtml(): string
    {
        $this->removeAllElements();
        foreach ($this->items as $item) {
            $this->append($item);
        }
        return parent::toHtml();
    }
}
