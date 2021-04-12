<?php
declare(strict_types=1);


namespace Rcc\Html\Complex\Nav;


use Rcc\Html\Dom;
use Rcc\Html\Tags\Ul;

class Nav extends Ul
{

    function __construct(string $name = '', array $classes = [])
    {
        parent::__construct($name, $classes);
    }

    /**
     * Hint!!!: Si se quieren controlar las classes del navItem, se puede crear el Item y luego usar la función append()
     * Hint!!!: Mismo caso si se quiere agregar un Dropdown
     * @param string $href
     * @param string $caption
     * @return Dom
     */
    function appendNavItem(string $href, string $caption): Dom
    {
        $this->append(new Item($href, $caption));

        return $this;
    }
}
