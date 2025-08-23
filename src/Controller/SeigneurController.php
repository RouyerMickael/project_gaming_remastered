<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class SeigneurController extends AbstractController
{
    /**
     * @Route("/menuSeigneur", name="menuSeigneur")
     */
    public function seigneurMenu(Request $request): Response
    {
        $params = array(
            "stepMenu" => $request->get('stepMenu'),
            "controls" => $request->get('controls'),
            "weapons" => $request->get('weapons')
        );
        
        switch($params['stepMenu']){
            case '1':
                $pathView = 'gameSeigneur/menu/_menuControls.html.twig';
                break;
            case '2':
                $pathView = 'gameSeigneur/menu/_menuWeapons.html.twig';
                break;
            case '3':
                $pathView = 'gameSeigneur/menu/_menuReady.html.twig';
                break;
            default:
                $pathView = 'gameSeigneur/menu/menuSeigneur.html.twig';
        }
        return $this->render($pathView, [
            'controller_name' => 'SeigneurController',
            'controls'=> $params['controls'],
            'weapons'=> $params['weapons']        
        ]);

    }


    /**
     * @Route("/gameSeigneur", name="gameSeigneur")
     */
    public function startGame(Request $request): Response
    {
        
        $params = array(
            "controls" => $request->get('controls'),
            "weapons" => $request->get('weapons')
        );


        return $this->render('gameSeigneur/game/gameSeigneur.html.twig', [
            'controller_name' => 'SeigneurController',
            'controls'=> $params['controls'],
            'weapons'=> $params['weapons']
        ]);

    }


}
