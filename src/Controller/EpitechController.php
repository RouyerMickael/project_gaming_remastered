<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class EpitechController extends AbstractController
{

    /**
     * @Route("/menuEpitech", name="menuEpitech")
     */
    public function epitechMenu(Request $request): Response
    {
        $params = array(
            "stepMenu" => $request->get('stepMenu'),
            "controls" => $request->get('controls'),
            "weapons" => $request->get('weapons')
        );
        
        switch($params['stepMenu']){
            case '1':
                $pathView = 'gameEpitech/menu/_menuControls.html.twig';
                break;
            case '2':
                $pathView = 'gameEpitech/menu/_menuWeapons.html.twig';
                break;
            case '3':
                $pathView = 'gameEpitech/menu/_menuReady.html.twig';
                break;
            default:
                $pathView = 'gameEpitech/menu/menuEpitech.html.twig';
        }
        return $this->render($pathView, [
            'controller_name' => 'EpitechController',
            'controls'=> $params['controls'],
            'weapons'=> $params['weapons']        
        ]);

    }
    
    /**
     * @Route("/gameEpitech", name="gameEpitech")
     */
    public function startGame(Request $request): Response
    {
        
        $params = array(
            "controls" => $request->get('controls'),
            "weapons" => $request->get('weapons')
        );


        return $this->render('gameEpitech/game/roomEpitech.html.twig', [
            'controller_name' => 'EpitechController',
            'controls'=> $params['controls'],
            'weapons'=> $params['weapons']
        ]);

    }
}
