<?php

namespace DynamicMenu\Generators;

use DynamicMenu\Customizations\Customization;
use DynamicMenu\Supports\DefaultConfig;

/**
 * Dynamic Menu
 * 
 * @category   Dynamic Menu
 * @version    1.0.0
 * @package    viniciuspugliesi/dynamic-menu
 * @copyright  Copyright (c) 2017 Vinicius Pugliesi (http://www.viniciuspugliesi.com)
 * @author     Vinicius Pugliesi <vinicius_pugliesi@outlook.com>
 * @license    MIT
 */
abstract class Generator
{
    /**
     * Instance of class DefaultConfig.
     * 
     * @var \DynamicMenu\Supports\DefaultConfig
     */ 
    protected $config;
    
    /**
     * The sort menus
     * 
     * @var array
     */ 
    protected $menus;
    
    /**
     * The content generated
     * 
     * @var string
     */ 
    protected $content;
    
    /**
     * New instance of class
     * 
     * @param array $menus
     * @param \DynamicMenu\Supports\DefaultConfig $config
     * @param \DynamicMenu\Customizations\Customization $custom
     * @return void
     */ 
    public function __construct(array $menus = [], DefaultConfig $config, Customization $custom)
    {
        $this->config = $config;
        $this->menus  = $menus;
        $this->custom = $custom;
    }
    
    /**
     * Generate default menu
     * 
     * @param object / array menu
     * @return string
     */ 
    public function defaultGenerate($menu)
    {
        $this->content .= $this->replaceValues(
            $this->custom->getDefault(), $menu
        );
    }
}