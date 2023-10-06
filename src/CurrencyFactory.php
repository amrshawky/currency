<?php

namespace AmrShawky;

use GuzzleHttp\Client;

class CurrencyFactory
{
    /**
     * @var array
     */
    protected $config = [];

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    /**
     * @param Client|null $client
     *
     * @return CurrencyConversion
     */
    public function convert(?Client $client = null)
    {
        return new CurrencyConversion($client, $this->config);
    }

    /**
     *
     * @return CurrencyRatesProxy
     */
    public function rates()
    {
        return new CurrencyRatesProxy($this->config);
    }
}
