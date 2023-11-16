<?php

namespace App\Controller;

use App\Entity\Voiture;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class VoitureController extends AbstractController
{
    #[Route('/voiture', name: 'app_voiture')]
    public function index(): Response
    {
        return $this->render('voiture/index.html.twig', [
            'controller_name' => 'VoitureController',
        ]);
    }

    #[Route('/voiture/create', name: 'app_voiture_create')]
    public function createVoiture(EntityManagerInterface $entityManager): Response
    {
        $newVoiture = new Voiture;
        $newVoiture->setNom("Citroën");
        $newVoiture->setDescription("DS");
        $newVoiture->setPrix(29000);
        $date = new DateTime();
        $newVoiture->setDateCreaction($date);
        $entityManager->persist($newVoiture);
        $entityManager->flush($newVoiture);

        return new Response('upload ok');
    }
}
