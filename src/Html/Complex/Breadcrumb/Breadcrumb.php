<?php
declare(strict_types=1);
/**
 * @Filename: Breadcrumb.php
 * @Description:
 * @CreatedAt: 24/04/20 9:26
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Breadcrumb;


use Rcc\Html\Tags\Nav;
use Rcc\Html\Tags\Ol;

class Breadcrumb extends Nav
{
    /** @var string[] */
    private $innerOlClasses;
    /** @var Item[] */
    private $items = [];

    function __construct(array $innerOlClasses = [], array $classes = [])
    {
        parent::__construct();
        if (!empty($classes)) {
            $this->pushClasses($classes);
        }
        $this->pushProperty('aria-label', 'breadcrumb');
        $this->innerOlClasses = $innerOlClasses;
    }

    function appendItem(Item $item): Breadcrumb
    {
        $this->items[] = $item;

        return $this;
    }

    function toHtml(): string
    {
        $ol = (new Ol())->pushOneClass('breadcrumb');
        if (!empty($this->innerOlClasses)) {
            $ol->pushClasses($this->innerOlClasses);
        }
        $cantItems = count($this->items);
        $count = 0;
        foreach ($this->items as $item) {
            if ($count + 1 >= $cantItems) {
                $item->activate();
            }
            $ol->append($item);
            $count++;
        }
        $this->removeAllElements()->append($ol);
        return parent::toHtml();
    }
}
