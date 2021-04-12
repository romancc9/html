<?php
declare(strict_types=1);
/**
 * @Filename: FaIcon.php
 * @Description:
 * @CreatedAt: 14/05/20 8:08
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex;


use Rcc\Html\Tags\I;

class FaIcon extends I
{

    function __construct(string $faIconName)
    {
        parent::__construct();
        $this->pushClasses(['fa', "fa-{$faIconName}"]);
    }
}
