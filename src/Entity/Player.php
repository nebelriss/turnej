<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PlayerRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlayerRepository::class)
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"}
 *     )
 */
class Player
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?DateTimeInterface $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=League::class, inversedBy="players")
     */
    private $league;

    /**
     * @ORM\OneToMany(targetEntity=Game::class, mappedBy="playerHome")
     */
    private $gamesHome;

    /**
     * @ORM\OneToMany(targetEntity=Game::class, mappedBy="playerAway")
     */
    private $gamesAway;

    /**
     * Player constructor.
     */
    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
        $this->gamesHome = new ArrayCollection();
        $this->gamesAway = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getLeague(): ?League
    {
        return $this->league;
    }

    public function setLeague(?League $league): self
    {
        $this->league = $league;

        return $this;
    }

    /**
     * @return ArrayCollection|Game[]
     */
    public function getGames(): ArrayCollection
    {
        return new ArrayCollection(
            array_merge($this->getGamesHome()->toArray(), $this->getGamesAway()->toArray())
        );
    }

    /**
     * @return Collection|Game[]
     */
    public function getGamesHome(): Collection
    {
        return $this->gamesHome;
    }

    public function addGamesHome(Game $gamesHome): self
    {
        if (!$this->gamesHome->contains($gamesHome)) {
            $this->gamesHome[] = $gamesHome;
            $gamesHome->setPlayerHome($this);
        }

        return $this;
    }

    public function removeGamesHome(Game $gamesHome): self
    {
        if ($this->gamesHome->removeElement($gamesHome)) {
            // set the owning side to null (unless already changed)
            if ($gamesHome->getPlayerHome() === $this) {
                $gamesHome->setPlayerHome(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Game[]
     */
    public function getGamesAway(): Collection
    {
        return $this->gamesAway;
    }

    public function addGamesAway(Game $gamesAway): self
    {
        if (!$this->gamesAway->contains($gamesAway)) {
            $this->gamesAway[] = $gamesAway;
            $gamesAway->setPlayerAway($this);
        }

        return $this;
    }

    public function removeGamesAway(Game $gamesAway): self
    {
        if ($this->gamesAway->removeElement($gamesAway)) {
            // set the owning side to null (unless already changed)
            if ($gamesAway->getPlayerAway() === $this) {
                $gamesAway->setPlayerAway(null);
            }
        }

        return $this;
    }
}
