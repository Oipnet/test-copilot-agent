<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return new Response('<html><body><h1>Welcome to Symfony 7.3!</h1><p>This is a basic Symfony application.</p></body></html>');
    }
}