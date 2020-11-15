<?php
namespace Sildabia;

use GuzzleHttp\Client as GClient;

class Client
{
    /** @var ?\Exception */
    private $error;

    /** @return bool */
    public function send($user_id, $password, $event, $payload = null, $tags = null)
    {
        try {
            (new GClient([
                'base_uri'    => $this->getEndpopint(),
                'timeout'     => 0.5,
                'http_errors' => true,
            ]))->post('/api/event', [
                'json' => [
                    'user_id'  => $user_id,
                    'password' => $password,
                    'event'    => $event,
                    'payload'  => $payload,
                    'tags'     => $tags,
                ],
            ]);
        } catch (\Exception $e) {
            $this->error = $e;
            return false;
        }

        return true;
    }

    /** @return ?\Exception */
    public function getError()
    {
        return $this->error;
    }

    /** @return string */
    private function getEndpopint()
    {
        return 'https://sildabia.com';
    }
}
