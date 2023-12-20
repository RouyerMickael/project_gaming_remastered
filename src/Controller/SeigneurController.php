<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeigneurController extends AbstractController
{
    /**
     * @Route("/gameSeigneur", name="seigneurIndex")
     */
    public function seigneurIndex(): Response
    {
        return $this->render('gameSeigneur/indexSeigneur.html.twig', [
            'controller_name' => 'SeigneurController',
        ]);
    }
}
