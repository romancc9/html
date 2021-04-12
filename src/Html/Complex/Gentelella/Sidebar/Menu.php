<?php
declare(strict_types=1);
/**
 * @Filename: Menu.php
 * @Description:
 * @CreatedAt: 13/05/20 21:53
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Gentelella\Sidebar;


use Rcc\Html\Complex\FaIcon;
use Rcc\Html\PlainText;
use Rcc\Html\Tags\A;
use Rcc\Html\Tags\Li;
use Rcc\Html\Tags\Span;
use Rcc\Html\Tags\Ul;

class Menu extends Li
{
    /** @var string */
    private $faIconName;
    /** @var string */
    private $caption;
    /** @var Item[] */
    private $items = [];

    /**
     * Menu constructor.
     * @param string $faIconName
     * @param string $caption
     */
    function __construct(string $faIconName, string $caption)
    {
        parent::__construct();
        $this->faIconName = $faIconName;
        $this->caption = $caption;
    }

    function pushItem(Item $item): Menu
    {
        $this->items[] = $item;

        return $this;
    }

    function toHtml(): string
    {
        $this->removeAllElements()
            ->append((new A())
                ->append(new FaIcon($this->faIconName))
                ->append(new PlainText(" {$this->caption} "))
                ->append((new Span())->pushClasses(['fa', 'fa-chevron-down']))
            );
        $ul = (new Ul())->pushClasses(['nav', 'child_menu']);
        foreach ($this->items as $item) {
            $ul->append($item);
        }
        $this->append($ul);

        return parent::toHtml();
    }
}
