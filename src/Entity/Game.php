<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GameRepository::class)
 */
class Game
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $PlayerHomeGoals;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $PlayerAwayGoals;

    /**
     * @ORM\ManyToOne(targetEntity=Season::class, inversedBy="games")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Season $season;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayerHomeGoals(): ?int
    {
        return $this->PlayerHomeGoals;
    }

    public function setPlayerHomeGoals(?int $PlayerHomeGoals): self
    {
        $this->PlayerHomeGoals = $PlayerHomeGoals;

        return $this;
    }

    public function getPlayerAwayGoals(): ?int
    {
        return $this->PlayerAwayGoals;
    }

    public function setPlayerAwayGoals(?int $PlayerAwayGoals): self
    {
        $this->PlayerAwayGoals = $PlayerAwayGoals;

        return $this;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function setSeason(?Season $season): self
    {
        $this->season = $season;

        return $this;
    }
}
