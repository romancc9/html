<?php
declare(strict_types=1);


namespace Rcc\Html\Complex\Card;


use Rcc\Html\Complex\Card\HeaderMenu\Item as MenuItem;
use Rcc\Html\Complex\Card\HeaderMenu\Menu;
use Rcc\Html\Dom;
use Rcc\Html\Tags\Div;
use Rcc\Html\Tags\Span;

class Card extends Div
{
    /** @var Dom */
    private $title;
    /** @var Dom */
    private $body;
    /** @var Menu */
    private $headerMenu;

    function __construct(Dom $title, Dom $body, string $htmlId = '', array $classes = [], bool $hidden = false)
    {
        parent::__construct($htmlId, $classes, $hidden);
        $this->pushClasses(['card', 'shadow']);
        $this->title = $title;
        $this->body = $body;
        $this->headerMenu = new Menu();
    }

    function pushHeaderMenuItem(MenuItem $item): Card
    {
        $this->headerMenu->pushItem($item);

        return $this;
    }

    function toHtml(): string
    {
        $this->removeAllElements()->append($this->generateHeaderDiv())->append($this->generateBodyDiv());

        return parent::toHtml();
    }

    private function generateHeaderDiv(): Dom
    {
        $htmlId = empty($this->htmlId) ? '' : "{$this->htmlId}-header-div";
        $classes = ['card-header', 'py-1'];
        if ($this->headerMenu->hasItems()) {
            return (new Div($htmlId, $classes))
                ->pushOneClass('navbar')
                ->append($this->generateTitleSpan())
                ->append($this->headerMenu);
        }

        return (new Div($htmlId, $classes))->append($this->generateTitleSpan());
    }

    private function generateBodyDiv(): Dom
    {
        return (new Div())->pushClasses(['card-body', 'p-2'])->append($this->body);
    }

    private function generateTitleSpan(): Dom
    {
        return (new Span())->pushOneClass('font-weight-bold')->append($this->title);
    }
}
