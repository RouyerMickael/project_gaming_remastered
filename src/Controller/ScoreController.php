<?php

namespace App\Controller;

use App\Repository\GameRepository;
use App\Repository\ScoreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScoreController extends AbstractController
{
    /**
     * @Route("/scores", name="scoresMenu")
     */
    public function scoreMenu(GameRepository $gameRepo): Response
    {
        $games = $gameRepo->findAll();
        return $this->render('scores/scoreBoard.html.twig', [
            'controller_name' => 'ScoreController',
            'games' => $games
        ]);
    }

    /**
     * @Route("/getScores", name="getScores")
     */
    public function getScores(Request $request, GameRepository $gameRepo, ScoreRepository $scoreRepo): Response
    {
        $gameId = $request->get('gameIdChoosed');
        $game = $gameRepo->find($gameId);
        $scores = $scoreRepo->findBy(array("game"=>$gameId),array("points"=>"desc"));
        return $this->render('scores/_tableScores.html.twig', [
            'controller_name' => 'ScoreController',
            'scores' => $scores,
            'game' => $game
        ]);
    }

}
