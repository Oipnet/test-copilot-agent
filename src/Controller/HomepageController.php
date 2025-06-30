<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

#[AsController]
class HomepageController
{
    public function __construct(
        private Environment $twig
    ) {
    }

    #[Route('/', name: 'home')]
    public function __invoke(): Response
    {
        return new Response($this->twig->render('homepage.html.twig'));
    }
}