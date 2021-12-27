<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Test6Controller extends AbstractController
{
    #[Route('/test6', name: 'test6')]
    public function index(): Response
    {
        return $this->render('test6/index.html.twig', [
            'controller_name' => 'Test6Controller',
        ]);
    }
}
