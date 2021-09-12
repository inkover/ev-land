<?php

namespace App\Services\Activity;

class SummaryService
{

    private ActivityRpcClient $client;

    public function __construct(ActivityRpcClient $client)
    {
        $this->client = $client;
    }

    public function getList($limit, $offset): array
    {
        return $this->client->summary(['limit' => $limit, 'offset' => $offset]);
    }

}
