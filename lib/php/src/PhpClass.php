<?php

namespace JordyvD\AtomPhpTools;

class PhpClass
{
    /** @var string **/
    public $name;

    /** @var ConstructorParameter[] */
    public $constructorParameters;

    public function __construct(string $name, ConstructorParameter ...$constructorParameters)
    {
        $this->name = $name;
        $this->constructorProperties = $constructorParameters;
    }
}
