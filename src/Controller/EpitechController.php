<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EpitechController extends AbstractController
{
    /**
     * @Route("/gameEpitech", name="epitechIndex")
     */
    public function swIndex(): Response
    {
        return $this->render('gameEpitech/indexEpitech.html.twig', [
            'controller_name' => 'EpitechController',
        ]);
    }
}
