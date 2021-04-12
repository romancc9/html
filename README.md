# HTML

Allows generate HTML Dom elements using PHP object oriented programming.

## Installation

This project using composer
```
$ composer require romancc9/html
```

## Usage
Create a DIV with some text.
```php
<?php

use Romancc9\Html;

$div = new Div(10);
echo (new Div())->appendText('Hello, I am a Div')->toHtml();
```