<?php

namespace App\Http\Services;

use GuzzleHttp\Client;

class ChatService {

    protected string $openai_base_url;
    protected array $header;
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->openai_base_url = 'https://api.openai.com/v1/';
        $this->header = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        ];
    }

    public function chat($role, $message)
    {
        $chatting_api = 'chat/completions';

        $response = $this->client->post($this->openai_base_url . $chatting_api, [
            'headers' =>  $this->header,
            'json' => [
                'model' => "gpt-3.5-turbo",
                'messages' => json_encode(['role' => $role, 'content' => $message]),
                'temperature' => 0.7,
            ],
        ]);
        $result = json_decode($response->getBody()->getContents(), true);

        return $result['choices']['message']['content'];
    }


    public function getModels()
    {
        $model_api = 'models';

        $response = $this->client->get($this->openai_base_url . $model_api, [
            'headers' =>  $this->header,
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }
}
