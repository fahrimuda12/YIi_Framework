<?php

namespace frontend\tests;

use frontend\models\Item;

class ExampleTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $item = new Item();
        $item->name = "Zulqhi fahri";
        $this->assertTrue($item->validate(['name']));
    }
}
