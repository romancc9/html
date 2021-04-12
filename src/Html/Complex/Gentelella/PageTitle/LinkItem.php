<?php
declare(strict_types=1);
/**
 * @Filename: LinkItem.php
 * @Description:
 * @CreatedAt: 15/05/20 12:12
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Gentelella\PageTitle;


use Rcc\Html\Complex\Iconic;
use Rcc\Html\Tags\A;

class LinkItem extends A implements Item
{

    function __construct(string $color = 'success', string $href = '#',  array $classes = [])
    {
        parent::__construct($href);
        if (!empty($classes)) {
            $this->pushClasses($classes);
        }
        $this->pushClasses(['btn', 'btn-sm', "btn-outline-{$color}", 'px-1']);
        $this->pushProperty('role', 'button');
    }

    static function linkGoBack(string $href, string $caption = 'Regresar'): LinkItem
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return (new self('danger', $href))->append((new Iconic('action-undo', ''))->appendText($caption));
    }
}
