<?php

namespace DynamicMenu\Supports;

use DynamicMenu\Exceptions\DynamicMenuException;

class DefaultConfig
{
    /**
     * @var string
     */
    private $primaryKey = 'id';
    
    /**
     * @var string
     */
    private $parentKey = 'menu_id';
    
    /**
     * @var string
     */
    private $order = 'order';
    
    /**
     * @var string
     */
    private $href = 'href';
    
    /**
     * @var string
     */
    private $name = 'name';
    
    /**
     * @var string
     */
    private $title = 'title';
    
    /**
     * @var array
     */
    private $icons = [
        'before' => '',
        'after'  => '',
    ];
    
    /**
     * Get primary key
     * 
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }
    
    /**
     * Get Srimary key
     * 
     * @param string $primaryKey
     * @return $this
     */
    public function setPrimaryKey(string $primaryKey)
    {
        $this->primaryKey = $primaryKey;
        
        return $this;
    }
    
    /**
     * Get parent key
     * 
     * @return string
     */
    public function getParentKey()
    {
        return $this->parentKey;
    }
    
    /**
     * Set Parent key
     * 
     * @param string $parentKey
     * @return $this
     */
    public function setParentKey(string $parentKey)
    {
        $this->parentKey = $parentKey;
        
        return $this;
    }
    
    /**
     * Get order
     * 
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
    }
    
    /**
     * Set order
     * 
     * @param string $order
     * @return $this
     */
    public function setOrder(string $order)
    {
        $this->order = $order;
        
        return $this;
    }
    
    /**
     * Get href
     * 
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }
    
    /**
     * Set href
     * 
     * @param string $href
     * @return $this
     */
    public function setHref(string $href)
    {
        $this->href = $href;
        
        return $this;
    }
    
    /**
     * Get name
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set name
     * 
     * @param string $name
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * Get title
     * 
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Set title
     * 
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        
        return $this;
    }
    
    /**
     * Get icons
     * 
     * @return array
     */
    public function getIcons()
    {
        return $this->icons;
    }
    
    /**
     * Set icons
     * 
     * @param array $icons
     * @return $this
     */
    public function setIcons(array $icons)
    {
        foreach ($icons as $key => $value) {
            $this->handlerKey('icons', $key);
            $this->icons[$key] = $value;
        }
        
        return $this;
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
            throw new DynamicMenuException("The [$key] isn't a valid attribute in [$attribute].");
        }
    }
}