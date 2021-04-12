<?php
declare(strict_types=1);
/**
 * @Filename: Option.php
 * @Description:
 * @CreatedAt: 06/05/20 23:02
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Form\FieldsetSelect;


use Rcc\Html\Dom;
use Rcc\Html\Tags\Option as OptionTag;

class Option
{
    /** @var string */
    private $value;
    /** @var string */
    private $caption;

    /**
     * Option constructor.
     * @param string $value
     * @param string $caption
     */
    function __construct(string $value = '0', string $caption = '...Elige una opción...')
    {
        $this->value = $value;
        $this->caption = $caption;
    }

    function generateOptionTag(): Dom
    {
        return (new OptionTag($this->value))->appendText($this->caption);
    }
}
