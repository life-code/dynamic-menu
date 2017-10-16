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
            
            $this->handlerOlders($menu);
            
            return $menu;
        }, $menus);
    }
    
    /**
     * Handles olders attributes
     * 
     * @param object $menu
     * @return void
     */ 
    private function handlerOlders($menu)
    {
        $pattern = '/\#.*?\#/';
        preg_match_all($pattern, $this->content, $result);
        
        foreach ($result[0] as $key => $value) {
            $search  = $value;
            $replace = str_replace('#', '', $value);
            
            $this->content = str_replace($search, $menu->$replace, $this->content);
        }
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
        $href  = $this->config->getHref();
        $name  = $this->config->getName();
        $title = $this->config->getTitle();
        $icons = $this->config->getIcons();
        
        $icon_before = '';
        $before      = $icons['before'];
        if (isset($menu->$before)) {
            $icon_before = $menu->$before;
        }
        
        $icon_after = '';
        $after      = $icons['after'];
        if (isset($menu->$after)) {
            $icon_after = $menu->$after;
        }
        
        $search  = ['#href#', '#icon-before#', '#name#', '#title#', '#icon-after#'];
        $replace = [$menu->$href, $icon_before, $menu->$name, $menu->$title, $icon_after];
        
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