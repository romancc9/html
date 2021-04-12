<?php
declare(strict_types=1);
/**
 * @Filename: ButtonItem.php
 * @Description:
 * @CreatedAt: 16/05/20 13:23
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Gentelella\PageTitle;


use Rcc\Html\Tags\Button;

class ButtonItem extends Button implements Item
{

    function __construct(string $color = 'success', array $classes = [])
    {
        parent::__construct();
        if (!empty($classes)) {
            $this->pushClasses($classes);
        }
        $this->pushClasses(['btn-sm', "btn-outline-{$color}", 'px-1']);
    }
}
