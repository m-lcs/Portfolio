<?php

// src/Controller/ProjetsController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Annee;
use App\Entity\Projets;
use App\Entity\Competences;
use Doctrine\ORM\EntityManagerInterface;

class ProjetsController extends AbstractController
{
    #[Route('/projets', name: 'app_projets')]
    public function listeProjets(EntityManagerInterface $entityManager): Response
    {
        $annees = $entityManager->getRepository(Annee::class)->findAll();

        return $this->render('projets/index.html.twig', [
            'annees' => $annees,
        ]);
    }

    #[Route('/projet-detail/{id}', name: 'app_projet-detail')]
    public function detail(Projets $projet): Response
    {
        $hasProjectCompetence = false;

        foreach ($projet->getCompetences() as $competence) {
            if ($competence->getId() == 4) {
                $hasProjectCompetence = true;
                break;
            }
        }

        return $this->render('projets/detail.html.twig', [
            'projet' => $projet,
            'hasProjectCompetence' => $hasProjectCompetence,
        ]);
    }
}
