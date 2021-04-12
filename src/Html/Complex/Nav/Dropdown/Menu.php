<?php
declare(strict_types=1);


namespace Rcc\Html\Complex\Nav\Dropdown;


use Rcc\Html\Dom;
use Rcc\Html\Tags\A;
use Rcc\Html\Tags\Div;
use Rcc\Html\Tags\Li;

class Menu extends Li
{
    /** @var string */
    private $name;
    /** @var string */
    private $caption;
    /** @var Item[] */
    private $dropdownItems = [];

    function __construct(string $name, string $caption, array $classes = [])
    {
        parent::__construct($name, $classes);
        $this->pushClasses(['nav-item', 'dropdown']);
        $this->name = $name;
        $this->caption = $caption;
    }

    function appendDropdownItem(string $href, string $caption): Dom
    {
        $this->dropdownItems[] = new Item($href, $caption);

        return $this;
    }

    function toHtml(): string
    {
        $this->removeAllElements();
        $this->append($this->generateToggleLink());
        $this->append($this->generateDropdownList());

        return parent::toHtml();
    }

    private function generateToggleLink(): Dom
    {
        return (new A())
            ->setHtmlId($this->generateToggleLinkHtmlId())
            ->pushClasses(['nav-link', 'dropdown-toggle'])
            ->pushCustomData('toggle', 'dropdown')
            ->pushProperty('aria-haspopup', 'true')
            ->pushProperty('aria-expanded', 'false')
            ->appendText($this->caption);
    }

    private function generateDropdownList(): Dom
    {
        $list = (new Div())
            ->pushOneClass('dropdown-menu')
            ->pushProperty('aria-labelledby', $this->generateToggleLinkHtmlId());
        foreach ($this->dropdownItems as $dropdownItem) {
            $list->append($dropdownItem);
        }

        return $list;
    }

    private function generateToggleLinkHtmlId(): string
    {
        return "{$this->name}-toggle";
    }
}
