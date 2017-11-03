# Advanced

## Install by Composer:

```sh
$ composer require life-code/dynamic-menu
```

## Using:
```sh
<?php

require('vendor/autoload.php');

$dynamic_menu = new \DynamicMenu\DynamicMenu();

$dynamic_menu->config(function($config){
    $config->setHref('url');
    $config->setTitle('name');
    $config->setIcons(['before' => 'icon']);
});

$dynamic_menu->style(function($style){
    $style->SetA(['before' => '<span class="app-dashboard-sidebar-text">', 'after' => '</span>']);
    $style->SetADropdown(['before' => '<span class="app-dashboard-sidebar-text">', 'after' => '</span>']);
    $style->SetUlDropdown(['attributes' => ' id="#reference#" ']);
});

$dynamic_menu->setContentObject($menu);

$dynamic_menu->toHtml();

```
