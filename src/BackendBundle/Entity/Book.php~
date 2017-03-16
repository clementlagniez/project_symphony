<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\BookRepository")
 */
class Book
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
     * @var int
     *
     * @ORM\Column(name="nopages", type="integer", nullable=true)
     */
    private $nopages;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="released", type="date", nullable=true)
     */
    private $released;

    /**
     * @ORM\ManyToOne(targetEntity="Artist", inversedBy="books")
     */
    private $artist;


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
     * @return Book
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
     * Set nopages
     *
     * @param integer $nopages
     *
     * @return Book
     */
    public function setNopages($nopages)
    {
        $this->nopages = $nopages;

        return $this;
    }

    /**
     * Get nopages
     *
     * @return int
     */
    public function getNopages()
    {
        return $this->nopages;
    }

    /**
     * Set released
     *
     * @param \DateTime $released
     *
     * @return Book
     */
    public function setReleased($released)
    {
        $this->released = $released;

        return $this;
    }

    /**
     * Get released
     *
     * @return \DateTime
     */
    public function getReleased()
    {
        return $this->released;
    }

    /**
     * Set artist
     *
     * @param \BackendBundle\Entity\Artist $artist
     *
     * @return Book
     */
    public function setArtist(\BackendBundle\Entity\Artist $artist = null)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist
     *
     * @return \BackendBundle\Entity\Artist
     */
    public function getArtist()
    {
        return $this->artist;
    }
}
