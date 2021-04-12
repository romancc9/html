<?php
declare(strict_types=1);
/**
 * @Filename: FieldsetPassword.php
 * @Description:
 * @CreatedAt: 07/05/20 11:33
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Form;


use Rcc\Html\Tags\Input;

class FieldsetPassword extends FieldsetText
{
    protected $inputType = Input::TYPE_PASSWORD;
}
