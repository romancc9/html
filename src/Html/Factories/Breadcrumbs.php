<?php
declare(strict_types=1);
/**
 * @Filename: Breadcrumbs.php
 * @Description:
 * @CreatedAt: 24/04/20 10:05
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Factories;


use Rcc\Html\Complex\Breadcrumb\Breadcrumb;
use Rcc\Html\Complex\Breadcrumb\Item as BreadcrumbItem;
use Rcc\Html\Dom;

abstract class Breadcrumbs
{
    static function sectionTitle(string $caption, string $bgClass = 'bg-dark'): Dom
    {
        return (new Breadcrumb(['mb-1', 'mt-4', $bgClass, 'font-weight-bold', 'mx-0']))->appendItem(
            (new BreadcrumbItem($caption))->pushOneClass('text-light')
        );
    }
}
