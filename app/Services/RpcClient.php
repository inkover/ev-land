<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

abstract class RpcClient
{
    abstract protected function getEndpointUrl(): string;

    abstract protected function getEndpointName(): string;

    public function __call($name, $arguments)
    {
        $data = [
            'jsonrpc' => '2.0',
            'id' => uniqid('', true),
            'method' => $this->getEndpointName() . '@' . $name,
        ];

        $params = $arguments[0] ?? [];
        if (is_array($params)) {
            $data['params'] = $params;
        }

        return Http::withBody(json_encode($data), 'application/json')->post($this->getEndpointUrl())->json()['result'] ?? '???';
    }


}
