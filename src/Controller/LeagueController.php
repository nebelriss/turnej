<?php

namespace App\Controller;

use App\Entity\League;
use App\Entity\Season;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LeagueController extends AbstractController
{
    /**
     * @Route("/league", name="leagues")
     */
    public function index(): Response
    {
        $leagues = $this->getUser()->getLeagues();

        return $this->render('league/index.html.twig', [
            'leagues' => $leagues
        ]);
    }

    /**
     * @Route("/league/{id}", name="league")
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        $league = $this
            ->getDoctrine()
            ->getRepository(League::class)
            ->findOneByIdAndUserId($id, $this->getUser()->getId());

        if (!$league) {
            throw $this->createNotFoundException();
        }

        return $this->render('league/show.html.twig', [
            'league' => $league
        ]);
    }

    /**
     * @Route("/league/{leagueId}/seasons/{seasonId}", name="show_season")
     * @param int $leagueId
     * @param int $seasonId
     * @return Response
     */
    public function showSeason(int $leagueId, int $seasonId): Response
    {
        $userId = $this->getUser()->getId();

        $season = $this
            ->getDoctrine()
            ->getRepository(Season::class)
            ->find($seasonId);

        return $this->render('league/show_season.html.twig', [
            'season' => $season
        ]);
    }
}
