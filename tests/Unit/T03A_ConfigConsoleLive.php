<?php namespace Tests\Unit;

use Performance\Config;
use Performance\Performance;

class T03A_ConfigConsoleLive extends \PHPUnit_Framework_TestCase
{
    protected function setTestUp()
    {
        Performance::instanceReset();
    }

    public function testSetConfigItemConsoleLiveTrue()
    {
        $this->setTestUp();

        // Set config item live
        Config::setConsoleLive(true);

        // Set point
        Performance::point('Config console live');

        // Task
        usleep(2000);

        // Print results
        Performance::results();

        // Test
        $config = Performance::instance()->config;
        $this->assertTrue($config->isConsoleLive());
    }

    public function testSetConfigItemConsoleLiveFalse()
    {
        // Reset
        $this->setTestUp();

        // Set config item live
        Config::setConsoleLive(false);

        // Set point
        Performance::point('Config console live');

        // Task
        usleep(2000);

        // Print results
        Performance::results();

        // Test
        $config = Performance::instance()->config;
        $this->assertFalse($config->isConsoleLive());
    }
}
