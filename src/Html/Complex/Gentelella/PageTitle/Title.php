<?php
declare(strict_types=1);
/**
 * @Filename: Title.php
 * @Description:
 * @CreatedAt: 15/05/20 11:29
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Gentelella\PageTitle;


use Rcc\Html\Dom;
use Rcc\Html\PlainText;
use Rcc\Html\Tags\Div;
use Rcc\Html\Tags\H3;
use Rcc\Html\Tags\Small;

class Title extends Div
{
    /** @var string */
    private $caption;
    /** @var string */
    private $secondaryCaption;
    /** @var Dom */
    private $titleRightDom;

    /**
     * Title constructor.
     * @param string $caption
     * @param string $secondaryCaption
     * @param string $htmlId
     */
    function __construct(string $caption = '', string $secondaryCaption = '', string $htmlId = '')
    {
        parent::__construct($htmlId, ['page-title']);
        $this->caption = $caption;
        $this->secondaryCaption = $secondaryCaption;
        $this->titleRightDom = new PlainText();
    }

    /**
     * @param Dom $titleRightDom
     * @return Title
     */
    function setTitleRightDom(Dom $titleRightDom): Title
    {
        $this->titleRightDom = $titleRightDom;

        return $this;
    }

    function toHtml(): string
    {
        $this->removeAllElements()
            ->append((new Div())->pushOneClass('title_left')->append($this->generateCaption()))
            ->append((new Div())->pushOneClass('title_right')->append($this->titleRightDom));

        return parent::toHtml();
    }

    private function generateCaption(): Dom
    {
        if (empty($this->caption)) {
            return new PlainText();
        }

        return (new H3())->appendText($this->caption)->append($this->generateSecondaryCaption());
    }

    private function generateSecondaryCaption(): Dom
    {
        if (empty($this->secondaryCaption)) {
            return new PlainText();
        }

        return (new Small())->appendText($this->secondaryCaption);
    }
}
