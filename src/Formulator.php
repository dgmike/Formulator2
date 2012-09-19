<?php

namespace Formulator;
use Formulator\Config as Config;

/**
 * Formulator Base Class
 */
class Formulator
{
    protected $form;
    
	public function __construct(Config $config = null)
	{
	    $this->form = new \Formulator\Form;
	    if ($config) {
    		$this->config($config);
        }
	}

    public function config(Config $config)
    {
        if ($config->hasElements()) {
            $this->addElements($config->getElements());
        }
        $this->setValues($config->getValues());
        $this->configureForm($config->getFormConfig());
    }

    public function addElements(array $elements)
    {
        foreach ($elements as $element) {
            if (is_object($element) && $element instanceof Config\Element) {
                $this->addElement($element);
            } else {
                // @TODO trace out
            }
        }
    }

    public function addElement(Config\Element $configElement)
    {
        // @TODO
    }

    public function configureForm(Config\Form $config)
    {
        // @TODO
    }

    public function setValues(array $values = array())
    {
        // @TODO
    }
    
    public function getValues($name = '')
    {
        if (!is_string($name) || !trim($name)) {
            // @TODO trace out
        }
        // @TODO
    }
}