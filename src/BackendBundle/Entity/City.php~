<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * City
 *
 * @ORM\Table(name="city")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\CityRepository")
 */
class City
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
     * @ORM\ManyToOne(targetEntity="State")
     */
    private $state;

    /**
     * @ORM\OneToMany(targetEntity="Artist", mappedBy="city")
     */
    private $artists;
    
    /**
     * @ORM\OneToMany(targetEntity="Band", mappedBy="city")
     */
    private $bands;

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
     * @return City
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
     * Set state
     *
     * @param \BackendBundle\Entity\State $state
     *
     * @return City
     */
    public function setState(\BackendBundle\Entity\State $state = null)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return \BackendBundle\Entity\State
     */
    public function getState()
    {
        return $this->state;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->artists = new \Doctrine\Common\Collections\ArrayCollection();
        $this->bands = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add artist
     *
     * @param \BackendBundle\Entity\Artist $artist
     *
     * @return City
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

    /**
     * Add band
     *
     * @param \BackendBundle\Entity\band $band
     *
     * @return City
     */
    public function addBand(\BackendBundle\Entity\band $band)
    {
        $this->bands[] = $band;

        return $this;
    }

    /**
     * Remove band
     *
     * @param \BackendBundle\Entity\band $band
     */
    public function removeBand(\BackendBundle\Entity\band $band)
    {
        $this->bands->removeElement($band);
    }

    /**
     * Get bands
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBands()
    {
        return $this->bands;
    }
}
