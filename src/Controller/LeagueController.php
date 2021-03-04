<?php

namespace App\Controller;

use App\Entity\League;
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
}
