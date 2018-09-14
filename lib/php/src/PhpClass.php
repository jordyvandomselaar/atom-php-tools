<?php

namespace JordyvD\AtomPhpTools;

class PhpClass
{
    /** @var string **/
    public $name;

    /** @var ConstructorProperty[] */
    public $constructorProperties;

    public function __construct(string $name, ConstructorParameter ...$constructorProperties)
    {
        $this->name = $name;
        $this->constructorProperties = $constructorProperties;
    }
}
