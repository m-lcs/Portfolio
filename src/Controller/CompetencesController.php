<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Competences;
use App\Entity\Projets;
use App\Entity\Logiciels;
use App\Entity\LogicielsWin;
use Doctrine\ORM\EntityManagerInterface;

class CompetencesController extends AbstractController
{
    #[Route('/competences', name: 'app_competences')]
    public function listeContacts(EntityManagerInterface $entityManager): Response
    {
        $competences = $entityManager->getRepository(Competences::class)->findAll();
        $logiciels = $entityManager->getRepository(Logiciels::class)->findAll();
        $logicielsWin = $entityManager->getRepository(LogicielsWin::class)->findAll();

        return $this->render('competences/index.html.twig', [
            'competences' => $competences,
            'logiciels' => $logiciels,
            'logicielsWin' => $logicielsWin,
        ]);
    }

    #[Route('/competence-detail/{id}', name: 'app_competence-detail')]
    public function detailCompetence($id, EntityManagerInterface $entityManager): Response
    {
        $competence = $entityManager->getRepository(Competences::class)->find($id);

        if (!$competence) {
            throw $this->createNotFoundException('La compétence n\'existe pas');
        }

        $projets = $competence->getProjets();

        return $this->render('competences/detail.html.twig', [
            'competence' => $competence,
            'projets' => $projets,
        ]);
    }
}