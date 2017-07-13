<?php

namespace App\Helpers;

use App\Helpers\Generators\ArrayGenerator;
use App\Helpers\Generators\ObjectGenerator;
use App\Helpers\Collections\ArrayCollection;
use App\Helpers\Customizations\Customization;
use App\Helpers\Collections\ObjectCollection;

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
class DynamicMenu
{
    /**
     * The Dynamic Menu version.
     *
     * @var string
     */
    const VERSION = '1.0.0';
    
    /**
     * Instance of class Customization.
     * 
     * @var \App\Helpers\Customizations\Customization
     */ 
    private $custom;
    
    /**
     * Instance of class ArrayCollection / ObjectCollection.
     * 
     * @var \App\Helpers\Contracts\CollectionContract
     */ 
    private $collection;
    
    /**
     * Instance of class ArrayGenerator / ObjectGenerator.
     * 
     * @var \App\Helpers\Contracts\GeneratorContract
     */ 
    private $generator;
    
    /**
     * New instance of class.
     * 
     * @return void
     */ 
    public function __construct()
    {
        $this->custom = new Customization();
    }

    /**
     * Get the version number of the package.
     *
     * @return string
     */
    public function version()
    {
        return static::VERSION;
    }
    
    /**
     * Set style.
     * 
     * @param string $attribute
     * @param array $style
     * @return $this
     */
    public function withStyle(string $attribute, array $style)
    {
        $this->custom->setStyle($attribute, $style);
        
        return $this;
    }
    
    /**
     * Set content for array.
     * 
     * @param array $items
     * @return $this
     */
    public function setContentArray(array $items)
    {
        $this->collection = new ArrayCollection($items);
        
        $this->generator = new ArrayGenerator(
            $this->collection->sortStructure()
        );
        
        return $this;
    }
    
    /**
     * Set content for object.
     * 
     * @param object $items
     * @return $this
     */
    public function setContentObject($items)
    {
        $this->collection = new ObjectCollection($items);
        
        $this->generator = new ObjectGenerator(
            $this->collection->sortStructure()
        );
        
        return $this;
    }
    
    /**
     * Get the html generated for dynamic menu.
     * 
     * @return string
     */
    public function toHtml()
    {
        return $this->generator->withCustom($this->custom)->generate();
    }
}