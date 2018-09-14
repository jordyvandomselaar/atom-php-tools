<?php

namespace JordyvD\AtomPhpTools;

class ConstructorProperty
{
    /** @var string **/
    public $name;

    /** @var string **/
    public $type;

    public function __construct(string $name, string $type)
    {
        $this->name = $name;
        $this->type = $type;
    }
}
