<?php

namespace AmrShawky;

use GuzzleHttp\Client;

class CurrencyFluctuations extends CurrencyRates
{
    /**
     * CurrencyFluctuations constructor.
     *
     * @param string      $start_date
     * @param string      $end_date
     * @param Client|null $client
     */
    public function __construct(string $start_date, string $end_date, ?Client $client = null, $config = [])
    {
        parent::__construct($client, $config);
        $this->base_url = "https://api.exchangerate.host";
        $this->path = "/fluctuation";
        $this->params['start_date'] = $start_date;
        $this->params['end_date']   = $end_date;
    }

    /**
     * @param object $response
     *
     * @return mixed|null
     */
    protected function getResults(object $response)
    {
        if (!empty($fluctuations = (array) $response->rates)) {
            foreach ($fluctuations as $currency => $results) {
                $fluctuations[$currency] = (array) $results;
            }
            unset($response->rates);

            return $fluctuations;
        }

        return null;
    }
}
