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
interface CollectionContract
{
    /**
     * New instance of class.
     * 
     * @param array $items
     * @return void
     */ 
    public function __construct($items = []);
    
    /**
     * Generate parent dynamic menu
     * 
     * @param array $items
     * @return array
     */ 
    public function generateParent(array $items);
    
    /**
     * Generate childress dynamic menu
     * 
     * @param array $menus
     * @return array
     */ 
    public function generateChildress(array $menus);
    
    /**
     * Filters the parents dynamic menu
     * 
     * @param array $items
     * @param bool $parents
     * @return array
     */ 
    public function filterParent(array $items, bool $parents = false);
    
    /**
     * Filters the childress dynamic menu
     * 
     * @param array $items
     * @param array $menu
     * @param bool $parents
     * @return array
     */ 
    public function filterChildress(array $items, $menu, bool $parents = false);
    
    /**
     * Sort menus
     * 
     * @param array $items
     * @return array
     */ 
    public function sortBy(array $items);
}