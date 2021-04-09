<?php

namespace App\Controller;

use App\Entity\League;
use App\Entity\Player;
use App\Entity\Season;
use App\Entity\User;
use App\Form\LeagueType;
use App\Form\PlayerType;
use App\Form\SeasonType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class LeagueController
 * @package App\Controller
 * @Route("/league")
 */
class LeagueController extends AbstractController
{
    /**
     * @Route("/", name="leagues")
     */
    public function index(): Response
    {
        $leagues = $this->getUser()->getLeagues();

        return $this->render('league/index.html.twig', [
            'leagues' => $leagues
        ]);
    }

    /**
     * @Route("/create", name="league-new")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $league = new League();

        $form = $this->createForm(LeagueType::class, $league);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $league = $form->getData();

            $this->getUser()->addLeague($league);

            $em = $this->getDoctrine()->getManager();
            $em->persist($league);
            $em->flush();

            return $this->redirectToRoute('leagues');
        }

        return $this->render('league/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="league-show")
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
     * @Route("/{id}/players/create", name="player-new")
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function newPlayer(int $id, Request $request): Response
    {
        $league = $this
            ->getDoctrine()
            ->getRepository(League::class)
            ->findOneByIdAndUserId($id, $this->getUser()->getId());

        $player = new Player();

        $form = $this->createForm(PlayerType::class, $player);
        $form ->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $player = $form->getData();
            $league->addPlayer($player);

            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();

            return $this->redirectToRoute('leagues');
        }

        return $this->render('player/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/create", name="season-new")
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function newSeason(int $id, Request $request): Response
    {
        $league = $this
            ->getDoctrine()
            ->getRepository(League::class)
            ->findOneByIdAndUserId($id, $this->getUser()->getId());

       $season = new Season();

       $form = $this->createForm(SeasonType::class, $season);
       $form->handleRequest($request);
       if ($form->isSubmitted() && $form->isValid()) {
           $season = $form->getData();

           $league->addSeason($season);

           // create games

           $em = $this->getDoctrine()->getManager();
           $em->persist($season);
           $em->flush();

           return $this->redirectToRoute('league', ['id' => $id]);
       }

       return $this->render('season/new.html.twig', [
           'form' => $form->createView()
       ]);
    }

    /**
     * @Route("/{leagueId}/seasons/{seasonId}", name="season-show")
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

        return $this->render('season/show.html.twig', [
            'season' => $season
        ]);
    }
}
