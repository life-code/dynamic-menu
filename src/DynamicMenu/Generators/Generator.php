<?php

namespace DynamicMenu\Generators;

use DynamicMenu\Customizations\Customization;

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
     * @return void
     */ 
    public function __construct(array $menus = [])
    {
        $this->menus = $menus;
    }
    
    /**
     * Set Customization class
     * 
     * @param \DynamicMenu\Customizations\Customization $custom
     * @return $this
     */ 
    public function withCustom(Customization $custom)
    {
        $this->custom = $custom;
        
        return $this;
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