<?php

namespace DynamicMenu\Customizations;

use DynamicMenu\Customizations\Attributes;

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
class Customization
{
    use Attributes;
    
    /**
     * Get the base dropdown menu
     * 
     * @return string
     */ 
    public function getBase()
    {
        $ul_dropdown = $this->get('ul_dropdown');
        
        return '<ul class="'.$ul_dropdown['class'].'" '.$ul_dropdown['attributes'].'>';
    }
    
    /**
     * Get the init dropdown menu
     * 
     * @return string
     */ 
    public function getInitDropdown()
    {
        $li_dropdown = $this->get('li_dropdown');
        $a_dropdown  = $this->get('a_dropdown');
        
        $generated  = '<li class="'.$li_dropdown['class'].'" '.$li_dropdown['attributes'].'>';
        $generated .= '<a href="#href#" class="'.$a_dropdown['class'].'" '.$a_dropdown['attributes'].' title="#title#">';
        $generated .= $a_dropdown['before'];
        $generated .= '#name#';
        $generated .= $a_dropdown['after'];
        $generated .= '</a>';
        
        return $generated;
    }
    
    /**
     * Get the finish dropwdown menu
     * 
     * @return string
     */ 
    public function getFinishDropdown()
    {
        return '</ul></li>';
    }
    
    /**
     * Get default item in menu
     * 
     * @return string
     */ 
    public function getDefault()
    {
        $li = $this->get('li');
        $a  = $this->get('a');
        
        $generated  = '<li class="'.$li['class'].'" '.$li['attributes'].'>';
        $generated .= '<a href="#href#" class="'.$a['class'].'" '.$a['attributes'].' title="#title#">';
        $generated .= $a['before'];
        $generated .= '#name#';
        $generated .= $a['after'];
        $generated .= '</a>';
        $generated .= '</li>';
        
        return $generated;
    }
}