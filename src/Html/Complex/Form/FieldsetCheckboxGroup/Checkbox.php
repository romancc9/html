<?php
declare(strict_types=1);
/**
 * @Filename: Checkbox.php
 * @Description:
 * @CreatedAt: 25/05/20 13:57
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Form\FieldsetCheckboxGroup;


use Rcc\Html\Dom;
use Rcc\Html\Tags\Div;
use Rcc\Html\Tags\Input;
use Rcc\Html\Tags\Label;

class Checkbox extends Div
{
    /** @var string */
    private $name;
    /** @var string */
    private $inputHtmlId;
    /** @var string */
    private $value;
    /** @var Dom */
    private $labelInnerDom;

    function __construct(string $inputHtmlId, string $value)
    {
        parent::__construct();
        $this->pushOneClass('form-check');
        $this->inputHtmlId = $inputHtmlId;
        $this->value = $value;
    }

    /**
     * @param string $name
     * @return Checkbox
     */
    function setName(string $name): Checkbox
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param Dom $labelInnerDom
     * @return Checkbox
     */
    function setLabelInnerDom(Dom $labelInnerDom): Checkbox
    {
        $this->labelInnerDom = $labelInnerDom;

        return $this;
    }

    function toHtml(): string
    {
        $this->removeAllElements()->append($this->generateInput())->append($this->generateLabel());

        return parent::toHtml();
    }

    private function generateInput(): Dom
    {
        return (new Input($this->name, Input::TYPE_CHECKBOX, '', $this->value, ['form-check-input']))
            ->setHtmlId($this->inputHtmlId); // By default Input construct set htmlId == name, in checkbox group this is wrong
    }

    private function generateLabel(): Dom
    {
        return (new Label($this->inputHtmlId, '', ['form-check-label']))->append($this->labelInnerDom);
    }
}
