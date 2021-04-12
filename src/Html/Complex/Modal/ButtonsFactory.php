<?php
declare(strict_types=1);
/**
 * @Filename: ButtonsFactory.php
 * @Description:
 * @CreatedAt: 06/05/20 13:42
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Modal;


use Rcc\Html\Complex\Iconic;
use Rcc\Html\Dom;
use Rcc\Html\PlainText;
use Rcc\Html\Tags\Button;
use Rcc\Html\Tags\Span;

abstract class ButtonsFactory
{
    static function footerCancel(string $color = 'danger', string $caption = 'Cancelar'): Dom
    {
        return (new Button())->pushOneClass("btn-outline-{$color}")
            ->pushCustomData('dismiss', 'modal')
            ->append(new Iconic('action-undo', ''))
            ->append(new PlainText(" {$caption}"));
    }

    static function footerOk(string $htmlId, string $caption = 'Aceptar', string $color = 'success'): Dom
    {
        return (new Button($htmlId))->pushOneClass("btn-outline-{$color}")
            ->append(new Iconic('check', ''))
            ->append(new PlainText(" {$caption}"));
    }

    static function headerClose(): Dom
    {
        return (new Button())->pushOneClass('close')
            ->pushCustomData('dismiss', 'modal')
            ->pushProperty('aria-label', 'Close')
            ->append((new Span())->pushProperty('aria-hidden', 'true')->appendText('&times;'));
    }
}
