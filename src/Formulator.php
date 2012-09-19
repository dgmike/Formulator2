<?php

namespace Formulator;
use Formulator\Config as Config;
use Formulator\Form as Form;

require_once __DIR__ . 'Config.php';

/**
 * Formulator Base Class
 * 
 * Use the Formulator\Config object to create all configurations for the object
 * before use this class to render or manipulate the form.
 * 
 * @see \Formulator\Config The config of Formulator
 */
class Formulator
{
    protected $form;

    /**
     * Instanciate a new class
     *
     * You must pass an Formulator Config object
     *
     * <pre>
     * $config = array(
     *     'form' => array(
     *         'method' => 'post',
     *         'action' => '/'
     *     ),
     * );
     * $configObject = new \Formulator\Config($config)
     * $formulatorObject = new \Formulator\Formulator($configObject);
     * echo $formulatorObject->renderOpenForm();
     * </pre>
     * 
     * @param \Formulator\Config $config the configuration of form
     */
	public function __construct(Config $config = null)
	{
	    $this->form = new Form;
	    if ($config) {
    		$this->config($config);
        }
	}

    /**
     * Configures the Formulator Object
     * 
     * You need to pass an new Config object
     */
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