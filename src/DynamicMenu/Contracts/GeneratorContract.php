<?php

namespace DynamicMenu\Contracts;

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
interface GeneratorContract
{
    /**
     * Generate dynamic menu
     * 
     * @return string
     */ 
    public function generate();
    
    /**
     * Handle content generator
     * 
     * @param array $menus
     * @param boll $child
     * @return array
     */ 
    public function handleContent(array $menus = [], bool $child = false);
    
    /**
     * Replace default values
     * 
     * @param string $dropdown
     * @param object / array $menu
     * @return string
     */ 
    public function replaceValues(string $dropdowm, $menu);
    
    /**
     * Generate dropdown menu
     * 
     * @param object / array $menu
     * @return void
     */ 
    public function dropdownGenerate($menu);
}