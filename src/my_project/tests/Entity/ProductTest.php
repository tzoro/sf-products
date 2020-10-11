<?php

namespace App\Tests\Entity;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testAdd()
    {
    	$name = 'test';
        $calculator = new Product();
        $calculator->setName($name);

        // assert that your calculator added the numbers correctly!
        $this->assertEquals($name, $calculator->getName());
    }
}