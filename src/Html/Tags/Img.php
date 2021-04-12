<?php
declare(strict_types=1);
/**
 * @Filename: Img.php
 * @Description:
 * @CreatedAt: 26/04/20 12:34
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Tags;


use Rcc\Html\BootstrapElementBase;

class Img extends BootstrapElementBase
{
    protected $elementType = 'img';
    /** @var int */
    private $width;
    /** @var int */
    private $height;

    function __construct(string $src, string $alt, string $htmlId = '', array $classes = [], int $width = 0, int $height = 0)
    {
        $this->pushProperty('src', $src)->pushProperty('alt', $alt);
        $this->htmlId = $htmlId;
        $this->classes = $classes;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @param int $width
     * @return Img
     */
    public function setWidth(int $width): Img
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @param int $height
     * @return Img
     */
    public function setHeight(int $height): Img
    {
        $this->height = $height;

        return $this;
    }

    function toHtml(): string
    {
        if ($this->width > 0) {
            $this->pushProperty('width', "{$this->width}");
        }
        if ($this->height > 0) {
            $this->pushProperty('height', "{$this->height}");
        }
        return <<<html
<{$this->elementType} {$this->generateStringHtmlId()} {$this->generateStringClasses()} {$this->generateStringProperties()}>

html;
    }
}
