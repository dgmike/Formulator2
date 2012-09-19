<?php

namespace Formulator\Test;

require dirname(__DIR__) . '/src/Formulator.php';

class Formulator
    extends \PHPUnit_Framework_TestCase
{
    public function testHaveFormulator()
    {
        $formulator = new \Formulator\Formulator;
    }
}
