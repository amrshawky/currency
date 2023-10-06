<?php

namespace AmrShawky;

use GuzzleHttp\Client;

class CurrencyRatesProxy
{
    /**
     * @var array
     */
    protected $config = [];

    public function __construct($config = [])
    {
        $this->config = $config;
    }

    /**
     * @param Client|null $client
     *
     * @return CurrencyLatestRates
     */
    public function latest(?Client $client = null)
    {
        return new CurrencyLatestRates($client, $this->config);
    }

    /**
     * @param string      $date
     * @param Client|null $client
     *
     * @return CurrencyHistoricalRates
     */
    public function historical(string $date, ?Client $client = null)
    {
        return new CurrencyHistoricalRates($date, $client, $this->config);
    }

    /**
     * @param string      $date_from
     * @param string      $date_to
     * @param Client|null $client
     *
     * @return CurrencyTimeSeriesRates
     */
    public function timeSeries(string $date_from, string $date_to, ?Client $client = null)
    {
        return new CurrencyTimeSeriesRates($date_from, $date_to, $client, $this->config);
    }

    /**
     * @param string      $date_from
     * @param string      $date_to
     * @param Client|null $client
     *
     * @return CurrencyFluctuations
     */
    public function fluctuations(string $date_from, string $date_to, ?Client $client = null)
    {
        return new CurrencyFluctuations($date_from, $date_to, $client, $this->config);
    }
}
