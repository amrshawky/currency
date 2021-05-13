<?php

namespace AmrShawky;

use GuzzleHttp\Client;

class CurrencyFactory
{
    /**
     * @param Client|null $client
     *
     * @return CurrencyConversion
     */
    public function convert(?Client $client = null)
    {
        return new CurrencyConversion($client);
    }

    /**
     *
     * @return CurrencyRatesProxy
     */
    public function rates()
    {
        return new CurrencyRatesProxy();
    }
}