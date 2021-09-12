<?php

namespace App\Services\Activity;

use App\Services\RpcClient;

/**
 * @method tick(array $params)
 * @method summary(array $params)
 */
class ActivityRpcClient extends RpcClient
{
    protected function getEndpointUrl(): string
    {
        return env('ACTIVITY_URL');
    }

    protected function getEndpointName(): string
    {
        return 'activity';
    }

}
