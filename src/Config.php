<?php

namespace Formulator;

/**
 * Formulator Config
 * 
 * Use this object to configure your Formulator before instanciate a new
 * Formulator object
 * 
 * @see \Formulator\Formulator Manipulator object
 * @author Michael Granados <michaelgranados@gmail.com>
 */
class Config
{
    protected $values = array();
    protected $formConfig = array();
    protected $elements = array();
    
    public function __construct(array $config)
    {
        // @TODO
    }
}
