<?php

namespace AmrShawky;

use GuzzleHttp\Client;

/**
 * @method static CurrencyConversion convert(?Client $client = null)
 * @method static CurrencyRatesProxy rates(?Client $client = null)
 */

class Currency
{
    public static function __callStatic($name, $arguments)
    {
        $class = CurrencyFactory::class;

        if (method_exists($class, $name)) {
            return (new $class())->$name(...$arguments);
        }

        throw new \Exception("Method {$name} not found");
    }
}