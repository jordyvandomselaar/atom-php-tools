<?php
require_once __DIR__."/../../vendor/autoload.php";

// $activeFilePath = $argv[1];
$activeFilePath = "/Users/jordyvandomselaar/workspace/atom/php-tools/test-files/test.php";
$parsedFile = new \Go\ParserReflection\ReflectionFile($activeFilePath);


// Get all construct arguments and their types
$classConstructorParameters = array_reduce($parsedFile->getFileNamespaces(), function ($carrier, $namespace) {
    // New array with namespaces as keys, and classes in the namespaces as values
    return array_reduce($namespace->getClasses(), function ($carrierA, $class) {
        // Array with class as key and every method as value
        $carrierA[$class->getName()] = array_reduce($class->getMethods(), function ($carrierB, $method) {
            // We only want the constructors
            if ($method->getName() !== "__construct") {
                return $carrierB;
            }
            // Array with parameters as keys and name + type of parameter as values
            return array_reduce($method->getParameters(), function ($carrierC, $parameter) {
                    $carrierC['constructor'][$parameter->getName()] = [
                        'name' => $parameter->getName(),
                        'type' => (string)$parameter->getType()
                    ];

                    return $carrierC;
            }, ['constructor' => []]);
        }, []);

        return $carrierA;
    }, []);
}, []);

var_export($classConstructorParameters);
