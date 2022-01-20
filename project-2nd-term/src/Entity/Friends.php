<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Friends
 *
 * @ORM\Table(name="friends", indexes={@ORM\Index(name="IDX_21EE7069BEC7436F", columns={"codUser"})})
 * @ORM\Entity
 */
class Friends
{
    /**
     * @var int
     *
     * @ORM\Column(name="codFriend", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codfriend;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFriend", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $datefriend = 'current_timestamp()';

    /**
     * @var \Users
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codUser", referencedColumnName="codUser")
     * })
     */
    private $coduser;

    public function getCodfriend(): ?int
    {
        return $this->codfriend;
    }

    public function getDatefriend(): ?\DateTimeInterface
    {
        return $this->datefriend;
    }

    public function setDatefriend(\DateTimeInterface $datefriend): self
    {
        $this->datefriend = $datefriend;

        return $this;
    }

    public function getCoduser(): ?Users
    {
        return $this->coduser;
    }

    public function setCoduser(?Users $coduser): self
    {
        $this->coduser = $coduser;

        return $this;
    }


}
