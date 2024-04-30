<?php

namespace App\Controller;

use App\Entity\Competences;
use App\Entity\Projets;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class TabcompController extends AbstractController
{
    #[Route('/tabcomp', name: 'app_tabcomp')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $projets = $entityManager->getRepository(Projets::class)->findAll();
        $competences = $entityManager->getRepository(Competences::class)->findAll();

        return $this->render('tabcomp/index.html.twig', [
            'projets' => $projets,
            'competences' => $competences,
        ]);
    }
}
