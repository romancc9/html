<?php
declare(strict_types=1);
/**
 * @Filename: Input.php
 * @Description:
 * @CreatedAt: 06/05/20 21:40
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Tags;


use Rcc\Html\BootstrapElementBase;

class Input extends BootstrapElementBase
{
    const TYPE_TEXT = 'text';
    const TYPE_PASSWORD = 'password';
    const TYPE_EMAIL = 'email';
    const TYPE_NUMBER = 'number';
    const TYPE_CHECKBOX = 'checkbox';
    const TYPE_RADIO = 'radio';

    protected $elementType = 'input';

    /** @var string */
    private $value;

    function __construct(string $name, string $type = self::TYPE_TEXT, string $placeholder = '', string $value = '',
                         array $classes = [])
    {
        $this->htmlId = $name;
        $this->value = $value;
        $this->classes = $classes;
        $this->pushProperty('name', $name)
            ->pushProperty('type', $type);
        if ($placeholder != '') {
            $this->pushProperty('placeholder', $placeholder);
        }
    }

    function toHtml(): string
    {
        if (!empty($this->value)) {
            $output = clone $this;
            $output->value = '';
            $output->pushProperty('value', $this->value);

            return $output->toHtml();
        }

        return <<<html
<{$this->elementType} {$this->generateStringHtmlId()} {$this->generateStringClasses()} {$this->generateStringProperties()}>

html;
    }
}
