<?php
declare(strict_types=1);
/**
 * @Filename: Badge.php
 * @Description:
 * @CreatedAt: 12/05/20 12:22
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex;


use Rcc\Html\Tags\Span;

class Badge extends Span
{

    function __construct(string $color, string $innerText = '')
    {
        parent::__construct();
        $this->pushClasses(['badge', "badge-{$color}"]);
        if (!empty($innerText)) {
            $this->appendText($innerText);
        }
    }
}
