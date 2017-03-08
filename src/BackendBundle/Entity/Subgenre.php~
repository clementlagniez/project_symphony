<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subgenre
 *
 * @ORM\Table(name="subgenre")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\SubgenreRepository")
 */
class Subgenre
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
     * @ORM\ManyToOne(targetEntity="Genre")
     */
    private $genre;


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
     * @return Subgenre
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
     * Set genre
     *
     * @param \BackendBundle\Entity\Genre $genre
     *
     * @return Subgenre
     */
    public function setGenre(\BackendBundle\Entity\Genre $genre = null)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return \BackendBundle\Entity\Genre
     */
    public function getGenre()
    {
        return $this->genre;
    }
}
