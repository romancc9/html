<?php
declare(strict_types=1);
/**
 * @Filename: FormRow.php
 * @Description:
 * @CreatedAt: 06/05/20 18:29
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Form;


use Rcc\Html\Tags\Div;

class FormRow extends Div
{

    function __construct(string $htmlId, array $classes = [], bool $hidden = false)
    {
        parent::__construct($htmlId, array_merge(['form-row'], $classes), $hidden);
    }
}
