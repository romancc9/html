<?php
declare(strict_types=1);


namespace Rcc\Html;


abstract class ElementBase implements Element
{
    /** @var string */
    protected $htmlId;
    /** @var string[] */
    protected $classes;
    /** @var Property[] */
    protected $properties = [];
    /** @var Dom[] */
    protected $elements = [];
    /** @var bool */
    protected $hidden = false;

    function pushOneElement(Dom $dom): Element
    {
        $this->elements[] = $dom;

        return $this;
    }

    function removeAllElements(): Dom
    {
        $this->elements = [];

        return $this;
    }

    /**
     * Alias of pushOneElement() function
     * @param Dom $dom
     * @return Element
     */
    function append(Dom $dom): Element
    {
        return $this->pushOneElement($dom);
    }

    function appendText(string $plainText): Element
    {
        return $this->append(new PlainText($plainText));
    }

    function setHtmlId(string $htmlId): Element
    {
        $this->htmlId = $htmlId;

        return $this;
    }

    function pushClasses(array $classes = []): Element
    {
        $this->classes = array_merge($this->classes, $classes);

        return $this;
    }

    function pushOneClass(string $class): Element
    {
        $this->classes = array_merge($this->classes, [$class]);

        return $this;
    }

    function pushProperty(string $name, string $value = ''): Element
    {
        $this->properties[] = new Property($name, $value);

        return $this;
    }

    function pushCustomData(string $key, string $value): Element
    {
        $this->properties[] = Property::fromCustomData($key, $value);

        return $this;
    }

    function show(): Element
    {
        $this->hidden = false;

        return $this;
    }

    function hide(): Element
    {
        $this->hidden = true;

        return $this;
    }

    function elementsCount(): int
    {
        return count($this->elements);
    }

    function hasElements(): bool
    {
        return $this->elementsCount() > 0;
    }

    protected function generateStringHtmlId(): string
    {
        if (empty($this->htmlId)) {
            return '';
        }

        return "id=\"{$this->htmlId}\"";
    }

    abstract protected function generateArrayClasses(): array;

    protected function generateStringClasses(): string
    {
        $classes = $this->generateArrayClasses();
        if (empty($classes)) {
            return '';
        }

        return 'class="' . implode(' ', $classes) . '"';
    }

    protected function generateHtmlElements(): string
    {
        $html = '';

        if (!$this->hasElements()) {
            return $html;
        }

        foreach ($this->elements as $element) {
            $html .= $element->toHtml();
        }

        return $html;
    }

    protected function generateStringProperties(): string
    {
        $output = '';

        if (empty($this->properties)) {
            return $output;
        }

        $cont = 0;
        foreach ($this->properties as $property) {
            if ($cont > 0) {
                $output .= ' '; // Glue
            }
            $output .= $property->toString();
            $cont++;
        }

        return $output;
    }
}
