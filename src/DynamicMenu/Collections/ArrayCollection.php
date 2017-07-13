<?php

namespace App\Helpers\Collections;

use App\Helpers\Collections\Collection;
use App\Helpers\Contracts\CollectionContract;

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
class ArrayCollection extends Collection implements CollectionContract
{
    /**
     * Remaining items to organize
     * 
     * @var array
     */ 
    private $rest_items;
    
    /**
     * New instance of class.
     * 
     * @param array $items
     * @return void
     */ 
    public function __construct($items = [])
    {
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
            $menu['child']    = $this->sortBy($this->filterChildress($this->rest_items, $menu, true));
            $this->rest_items = $this->filterChildress($this->rest_items, $menu);
            
            if ($menu['child']) {
                $menu['child'] = $this->generateChildress($menu['child']);
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
            if ($parents) {
                return ! $item['menu_id'];
            }
            
            return ($item['menu_id']);
        });
    }
    
    /**
     * Filters the childress dynamic menu
     * 
     * @param array $items
     * @param array $menu
     * @param bool $parents
     * @return array
     */ 
    public function filterChildress(array $items, $menu, bool $parents = false)
    {
        return array_filter($items, function($item) use ($parents, $menu){
            if ($parents) {
                return ((int) $item['menu_id'] === (int) $menu['id']);
            }
            
            return ((int) $item['menu_id'] !== (int) $menu['id']);
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
        $results = [];

        foreach ($items as $key => $value) {
            $results[$key] = $value['order'];
        }

        asort($results, SORT_REGULAR);

        foreach (array_keys($results) as $key) {
            $results[$key] = $items[$key];
        }

        return array_values($results);
    }
}