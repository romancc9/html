<?php


namespace Rcc\Html;


interface Element extends Dom
{
    function append(Dom $dom): Element;

    function pushClasses(array $classes = []): Element;

    function pushOneClass(string $class): Element;

    function show(): Element;

    function hide(): Element;

    function pushProperty(string $name, string $value = ''): Element;

    function pushCustomData(string $key, string $value): Element;
}
