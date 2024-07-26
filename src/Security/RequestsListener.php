<?php

namespace App\Security;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

//permet d'ajouter un comportement à chaque nouvelle requete de l'utilisateur au serveur
//(par exemple mettre à jour la date de dernière activité d'une session)
//pour l'activer, ajoutez "implements EventSubscriberInterface" après 'class RequestsListener'

class RequestsListener
{

    // private $tokenStorage;

    // public function __construct(TokenStorageInterface $tokenStorage)
    // {
    //     $this->tokenStorage = $tokenStorage;
    // }

    // public static function getSubscribedEvents()
    // {
    //     // return the subscribed events, their methods and priorities
    //     return [
    //         KernelEvents::RESPONSE => [
    //             ['checkSession', 0],
    //         ],
    //     ];
    // }

    // public function checkSession(ResponseEvent $event)
    // {
    //     $session = $event->getRequest()->getSession();
    //     if ($session->isStarted() && $this->tokenStorage->getToken()) {
    //         $userConnected = $this->tokenStorage->getToken()->getUser();
    //         if($userConnected!="anon."){
    //             // echo "COUCOU";
    //         }
    //     }
    // }
}