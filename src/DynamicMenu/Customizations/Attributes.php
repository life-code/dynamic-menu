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
        'class'      => '',
        'attributes' => '',
    ];
    
    /**
     * Custom tag li dropdown
     * 
     * @var array
     */ 
    private $li_dropdown = [
        'class'      => '',
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
     * Set style
     * 
     * @param string $attribute
     * @param array $style
     * @return void
     */
    public function setStyle(string $attribute, array $style)
    {
        $this->handlerProperty($attribute);
        
        foreach ($style as $key => $value) {
            $this->handlerKey($attribute, $key);
            $this->$attribute[$key] = $value;
        }
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