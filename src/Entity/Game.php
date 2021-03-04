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
    private $id;

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

    /**
     * @ORM\Column(type="datetime")
     */
    private ?\DateTimeInterface $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=Player::class, inversedBy="gamesHome")
     */
    private $playerHome;

    /**
     * @ORM\ManyToOne(targetEntity=Player::class, inversedBy="gamesAway")
     */
    private $playerAway;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $round;

    /**
     * Game constructor.
     */
    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
    }

    public function __toString(): string
    {
        return $this->getPlayerHome()->getName() . ' - ' . $this->getPlayerAway()->getName();
    }

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPlayerHome(): ?Player
    {
        return $this->playerHome;
    }

    public function setPlayerHome(?Player $playerHome): self
    {
        $this->playerHome = $playerHome;

        return $this;
    }

    public function getPlayerAway(): ?Player
    {
        return $this->playerAway;
    }

    public function setPlayerAway(?Player $playerAway): self
    {
        $this->playerAway = $playerAway;

        return $this;
    }

    public function getRound(): ?int
    {
        return $this->round;
    }

    public function setRound(?int $round): self
    {
        $this->round = $round;

        return $this;
    }
}
