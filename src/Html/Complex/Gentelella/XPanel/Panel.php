<?php
declare(strict_types=1);
/**
 * @Filename: Panel.php
 * @Description:
 * @CreatedAt: 14/05/20 17:41
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Gentelella\XPanel;


use Rcc\Html\Complex\FaIcon;
use Rcc\Html\Dom;
use Rcc\Html\PlainText;
use Rcc\Html\Tags\A;
use Rcc\Html\Tags\Div;
use Rcc\Html\Tags\H2;
use Rcc\Html\Tags\Li;
use Rcc\Html\Tags\Small;
use Rcc\Html\Tags\Ul;

class Panel extends Div
{
    /** @var string */
    private $caption;
    /** @var string */
    private $secondaryCaption;
    /** @var bool */
    private $collapseControl;
    /** @var Dom */
    private $contentDom;

    /**
     * Panel constructor.
     * @param string $caption
     * @param string $secondaryCaption
     * @param bool $collapseControl
     * @param string $htmlId
     * @param array $classes
     */
    function __construct(string $caption = '', string $secondaryCaption = '', bool $collapseControl = true, string $htmlId = '', array $classes = [])
    {
        parent::__construct($htmlId, $classes);
        $this->caption = $caption;
        $this->secondaryCaption = $secondaryCaption;
        $this->collapseControl = $collapseControl;
        $this->contentDom = new PlainText();
    }

    /**
     * @param bool $collapseControl
     * @return Panel
     */
    public function setCollapseControl(bool $collapseControl): Panel
    {
        $this->collapseControl = $collapseControl;
        return $this;
    }

    /**
     * @param Dom $contentDom
     * @return Panel
     */
    function setContentDom(Dom $contentDom): Panel
    {
        $this->contentDom = $contentDom;

        return $this;
    }

    function toHtml(): string
    {
        $this->removeAllElements()->append(
            (new Div())->pushOneClass('x_panel')
                ->append($this->generateHeader())
                ->append((new Div())->pushOneClass('x_content')
                    ->append($this->contentDom)));

        return parent::toHtml();
    }

    private function generateHeader(): Dom
    {
        if (!$this->hasTitleSection()) {
            return new PlainText();
        }

        return (new Div())->pushOneClass('x_title')
            ->append($this->generateCaption())
            ->append($this->generateNavbarRight())
            ->append((new Div())->pushOneClass('clearfix'));
    }

    private function hasTitleSection(): bool
    {
        return !empty($this->caption) || $this->collapseControl;
    }

    private function generateCaption(): Dom
    {
        if (empty($this->caption)) {
            return new PlainText();
        }

        return (new H2())->appendText($this->caption)->append($this->generateSecondaryCaption());
    }

    private function generateSecondaryCaption(): Dom
    {
        if (empty($this->secondaryCaption)) {
            return new PlainText();
        }

        return (new Small())->appendText($this->secondaryCaption);
    }

    private function generateNavbarRight(): Dom
    {
        if (!$this->collapseControl) {
            return new PlainText();
        }

        return (new Ul())->pushClasses(['nav', 'navbar-right', 'panel_toolbox'])->pushProperty('style', 'min-width: 10px;')
            ->append(new Li())
            ->append((new Li())->append((new A())->pushOneClass('collapse-link')->append(new FaIcon('chevron-up'))))
            ;
    }
}
