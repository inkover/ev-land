<?php

namespace App\Services\Activity;

use App\Jobs\ActivityTickJob;

class TickService
{

    private ActivityRpcClient $client;

    public function __construct(ActivityRpcClient $client)
    {
        $this->client = $client;
    }

    public function dispatchTick(string $url, \DateTime $tickTimestamp): void
    {
        ActivityTickJob::dispatch($url, $tickTimestamp);
    }

    public function handleTick(string $url, \DateTime $tickTimestamp): void
    {
        $this->client->tick([
            'url' => $url,
            'tick_timestamps' => $tickTimestamp
        ])
        ;

    }

}
