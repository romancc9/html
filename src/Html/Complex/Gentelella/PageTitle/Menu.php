<?php
declare(strict_types=1);
/**
 * @Filename: Menu.php
 * @Description:
 * @CreatedAt: 15/05/20 12:11
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Gentelella\PageTitle;


use Rcc\Html\Tags\Div;

class Menu extends Div
{
    /** @var Item[] */
    private $items = [];

    function __construct(array $classes = [])
    {
        parent::__construct();
        if (!empty($classes)) {
            $this->pushClasses($classes);
        }
        $this->pushClasses(['btn-group', 'pull-right']);
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
