<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Certifications;
use Doctrine\ORM\EntityManagerInterface;

class CertificationsController extends AbstractController
{
    #[Route('/certifications', name: 'app_certifications')]
    public function listCertifications(EntityManagerInterface $entityManager): Response
    {
        $certifications = $entityManager->getRepository(Certifications::class)->findAll();

        return $this->render('certifications/index.html.twig', [
            'certifications' => $certifications,
        ]);
    }
}
