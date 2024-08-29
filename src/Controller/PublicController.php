<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PublicController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('public/index.html.twig', [
        ]);
    }

    #[Route('/article/{id<\d+>}',
        name: 'article',
        defaults: ['id' => 1],
        methods: ['GET'])]
    public function article(int $id): Response
    {
        return $this->render('public/article.html.twig', [
            'idarticle' => $id,
        ]);
    }

}
