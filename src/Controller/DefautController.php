<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class DefautController extends AbstractController
{
    #[Route('/', name: 'app_defaut')]
    public function index(EntityManagerInterface $entityManager)
    {
        $articles = $entityManager->getRepository(Article::class)->findAll();
        return $this->render('home.html.twig', [
            'articles' => $articles,
        ]);
    }
}
