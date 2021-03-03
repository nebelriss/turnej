<?php

namespace App\Controller;

use App\Entity\Season;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SeasonsController
 * @package App\Controller
 */
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

    /**
     * @Route("/seasons/{id}", name="show_season")
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        $season = $this
            ->getDoctrine()
            ->getRepository(Season::class)
            ->findOneBy(['id' => $id]);

        return $this->render('seasons/show.html.twig', [
            'season' => $season
        ]);
    }
}
