<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Band
 *
 * @ORM\Table(name="band")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\BandRepository")
 */
class Band
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
     * @var string
     *
     * @ORM\Column(name="formed", type="string", length=255, nullable=true)
     */
    private $formed;

    /**
     * @ORM\ManyToOne(targetEntity="City")
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity="Album", mappedBy="band")
     */
    private $albums;

    /**
     * @ORM\ManyToMany(targetEntity="Artist", mappedBy="bands")
     * 
     */
    private $artists;

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
     * @return Band
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
     * Set formed
     *
     * @param string $formed
     *
     * @return Band
     */
    public function setFormed($formed)
    {
        $this->formed = $formed;

        return $this;
    }

    /**
     * Get formed
     *
     * @return string
     */
    public function getFormed()
    {
        return $this->formed;
    }

    /**
     * Set city
     *
     * @param \BackendBundle\Entity\City $city
     *
     * @return Band
     */
    public function setCity(\BackendBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \BackendBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->albums = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add album
     *
     * @param \BackendBundle\Entity\Album $album
     *
     * @return Band
     */
    public function addAlbum(\BackendBundle\Entity\Album $album)
    {
        $this->albums[] = $album;

        return $this;
    }

    /**
     * Remove album
     *
     * @param \BackendBundle\Entity\Album $album
     */
    public function removeAlbum(\BackendBundle\Entity\Album $album)
    {
        $this->albums->removeElement($album);
    }

    /**
     * Get albums
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAlbums()
    {
        return $this->albums;
    }

    /**
     * Add artist
     *
     * @param \BackendBundle\Entity\Artist $artist
     *
     * @return Band
     */
    public function addArtist(\BackendBundle\Entity\Artist $artist)
    {
        $this->artists[] = $artist;

        return $this;
    }

    /**
     * Remove artist
     *
     * @param \BackendBundle\Entity\Artist $artist
     */
    public function removeArtist(\BackendBundle\Entity\Artist $artist)
    {
        $this->artists->removeElement($artist);
    }

    /**
     * Get artists
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArtists()
    {
        return $this->artists;
    }
}
