# Simplified

## Install by Composer:

```sh
$ composer require life-code/dynamic-menu
```

## Using:
```sh
<?php

require('vendor/autoload.php');

$dynamic_menu = new \DynamicMenu\DynamicMenu();

$menus = [
    [
        'id'      => 1,
        'menu_id' => null,
        'name'    => 'Home',
        'title'   => 'Home',
        'href'    => '#', 
        'order'   => 0
    ],
    [
        'id'      => 2,
        'menu_id' => 1,
        'name'    => 'Sub Home',
        'title'   => 'Sub Home',
        'href'    => '#', 
        'order'   => 0
    ],
];

$dynamic_menu->withStyle('ul_dropdown', ['class' => 'menu'])
             ->withStyle('li_dropdown', ['class' => 'dropdown'])
             ->setContentArray($menus)
             ->toHtml();

# Output
<li class="dropdown">
    <a href="#" title="Home">Home</a>
    <ul class="menu">
        <li>
            <a href="#" title="Sub Home">Sub Home</a>
        </li>
    </ul>
</li>
```