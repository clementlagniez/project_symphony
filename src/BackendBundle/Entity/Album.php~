<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Album
 *
 * @ORM\Table(name="album")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\AlbumRepository")
 */
class Album
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
     * @ORM\Column(name="duration", type="string", length=255, nullable=true)
     */
    private $duration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="released", type="date", nullable=true)
     */
    private $released;

    /**
     * @ORM\ManyToOne(targetEntity="Band", inversedBy="albums")
     */
    private $band;

    /**
     * @ORM\ManyToMany(targetEntity="Track", inversedBy="albums")
     */
    private $tracks;

    /**
     * @ORM\ManyToMany(targetEntity="Song", mappedBy="albums")
     */
    private $songs;


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
     * @return Album
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
     * Set duration
     *
     * @param string $duration
     *
     * @return Album
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set released
     *
     * @param \DateTime $released
     *
     * @return Album
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
     * @return Album
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

    /**
     * Set band
     *
     * @param \BackendBundle\Entity\Band $band
     *
     * @return Album
     */
    public function setBand(\BackendBundle\Entity\Band $band = null)
    {
        $this->band = $band;

        return $this;
    }

    /**
     * Get band
     *
     * @return \BackendBundle\Entity\Band
     */
    public function getBand()
    {
        return $this->band;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tracks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->songs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add track
     *
     * @param \BackendBundle\Entity\Track $track
     *
     * @return Album
     */
    public function addTrack(\BackendBundle\Entity\Track $track)
    {
        $this->tracks[] = $track;

        return $this;
    }

    /**
     * Remove track
     *
     * @param \BackendBundle\Entity\Track $track
     */
    public function removeTrack(\BackendBundle\Entity\Track $track)
    {
        $this->tracks->removeElement($track);
    }

    /**
     * Get tracks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTracks()
    {
        return $this->tracks;
    }

    /**
     * Add song
     *
     * @param \BackendBundle\Entity\Song $song
     *
     * @return Album
     */
    public function addSong(\BackendBundle\Entity\Song $song)
    {
        $this->songs[] = $song;

        return $this;
    }

    /**
     * Remove song
     *
     * @param \BackendBundle\Entity\Song $song
     */
    public function removeSong(\BackendBundle\Entity\Song $song)
    {
        $this->songs->removeElement($song);
    }

    /**
     * Get songs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSongs()
    {
        return $this->songs;
    }
}
