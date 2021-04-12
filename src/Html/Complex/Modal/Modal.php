<?php
declare(strict_types=1);
/**
 * @Filename: Modal.php
 * @Description:
 * @CreatedAt: 06/05/20 13:03
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Modal;


use Rcc\Html\Dom;
use Rcc\Html\PlainText;
use Rcc\Html\Tags\Div;
use Rcc\Html\Tags\H5;

class Modal extends Div
{
    const SIZE_SMALL = 'small';
    const SIZE_LARGE = 'large';

    /** @var string */
    private $size;
    /** @var Dom */
    private $titleDom;
    /** @var Dom */
    private $bodyDom;
    /** @var Footer */
    private $footer;

    function __construct(string $htmlId, string $size = self::SIZE_LARGE, Dom $titleDom = null, Dom $bodyDom = null)
    {
        parent::__construct($htmlId, ['modal', 'fade']);
        $this->size = $size;
        $this->titleDom = is_null($titleDom) ? new PlainText() : $titleDom;
        $this->bodyDom = is_null($bodyDom) ? new PlainText() : $bodyDom;
        $this->footer = Footer::default("{$htmlId}-footer");
        $this->pushProperty('tabindex', '-1')
            ->pushProperty('role', 'dialog')
            ->pushProperty('aria-hidden', 'true');
    }

    /**
     * @param Dom $titleDom
     * @return Modal
     */
    function setTitleDom(Dom $titleDom): Modal
    {
        $this->titleDom = $titleDom;

        return $this;
    }

    /**
     * @param Dom $bodyDom
     * @return Modal
     */
    function setBodyDom(Dom $bodyDom): Modal
    {
        $this->bodyDom = $bodyDom;

        return $this;
    }

    /**
     * @param Footer $footer
     * @return Modal
     */
    function setFooter(Footer $footer): Modal
    {
        $this->footer = $footer;

        return $this;
    }

    function toHtml(): string
    {
        $this->append($this->generateModalDialog());

        return parent::toHtml();
    }

    private function generateModalDialog(): Dom
    {
        $dialog = (new Div())->pushOneClass('modal-dialog');
        $sizeClass = $this->generateSizeClass();
        if (!empty($sizeClass)) {
            $dialog->pushOneClass($sizeClass);
        }
        $dialog->append((new Div())->pushOneClass('modal-content')
            ->append($this->generateModalHeader())
            ->append((new Div("{$this->htmlId}-body"))->pushOneClass('modal-body')->append($this->bodyDom))
            ->append($this->footer)
        );

        return $dialog;
    }

    private function generateModalHeader(): Dom
    {
        return (new Div())->pushOneClass('modal-header')
            ->append((new H5("{$this->htmlId}-title"))->append($this->titleDom))
            ->append(ButtonsFactory::headerClose());
    }

    private function generateSizeClass(): string
    {
        switch ($this->size) {
            case self::SIZE_SMALL: return 'modal-sm';
            case self::SIZE_LARGE: return 'modal-lg';
            default: return '';
        }
    }
}
