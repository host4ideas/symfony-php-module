<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class Users
{
    /**
     * @var int
     *
     * @ORM\Column(name="codUser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $coduser;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=14, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=14, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=14, nullable=false)
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=320, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="passwd", type="string", length=400, nullable=false, options={"comment"="For admin, the password is admin', for users the pasword is: 'Password1234-'"})
     */
    private $passwd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="avatarURI", type="string", length=400, nullable=true, options={"default"="'./uploads/avatars/default/default_avatar.jpg'"})
     */
    private $avataruri = '\'./uploads/avatars/default/default_avatar.jpg\'';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="actionTime", type="datetime", nullable=true, options={"default"="current_timestamp()"})
     */
    private $actiontime = 'current_timestamp()';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activated", type="boolean", nullable=true, options={"comment"="TRUE is converted to 1 and FALSE is converted to 0"})
     */
    private $activated = '0';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Chats", inversedBy="coduser")
     * @ORM\JoinTable(name="participate",
     *   joinColumns={
     *     @ORM\JoinColumn(name="codUser", referencedColumnName="codUser")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="codChat", referencedColumnName="codChat")
     *   }
     * )
     */
    private $codchat;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codchat = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getCoduser(): ?int
    {
        return $this->coduser;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPasswd(): ?string
    {
        return $this->passwd;
    }

    public function setPasswd(string $passwd): self
    {
        $this->passwd = $passwd;

        return $this;
    }

    public function getAvataruri(): ?string
    {
        return $this->avataruri;
    }

    public function setAvataruri(?string $avataruri): self
    {
        $this->avataruri = $avataruri;

        return $this;
    }

    public function getActiontime(): ?\DateTimeInterface
    {
        return $this->actiontime;
    }

    public function setActiontime(?\DateTimeInterface $actiontime): self
    {
        $this->actiontime = $actiontime;

        return $this;
    }

    public function getActivated(): ?bool
    {
        return $this->activated;
    }

    public function setActivated(?bool $activated): self
    {
        $this->activated = $activated;

        return $this;
    }

    /**
     * @return Collection|Chats[]
     */
    public function getCodchat(): Collection
    {
        return $this->codchat;
    }

    public function addCodchat(Chats $codchat): self
    {
        if (!$this->codchat->contains($codchat)) {
            $this->codchat[] = $codchat;
        }

        return $this;
    }

    public function removeCodchat(Chats $codchat): self
    {
        $this->codchat->removeElement($codchat);

        return $this;
    }

}
