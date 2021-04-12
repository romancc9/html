<?php
declare(strict_types=1);
/**
 * @Filename: Item.php
 * @Description:
 * @CreatedAt: 24/04/20 9:26
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Breadcrumb;


use Rcc\Html\Tags\A;
use Rcc\Html\Tags\Li;

class Item extends Li
{
    /** @var bool */
    private $isActive = false;
    /** @var string */
    private $caption;
    /** @var string */
    private $href;

    function __construct(string $caption, string $href = '#', array $classes = [])
    {
        parent::__construct();
        if (!empty($classes)) {
            $this->pushClasses($classes);
        }
        $this->pushOneClass('breadcrumb-item');
        $this->caption = $caption;
        $this->href = $href;
    }

    function activate(): Item
    {
        $this->isActive = true;

        return $this;
    }

    function toHtml(): string
    {
        $this->removeAllElements();
        if ($this->isActive) {
            $this->pushOneClass('active')
                ->pushProperty('aria-current', 'page')
                ->appendText($this->caption);
        } else {
            $this->append((new A($this->href))->appendText($this->caption));
        }
        return parent::toHtml();
    }
}
