<?php
declare(strict_types=1);
/**
 * @Filename: Single.php
 * @Description:
 * @CreatedAt: 13/05/20 22:08
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Complex\Gentelella\Sidebar;


use Rcc\Html\Tags\A;
use Rcc\Html\Tags\Li;

class Single extends Li implements Item
{
    /** @var string */
    private $href;
    /** @var string */
    private $caption;

    /**
     * Single constructor.
     * @param string $href
     * @param string $caption
     */
    function __construct(string $href, string $caption)
    {
        parent::__construct();
        $this->href = $href;
        $this->caption = $caption;
    }

    function toHtml(): string
    {
        $this->removeAllElements()->append((new A($this->href))->appendText($this->caption));

        return parent::toHtml();
    }
}
