<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HompageController extends AbstractController
{
    /**
     * @Route("/home", name="dashboard")
     */
    public function index(): Response
    {
        return $this->render('hompage/index.html.twig', [
            'controller_name' => 'HompageController',
        ]);
    }
}
