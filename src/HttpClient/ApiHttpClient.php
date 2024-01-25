<?php

namespace App\HttpClient;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiHttpClient extends AbstractController
{
    private $httpClient;

    public function __construct(HttpClientInterface $jph)
    {
        $this->httpClient = $jph;
    }

    public function getUsers()
    {
        $response = $this->httpClient->request('GET', '?results=15', [
            'verify_peer' => false,
        ]);

        return $response->toArray();
    }
}