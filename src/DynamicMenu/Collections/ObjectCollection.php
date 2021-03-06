<?php

namespace DynamicMenu\Collections;

use DynamicMenu\Collections\Collection;
use DynamicMenu\Contracts\CollectionContract;
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
class ObjectCollection extends Collection implements CollectionContract
{
    /**
     * Instance of class DefaultConfig.
     * 
     * @var \DynamicMenu\Supports\DefaultConfig
     */ 
    private $config;
    
    /**
     * Remaining items to organize
     * 
     * @var array
     */ 
    private $rest_items;
    
    /**
     * New instance of class.
     * 
     * @param object $items
     * @param \DynamicMenu\Supports\DefaultConfig $config
     * @return void
     */ 
    public function __construct($items = [], DefaultConfig $config)
    {
        $this->config = $config;
        $this->setItems($items);
    }
    
    /**
     * Generate parent dynamic menu
     * 
     * @param array $items
     * @return array
     */ 
    public function generateParent(array $items)
    {
        $this->rest_items = $this->filterParent($items);
        
        return $this->sortBy($this->filterParent($items, true));
    }
    
    /**
     * Generate childress dynamic menu
     * 
     * @param array $menus
     * @return array
     */ 
    public function generateChildress(array $menus)
    {
        return array_map(function($menu){
            $menu->child      = $this->sortBy($this->filterChildress($this->rest_items, $menu, true));
            $this->rest_items = $this->filterChildress($this->rest_items, $menu);
            
            if ($menu->child) {
                $menu->child = $this->generateChildress($menu->child);
            }
            
            return $menu;
        }, $menus);
    }
    
    /**
     * Filters the parents dynamic menu
     * 
     * @param array $items
     * @param bool $parents
     * @return array
     */ 
    public function filterParent(array $items, bool $parents = false)
    {
        return array_filter($items, function($item) use ($parents){
            $parent_key = $this->config->getParentKey();
            
            if ($parents) {
                return ! $item->$parent_key;
            }
            
            return ($item->$parent_key);
        });
    }
    
    /**
     * Filters the childress dynamic menu
     * 
     * @param array $items
     * @param object $menu
     * @param bool $parents
     * @return array
     */ 
    public function filterChildress(array $items, $menu, bool $parents = false)
    {
        return array_filter($items, function($item) use ($parents, $menu){
            $primary_key = $this->config->getPrimaryKey();
            $parent_key  = $this->config->getParentKey();
            
            if ($parents) {
                return ((int) $item->$parent_key === (int) $menu->$primary_key);
            }
            
            return ((int) $item->$parent_key !== (int) $menu->$primary_key);
        });
    }
    
    /**
     * Sort menus
     * 
     * @param array $items
     * @return array
     */ 
    public function sortBy(array $items)
    {
        $order = $this->config->getOrder();
        
        $results = [];

        foreach ($items as $key => $value) {
            $results[$key] = $value->$order;
        }

        asort($results, SORT_REGULAR);

        foreach (array_keys($results) as $key) {
            $results[$key] = $items[$key];
        }

        return array_values($results);
    }
}