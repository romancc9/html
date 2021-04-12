<?php
declare(strict_types=1);
/**
 * @Filename: Footer.php
 * @Description:
 * @CreatedAt: 06/05/20 13:19
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Modal;


use Rcc\Html\Dom;
use Rcc\Html\Tags\Div;

class Footer extends Div
{

    function __construct(string $htmlId = '')
    {
        parent::__construct($htmlId, ['modal-footer']);
    }

    static function default(string $htmlId = ''): Dom
    {
        return (new self($htmlId))
            ->append(ButtonsFactory::footerCancel())
            ->append(ButtonsFactory::footerOk("{$htmlId}-btnok"));
    }

    static function onlyBack(string $htmlId = ''): Dom
    {
        return (new self($htmlId))
            ->append(ButtonsFactory::footerCancel('info', 'Regresar'));
    }
}
