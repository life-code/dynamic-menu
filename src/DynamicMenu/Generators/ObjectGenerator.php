<?php

namespace DynamicMenu\Generators;

use DynamicMenu\Generators\Generator;
use DynamicMenu\Contracts\GeneratorContract;

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
class ObjectGenerator extends Generator implements GeneratorContract
{
    /**
     * Generate dynamic menu
     * 
     * @return string
     */ 
    public function generate()
    {
        $this->handleContent($this->menus);
        
        return $this->content;
    }
    
    /**
     * Handle content generator
     * 
     * @param array $menus
     * @param boll $child
     * @return array
     */ 
    public function handleContent(array $menus = [], bool $child = false)
    {
        if ($child) {
            $this->content .= $this->custom->getBase();
        }
        
        return array_map(function($menu){
            if ($menu->child) {
                $this->dropdownGenerate($menu);
            } else {
                $this->defaultGenerate($menu);
            }
            
            return $menu;
        }, $menus);
    }
    
    /**
     * Replace default values
     * 
     * @param string $dropdown
     * @param object $menu
     * @return string
     */ 
    public function replaceValues(string $dropdowm, $menu)
    {
        $search  = ['#href#', '#name#', '#title#'];
        $replace = [$menu->href, $menu->name, $menu->title];
        
        return str_replace($search, $replace, $dropdowm);
    }
    
    /**
     * Generate dropdown menu
     * 
     * @param object $menu
     * @return void
     */ 
    public function dropdownGenerate($menu)
    {
        $this->content .= $this->replaceValues(
            $this->custom->getInitDropdown(), $menu
        );
        
        $this->handleContent($menu->child, true);
        
        $this->content .= $this->custom->getFinishDropdown();
    }
}