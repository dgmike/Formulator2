<?php

namespace Formulator;

/**
 * Just a simple element that generates the basic form tag
 */
class Form
{
    const ENCTYPE_URLENCODED = 'application/x-www-form-urlencoded';
    const ENCTYPE_PLAIN      = 'text/plain';
    const ENCTYPE_MULTIPART  = 'multipart/form-data';
    
    const METHOD_GET  = 'get';
    const METHOD_POST = 'post';
    
    protected $attriutes = array(
        'method'  => 'get',
        'action'  => '',
        'enctype' => self::ENCTYPE_URLENCODED, 
    );

    public function __construct(array $config = null)
    {
        if (isset($config['upload']) && $config['upload']) {
            $this->setUpload();
        }
        if (isset($config['method'])) {
            $this->setMethod($config['method']);
        }
        if (isset($config['action'])) {
            $this->setAction($config['action']);
        }
        if (isset($config['enctype'])) {
            $this->setEnctype($config['enctype']);
        }
    }
    
    static public function constants($filter = null)
    {
        $reflectionClass = new ReflectionClass(__CLASS__);
        $constants = $reflectionClass->getConstants();
        if (is_null($filter)) {
            return $constants;
        }
        $filter   = strtoupper($filter) . '_';
        $filtered = array();
        foreach($constants as $constant) {
            if (strpos($constant, $filter) === 0) {
                array_push($filtered, $constant);
            }
        }
        return $filtered;
    }
    
    static public function constantsValues($filter = null)
    {
        $reflectionClass = new ReflectionClass(__CLASS_);
        $constants = self::constants($filter);
        $converted = array();
        foreach($constants as $constant) {
            array_push($converted, $reflectionClass->getConstant($constant));
        }
        return $converted;
    }

    public function setMethod($method)
    {
        $this->setPost($method == self::METHOD_POST);
        return $this;
    }

    public function setAction($action)
    {
        $this->attriutes['action'] = $action;
        return $this;
    }

    public function setPost($mustBePost)
    {
        $method = ((bool) $mustBePost ? self::METHOD_POST : self::METHOD_GET);
        $this->attriutes['method'] = $method;
        return $this;
    }
    
    public function setEnctype($enctype = self::ENCTYPE_URLENCODED)
    {
        if (!in_array($enctype, self::constantsValues('ENCTYPE'))) {
            // @TODO warning
            return $this;
        }
        $this->attriutes['enctype'] = $enctype;
        return $this;
    }
    
    public function setUpload()
    {
        $this->setPost(true)
             ->setEnctype(self::ENCTYPE_MULTIPART);
    }
}
