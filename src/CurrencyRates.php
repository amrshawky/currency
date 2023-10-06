<?php

namespace AmrShawky;

use AmrShawky\Traits\ParamsOverload;
use GuzzleHttp\Client;

/**
 * @method self source(string $source)
 * @method self base(string $base)
 */

class CurrencyRates extends API
{
    use ParamsOverload;

    /**
     * @var null
     */
    private $symbols = null;

    /**
     * @var null
     */
    private $places = null;

    /**
     * @var float
     */
    private $amount = 1.00;

    /**
     * @var array
     */
    protected $available_params = [
        'base',
        'source'
    ];

    /**
     * CurrencyRates constructor.
     *
     * @param Client|null $client
     */
    public function __construct(?Client $client = null, $config = [])
    {
        parent::__construct($client, $config);

        $this->setQueryParams(function () {
            $params = ['amount' => $this->amount];

            if ($this->places) {
                $params['places'] = $this->places;
            }

            if ($this->symbols) {
                $params['symbols'] = implode(',', $this->symbols);
            }

            return $params;
        });
    }

    /**
     * @param float $amount
     *
     * @return $this
     */
    public function amount(float $amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @param array $symbols
     *
     * @return $this
     */
    public function symbols(array $symbols)
    {
        $this->symbols = $symbols;
        return $this;
    }

    /**
     * @param $places
     *
     * @return $this
     */
    public function round(int $places)
    {
        $this->places = $places;
        return $this;
    }

    /**
     * @param object $response
     *
     * @return mixed|null
     */
    protected function getResults(object $response)
    {
        if (!empty($rates = (array) $response->rates)) {
            unset($response->rates);

            return $rates;
        }

        return null;
    }
}
