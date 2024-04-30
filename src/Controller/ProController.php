<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Stages;

class ProController extends AbstractController
{
    #[Route('/pro', name: 'app_pro')]
    public function professionnel(EntityManagerInterface $entityManager): Response
    {
        $stages = $entityManager->getRepository(Stages::class)->findAll();

        return $this->render('pro/index.html.twig', [
            'stages' => $stages,
        ]);
    }

    #[Route('/pro-detail/{id}', name: 'app_pro-detail')]
    public function detail(Stages $stage): Response
    {
        return $this->render('pro/detail.html.twig', [
            'stage' => $stage,
        ]);
    }
}
