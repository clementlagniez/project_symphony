<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genre
 *
 * @ORM\Table(name="genre")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\GenreRepository")
 */
class Genre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Subgenre", mappedBy="genre")
     */
    private $subgenres;

    public function __toString(){

        return $this->name;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Genre
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subgenres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add subgenre
     *
     * @param \BackendBundle\Entity\Subgenre $subgenre
     *
     * @return Genre
     */
    public function addSubgenre(\BackendBundle\Entity\Subgenre $subgenre)
    {
        $this->subgenres[] = $subgenre;

        return $this;
    }

    /**
     * Remove subgenre
     *
     * @param \BackendBundle\Entity\Subgenre $subgenre
     */
    public function removeSubgenre(\BackendBundle\Entity\Subgenre $subgenre)
    {
        $this->subgenres->removeElement($subgenre);
    }

    /**
     * Get subgenres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubgenres()
    {
        return $this->subgenres;
    }
}
