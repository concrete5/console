<?php

namespace Concrete\Console;

class TestCase extends \PHPUnit\Framework\TestCase
{

    /**
     * @beforeClass
     */
    public static function concreteSetup()
    {
        // Declare c5 execute
        if (!defined('C5_EXECUTE')) {
            define('C5_EXECUTE', 'concrete5/console');
        }
    }

    /**
     * @after
     */
    public function mockeryTearDown()
    {
        \Mockery::close();
    }

}
