<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeasonsController extends AbstractController
{
    /**
     * @Route("/seasons", name="seasons")
     */
    public function index(): Response
    {
        $seasons = $this->getUser()->getSeasons();
        return $this->render('seasons/index.html.twig', [
            'seasons' => $seasons,
        ]);
    }
}
