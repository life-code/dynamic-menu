<?php

namespace App\Helpers\Collections;

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
abstract class Collection
{
    /**
     * Disorganized menu items
     * 
     * @var array
     */ 
    protected $items;
    
    /**
     * Organized menu items
     * 
     * @var array
     */ 
    private $menus;
    
    /**
     * Sort dynamic menu
     * 
     * @return object / array
     */
    public function sortStructure()
    {
        $this->menus = $this->generateChildress(
            $this->generateParent($this->items)
        );
        
        return $this->menus;
    }
    
    /**
     * Set items in menu
     * 
     * @param object / array $items
     * @return $this
     */
    protected function setItems($items)
    {
        foreach ($items as $value) {
            $this->items[] = $value;
        }
        
        return $this;
    }
    
    /**
     * Get the organized menu
     * 
     * @return object array
     */ 
    public function getMenus()
    {
        return $this->menus;
    }
}