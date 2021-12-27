<?php

namespace App\Controller;

use App\serviceTest\testService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


//je vais surtout parler de service
// symfony possede des service qu'on peut retrouver grace a la commande: php bin/console autowiring
// dé quon a besoin d'une classe(service) 
// symfony analyse les constructeurs de class pour savoir quelles services passés
// on peut directement aussi l'appellé sur la methode sur laquelle on veut l'utilser...
// uniquement pour les methodes couplés a une routes (controller)
class Test2Controller extends AbstractController
{

    
    // On creer une variable proteger logger
    protected $logger;


    // on ajoute en au construct de la class une instance du service loggerInterface qui permet d'ecrire
    // des logs
    public function __construct(LoggerInterface $logger)
    {
        //tu sais comment fonctionne construct frero
        $this->logger =  $logger ;
    }

    #[Route('/test2', name: 'test2')]
    public function index(): Response
    {
        //la methode info permet de renvoyer un msg de log il ya ausssi debugqui fait un peut la mm chose
        // on peut aussi utiliser error() pour afficher les erreur


        $this->logger->info("message de log");
        return new Response("ecrire un message se fait grace au service loggerInterface ");
    }

//jai fais appel a la methode calcul du service testService qui ma donne une valeur que jai retourner
//grace au controller
//attention quand on appelle la classe directement dans la methode route (comme suis) on nutilise pas
// le this  

    /**
     * @Route("/test2/age", name="age")
     */
    public function age(testService $testService): Response
    {
        $monAge = $testService->age(2001);
        return new Response("Votre age : $monAge");
    }
}
