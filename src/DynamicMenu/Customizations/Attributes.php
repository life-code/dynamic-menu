<?php

namespace DynamicMenu\Customizations;

use DynamicMenu\Exceptions\DynamicMenuException;

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
trait Attributes
{
    /**
     * Custom tag ul dropdown
     * 
     * @var array
     */ 
    private $ul_dropdown = [
        'class'      => 'menu',
        'attributes' => '',
    ];
    
    /**
     * Custom tag li dropdown
     * 
     * @var array
     */ 
    private $li_dropdown = [
        'class'      => 'dropdown',
        'attributes' => '',
    ];
    
    /**
     * Custom tag li
     * 
     * @var array
     */ 
    private $li = [
        'class'      => '',
        'attributes' => '',
    ];
    
    /**
     * Custom tag a dropdown
     * 
     * @var array
     */ 
    private $a_dropdown = [
        'class'       => '',
        'attributes'  => '',
        'before'      => '',
        'after'       => '',
    ];
    
    /**
     * Custom tag a
     * 
     * @var array
     */ 
    private $a = [
        'class'       => '',
        'attributes'  => '',
        'before'      => '',
        'after'       => '',
    ];
    
    /**
     * Get one attribute
     * 
     * @param string $attribute
     * @return array
     */ 
    public function get(string $attribute)
    {
        $this->handlerProperty($attribute);
        
        return $this->$attribute;
    }
    
    /**
     * Set ul_dropdown
     * 
     * @param array $ul_dropdown
     * @return $this
     */
    public function setUlDropdown(array $ul_dropdown)
    {
        foreach ($ul_dropdown as $key => $value) {
            $this->handlerKey('ul_dropdown', $key);
        }
        
        return $this;
    }
    
    /**
     * Set li_dropdown
     * 
     * @param array $li_dropdown
     * @return $this
     */
    public function setLiDropdown(array $li_dropdown)
    {
        foreach ($li_dropdown as $key => $value) {
            $this->handlerKey('li_dropdown', $key);
        }
        
        return $this;
    }
    
    /**
     * Set li
     * 
     * @param array $li
     * @return $this
     */
    public function setLi(array $li)
    {
        foreach ($li as $key => $value) {
            $this->handlerKey('li', $key);
        }
        
        return $this;
    }
    
    /**
     * Set a_dropdown
     * 
     * @param array $a_dropdown
     * @return $this
     */
    public function setADropdown(array $a_dropdown)
    {
        foreach ($a_dropdown as $key => $value) {
            $this->handlerKey('a_dropdown', $key);
        }
        
        return $this;
    }
    
    /**
     * Set a
     * 
     * @param array $a
     * @return $this
     */
    public function setA(array $a)
    {
        foreach ($a as $key => $value) {
            $this->handlerKey('a', $key);
        }
        
        return $this;
    }
    
    /**
     * Hanlder property exists
     * 
     * @param string $attribute
     * @trows \DynamicMenu\Exceptions\DynamicMenuException
     * @return void
     */ 
    private function handlerProperty(string $attribute)
    {
        if (!property_exists($this, $attribute)) {
            throw new DynamicMenuException("The [$attribute] isn't a valid attribute.");
        }
    }
    
    /**
     * Hanlder key exists in property
     * 
     * @param string $attribute
     * @param string $key
     * @trows \DynamicMenu\Exceptions\DynamicMenuException
     * @return void
     */ 
    private function handlerKey(string $attribute, string $key)
    {
        if (!in_array($key, array_keys($this->$attribute))) {
            throw new DynamicMenuException("The [$key] isn't a valid stylesheets in [$attribute].");
        }
    }
}