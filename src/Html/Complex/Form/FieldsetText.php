<?php
declare(strict_types=1);
/**
 * @Filename: FieldsetText.php
 * @Description:
 * @CreatedAt: 06/05/20 20:57
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Form;


use Rcc\Html\Dom;
use Rcc\Html\Tags\Input;

class FieldsetText extends FieldsetBase
{
    protected $inputType = Input::TYPE_TEXT;

    /** @var string */
    private $placeholder;
    /** @var string */
    private $value;

    function __construct(string $name, array $classes = [], string $label = '', string $feedback = 'Campo requerido',
                         string $placeholder = '', bool $disabled = false, array $elementClasses = [])
    {
        parent::__construct($name, $classes, $label, $feedback, $disabled, $elementClasses);
        $this->placeholder = $placeholder;
        $this->value = '';
    }

    function setValue(string $value): FieldsetText
    {
        $this->value = $value;

        return $this;
    }

    protected function generateElement(): Dom
    {
        return new Input($this->name, $this->inputType, $this->placeholder, $this->value, $this->elementClasses);
    }
}
