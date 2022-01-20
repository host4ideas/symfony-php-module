<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message", indexes={@ORM\Index(name="fk_message_chats_codChat", columns={"codChat"}), @ORM\Index(name="fk_message_users_codUser", columns={"codUser"})})
 * @ORM\Entity
 */
class Message
{
    /**
     * @var int
     *
     * @ORM\Column(name="codMg", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codmg;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSend", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $datesend = 'current_timestamp()';

    /**
     * @var string|null
     *
     * @ORM\Column(name="fileUri", type="string", length=400, nullable=true, options={"default"="NULL"})
     */
    private $fileuri = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="textMessage", type="string", length=400, nullable=true, options={"default"="NULL"})
     */
    private $textmessage = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=14, nullable=false)
     */
    private $alias;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codUser", referencedColumnName="codUser")
     * })
     */
    private $coduser;

    /**
     * @var \Chats
     *
     * @ORM\ManyToOne(targetEntity="Chats")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codChat", referencedColumnName="codChat")
     * })
     */
    private $codchat;

    public function getCodmg(): ?int
    {
        return $this->codmg;
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

    public function getFileuri(): ?string
    {
        return $this->fileuri;
    }

    public function setFileuri(?string $fileuri): self
    {
        $this->fileuri = $fileuri;

        return $this;
    }

    public function getTextmessage(): ?string
    {
        return $this->textmessage;
    }

    public function setTextmessage(?string $textmessage): self
    {
        $this->textmessage = $textmessage;

        return $this;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(string $alias): self
    {
        $this->alias = $alias;

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

    public function getCodchat(): ?Chats
    {
        return $this->codchat;
    }

    public function setCodchat(?Chats $codchat): self
    {
        $this->codchat = $codchat;

        return $this;
    }


}
