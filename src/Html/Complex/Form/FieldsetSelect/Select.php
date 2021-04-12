<?php
declare(strict_types=1);
/**
 * @Filename: Select.php
 * @Description:
 * @CreatedAt: 06/05/20 23:02
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Form\FieldsetSelect;


use Rcc\Html\Complex\Form\FieldsetBase;
use Rcc\Html\Dom;
use Rcc\Html\Tags\Select as SelectTag;

class Select extends FieldsetBase
{
    /** @var Option[] */
    private $options = [];

    function __construct(string $name, array $classes = [], string $label = '', string $emptyOptionCaption = '',
                         string $feedback = '', bool $disabled = false, array $elementClasses = [])
    {
        parent::__construct($name, $classes, $label, $feedback, $disabled, $elementClasses);
        if ($emptyOptionCaption != '') {
            $this->pushOption('0', $emptyOptionCaption);
        }
    }

    function pushOption(string $value, string $caption): Select
    {
        $this->options[] = new Option($value, $caption);

        return $this;
    }

    protected function generateElement(): Dom
    {
        $output = new SelectTag($this->name, $this->elementClasses);
        //var_dump($this->options); exit;
        foreach ($this->options as $option) {
            //var_dump($option->generateOptionTag()->toHtml()); exit;
            $output->append($option->generateOptionTag());
        }

        //var_dump($output); exit;
        return $output;
    }
}
