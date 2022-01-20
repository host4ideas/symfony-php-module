<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Chats
 *
 * @ORM\Table(name="chats")
 * @ORM\Entity
 */
class Chats
{
    /**
     * @var int
     *
     * @ORM\Column(name="codChat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codchat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="chatName", type="string", length=25, nullable=true, options={"default"="'Chat'"})
     */
    private $chatname = '\'Chat\'';

    /**
     * @var string
     *
     * @ORM\Column(name="chatImageURI", type="string", length=400, nullable=false, options={"default"="'./uploads/chatsImage/default_chat_image.png/chat1.png'"})
     */
    private $chatimageuri = '\'./uploads/chatsImage/default_chat_image.png/chat1.png\'';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Users", mappedBy="codchat")
     */
    private $coduser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->coduser = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getCodchat(): ?int
    {
        return $this->codchat;
    }

    public function getChatname(): ?string
    {
        return $this->chatname;
    }

    public function setChatname(?string $chatname): self
    {
        $this->chatname = $chatname;

        return $this;
    }

    public function getChatimageuri(): ?string
    {
        return $this->chatimageuri;
    }

    public function setChatimageuri(string $chatimageuri): self
    {
        $this->chatimageuri = $chatimageuri;

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getCoduser(): Collection
    {
        return $this->coduser;
    }

    public function addCoduser(Users $coduser): self
    {
        if (!$this->coduser->contains($coduser)) {
            $this->coduser[] = $coduser;
            $coduser->addCodchat($this);
        }

        return $this;
    }

    public function removeCoduser(Users $coduser): self
    {
        if ($this->coduser->removeElement($coduser)) {
            $coduser->removeCodchat($this);
        }

        return $this;
    }

}
