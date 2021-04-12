<?php
declare(strict_types=1);
/**
 * @Filename: Fieldset.php
 * @Description:
 * @CreatedAt: 06/05/20 18:37
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Form;


use Rcc\Html\Dom;
use Rcc\Html\PlainText;
use Rcc\Html\Tags\Div;
use Rcc\Html\Tags\Fieldset as FieldsetTag;
use Rcc\Html\Tags\Label;

abstract class FieldsetBase extends FieldsetTag implements Fieldset
{
    /** @var string */
    protected $name;
    /** @var string */
    private $label;
    /** @var string */
    private $feedback;
    /** @var bool */
    private $disabled;
    /** @var string[] */
    protected $elementClasses;

    function __construct(string $name, array $classes = [], string $label = '', string $feedback = '', bool $disabled = false,
                         array $elementClasses = [])
    {
        parent::__construct("fieldset-{$name}", array_merge(['form-group'], $classes));
        $this->name = $name;
        $this->elementClasses = array_merge(['form-control'], $elementClasses);
        $this->label = $label;
        $this->feedback = $feedback;
        $this->disabled = $disabled;
    }

    /**
     * @return bool
     */
    function isDisabled(): bool
    {
        return $this->disabled;
    }

    function enable(): Fieldset
    {
        $this->disabled = false;

        return $this;
    }

    function disable(): Fieldset
    {
        $this->disabled = true;

        return $this;
    }

    function toHtml(): string
    {
        if ($this->disabled) {
            $this->pushProperty('disabled');
        }
        $this->removeAllElements()
            ->append($this->generateLabel())
            ->append($this->generateElement())
            ->append($this->generateFeedback());

        return parent::toHtml();
    }

    protected function parentToHtml(): string
    {
        return parent::toHtml();
    }

    abstract protected function generateElement(): Dom;

    protected function generateLabel(): Dom
    {
        if (empty($this->label)) {
            return new PlainText();
        }

        return (new Label($this->name))->appendText($this->label);
    }

    protected function generateFeedback():Dom
    {
        if (empty($this->feedback)) {
            return new PlainText();
        }

        return (new Div())->pushOneClass('invalid-feedback')->appendText($this->feedback);
    }
}
