<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Event\LogoutEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

//permet d'ajouter un comportement personnalisé à la déconnexion (déconnexions désirées)
//(penser à décommenter App\Security\LogoutCustomListener dans services.yaml au préalable)

class LogoutCustomListener
{
    public function onSymfonyComponentSecurityHttpEventLogoutEvent(LogoutEvent $logout)
    {
        // // You get the exception object from the received logout
        // $exception = $logout->getResponse();

        // // Customize your response object to display the exception details
        // $response = new Response();
        // $response->setContent("logout custom!");

        // // HttpExceptionInterface is a special type of exception that
        // // holds status code and header details
        // if ($exception instanceof HttpExceptionInterface) {
        //     $response->setStatusCode($exception->getStatusCode());
        //     $response->headers->replace($exception->getHeaders());
        // } else {
        //     $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        // }

        // // sends the modified response object to the logout
        // $logout->setResponse($response);
    }
}