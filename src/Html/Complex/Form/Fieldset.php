<?php
/**
 * @Filename: Fieldset.php
 * @Description:
 * @CreatedAt: 06/05/20 19:00
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Form;


use Rcc\Html\Element;

interface Fieldset extends Element
{

    function enable(): Fieldset;

    function disable(): Fieldset;
}
