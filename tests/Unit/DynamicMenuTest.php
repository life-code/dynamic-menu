<?php

namespace tests\Unit;

use DynamicMenu\DynamicMenu;
use DynamicMenu\Exceptions\DynamicMenuException;
use PHPUnit\Framework\TestCase;

class TestDynamicMenu extends TestCase
{
    public function getInstance()
    {
        return new DynamicMenu();
    }
    
    public function testNewDynamicMenu()
    {
        $this->assertInstanceOf(
            DynamicMenu::class, 
            $this->getInstance()
        );
    }
    
    public function testWithStyle_ul_dropdown()
    {
        $instance = $this->getInstance();
        
        $values = [
            'class'      => 'teste-class',
            'attributes' => 'teste-attributes',
        ];
        
        $this->assertInstanceOf(
            DynamicMenu::class, 
            $instance->withStyle('ul_dropdown', $values)
        );
    }
    
    public function testWithStyle_li_dropdown()
    {
        $instance = $this->getInstance();
        
        $values = [
            'class'      => 'teste-class',
            'attributes' => 'teste-attributes',
        ];
        
        $this->assertInstanceOf(
            DynamicMenu::class, 
            $instance->withStyle('li_dropdown', $values)
        );
    }
    
    public function testWithStyle_li()
    {
        $instance = $this->getInstance();
        
        $values = [
            'class'      => 'teste-class',
            'attributes' => 'teste-attributes',
        ];
        
        $this->assertInstanceOf(
            DynamicMenu::class, 
            $instance->withStyle('li', $values)
        );
    }
    
    public function testWithStyle_a_dropdown()
    {
        $instance = $this->getInstance();
        
        $values = [
            'class'      => 'teste-class',
            'attributes' => 'teste-attributes',
            'before'     => 'teste-before',
            'after'      => 'teste-after',
        ];
        
        $this->assertInstanceOf(
            DynamicMenu::class, 
            $instance->withStyle('a_dropdown', $values)
        );
    }
    
    public function testWithStyle_a()
    {
        $instance = $this->getInstance();
        
        $values = [
            'class'      => 'teste-class',
            'attributes' => 'teste-attributes',
            'before'     => 'teste-before',
            'after'      => 'teste-after',
        ];
        
        $this->assertInstanceOf(
            DynamicMenu::class, 
            $instance->withStyle('a', $values)
        );
    }
    
    public function testSetContentArray()
    {
        $instance = $this->getInstance();
        
        $menus = [
            [
                'id'      => 1,
                'menu_id' => null,
                'name'    => 'Home',
                'title'   => 'Home',
                'href'    => '#', 
                'order'   => 0
            ],
            [
                'id'      => 2,
                'menu_id' => 1,
                'name'    => 'Sub Home',
                'title'   => 'Sub Home',
                'href'    => '#', 
                'order'   => 0
            ],
        ];
        
        $this->assertInstanceOf(
            DynamicMenu::class, 
            $instance->setContentArray($menus)
        );
    }
    
    public function testSetContentObject()
    {
        $instance = $this->getInstance();
        
        $menus = (object) [
            (object) [
                'id'      => 1,
                'menu_id' => null,
                'name'    => 'Home',
                'title'   => 'Home',
                'href'    => '#', 
                'order'   => 0
            ],
            (object) [
                'id'      => 2,
                'menu_id' => 1,
                'name'    => 'Sub Home',
                'title'   => 'Sub Home',
                'href'    => '#', 
                'order'   => 0
            ],
        ];
        
        $this->assertInstanceOf(
            DynamicMenu::class, 
            $instance->setContentObject($menus)
        );
    }
    
    public function testToHtml()
    {
        $instance = $this->getInstance();
        
        $menus = (object) [
            (object) [
                'id'      => 1,
                'menu_id' => null,
                'name'    => 'Home',
                'title'   => 'Home',
                'href'    => '#', 
                'order'   => 0
            ],
            (object) [
                'id'      => 2,
                'menu_id' => 1,
                'name'    => 'Sub Home',
                'title'   => 'Sub Home',
                'href'    => '#', 
                'order'   => 0
            ],
        ];
        
        $this->assertContains(
            '<li class="', 
            $instance->setContentObject($menus)->toHtml()
        );
    }
    
    public function testVersion()
    {
        $instance = $this->getInstance();
        
        $this->assertEquals('1.0.0', $instance->version());
    }
}