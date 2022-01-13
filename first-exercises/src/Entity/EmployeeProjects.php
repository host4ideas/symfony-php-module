<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmployeeProjects
 *
 * @ORM\Table(name="employee_projects", indexes={@ORM\Index(name="empleado", columns={"employee", "project"}), @ORM\Index(name="proyecto", columns={"project"}), @ORM\Index(name="IDX_CCACE2635D9F75A1", columns={"employee"})})
 * @ORM\Entity
 */
class EmployeeProjects
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
     * @var \Project
     *
     * @ORM\ManyToOne(targetEntity="Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project", referencedColumnName="id")
     * })
     */
    private $project;

    /**
     * @var \Employee
     *
     * @ORM\ManyToOne(targetEntity="Employee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="employee", referencedColumnName="id")
     * })
     */
    private $employee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    public function setEmployee(?Employee $employee): self
    {
        $this->employee = $employee;

        return $this;
    }


}
