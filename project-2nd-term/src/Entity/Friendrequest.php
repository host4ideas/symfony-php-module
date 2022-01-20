<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Friendrequest
 *
 * @ORM\Table(name="friendrequest", indexes={@ORM\Index(name="fk_friendRequest_chats_codChat", columns={"codChat"}), @ORM\Index(name="fk_friendRequest_users_codUser", columns={"codUser"})})
 * @ORM\Entity
 */
class Friendrequest
{
    /**
     * @var int
     *
     * @ORM\Column(name="codFr", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codfr;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSend", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $datesend = 'current_timestamp()';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="accepted", type="boolean", nullable=true)
     */
    private $accepted = '0';

    /**
     * @var \Chats
     *
     * @ORM\ManyToOne(targetEntity="Chats")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codChat", referencedColumnName="codChat")
     * })
     */
    private $codchat;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codUser", referencedColumnName="codUser")
     * })
     */
    private $coduser;

    public function getCodfr(): ?int
    {
        return $this->codfr;
    }

    public function getDatesend(): ?\DateTimeInterface
    {
        return $this->datesend;
    }

    public function setDatesend(\DateTimeInterface $datesend): self
    {
        $this->datesend = $datesend;

        return $this;
    }

    public function getAccepted(): ?bool
    {
        return $this->accepted;
    }

    public function setAccepted(?bool $accepted): self
    {
        $this->accepted = $accepted;

        return $this;
    }

    public function getCodchat(): ?Chats
    {
        return $this->codchat;
    }

    public function setCodchat(?Chats $codchat): self
    {
        $this->codchat = $codchat;

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
