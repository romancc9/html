<?php
declare(strict_types=1);
/**
 * @Filename: Group.php
 * @Description:
 * @CreatedAt: 25/05/20 13:56
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Form\FieldsetCheckboxGroup;


use Rcc\Html\Complex\Form\FieldsetBase;
use Rcc\Html\Dom;
use Rcc\Html\PlainText;

class Group extends FieldsetBase /*implements \Rcc\Html\Complex\Form\Fieldset MAYBE this is better*/
{
    /** @var Checkbox[] */
    private $checkboxes = [];

    function __construct(string $name, array $classes = [], string $label = '', string $feedback = '', bool $disabled = false)
    {
        parent::__construct($name, $classes, $label, $feedback, $disabled);
    }

    function pushCheckbox(Checkbox $checkbox): Group
    {
        $this->checkboxes[] = ($checkbox->setName($this->name));

        return $this;
    }

    function toHtml(): string
    {
        if ($this->isDisabled()) {
            $this->pushProperty('disabled');
        }
        $this->removeAllElements();
        $this->append($this->generateLabel());
        $this->appendElements()
            ->append($this->generateFeedback());

        return $this->parentToHtml();
    }

    protected function generateElement(): Dom
    {
        // required for interface but not necessary for this pseudo-select
        return new PlainText();
    }

    private function appendElements(): Group
    {
        foreach ($this->checkboxes as $checkbox) {
            $this->append($checkbox);
        }

        return $this;
    }
}
