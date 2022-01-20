<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matches
 *
 * @ORM\Table(name="matches", indexes={@ORM\Index(name="local", columns={"local"}), @ORM\Index(name="visitante", columns={"visitor"})})
 * @ORM\Entity
 */
class Matches
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="goals_local", type="integer", nullable=false)
     */
    private $goalsLocal;

    /**
     * @var int
     *
     * @ORM\Column(name="goals_visitor", type="integer", nullable=false)
     */
    private $goalsVisitor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var \Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="local", referencedColumnName="id")
     * })
     */
    private $local;

    /**
     * @var \Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="visitor", referencedColumnName="id")
     * })
     */
    private $visitor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGoalsLocal(): ?int
    {
        return $this->goalsLocal;
    }

    public function setGoalsLocal(int $goalsLocal): self
    {
        $this->goalsLocal = $goalsLocal;

        return $this;
    }

    public function getGoalsVisitor(): ?int
    {
        return $this->goalsVisitor;
    }

    public function setGoalsVisitor(int $goalsVisitor): self
    {
        $this->goalsVisitor = $goalsVisitor;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLocal(): ?Team
    {
        return $this->local;
    }

    public function setLocal(?Team $local): self
    {
        $this->local = $local;

        return $this;
    }

    public function getVisitor(): ?Team
    {
        return $this->visitor;
    }

    public function setVisitor(?Team $visitor): self
    {
        $this->visitor = $visitor;

        return $this;
    }


}
