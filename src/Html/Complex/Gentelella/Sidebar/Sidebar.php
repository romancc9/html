<?php
declare(strict_types=1);
/**
 * @Filename: Sidebar.php
 * @Description:
 * @CreatedAt: 13/05/20 22:01
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Gentelella\Sidebar;


use Rcc\Html\Tags\Div;

class Sidebar extends Div
{
    /** @var Section[] */
    private $sections = [];

    function __construct(string $htmlId = 'sidebar-menu')
    {
        parent::__construct($htmlId, ['main_menu_side', 'hidden-print', 'main_menu']);
    }

    function pushSection(Section $section): Sidebar
    {
        $this->sections[] = $section;

        return $this;
    }

    function toHtml(): string
    {
        $this->removeAllElements();
        foreach ($this->sections as $section) {
            $this->append($section);
        }

        return parent::toHtml();
    }
}
