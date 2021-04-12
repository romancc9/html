<?php
declare(strict_types=1);
/**
 * @Filename: Section.php
 * @Description:
 * @CreatedAt: 13/05/20 21:54
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Gentelella\Sidebar;


use Rcc\Html\Tags\Div;
use Rcc\Html\Tags\H3;
use Rcc\Html\Tags\Ul;

class Section extends Div
{
    /** @var string */
    private $caption;
    /** @var Menu[] */
    private $menus = [];

    function __construct(string $caption)
    {
        parent::__construct();
        $this->caption = $caption;
        $this->pushOneClass('menu_section');
    }

    function pushMenu(Menu $menu): Section
    {
        $this->menus[] = $menu;

        return $this;
    }

    function toHtml(): string
    {
        $this->removeAllElements()->append((new H3())->appendText($this->caption));
        $ul = (new Ul())->pushClasses(['nav', 'side-menu']);
        foreach ($this->menus as $menu) {
            $ul->append($menu);
        }
        $this->append($ul);

        return parent::toHtml();
    }
}
