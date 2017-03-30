<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Track
 *
 * @ORM\Table(name="track")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\TrackRepository")
 */
class Track
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
     * @ORM\Column(name="number", type="string", length=255)
     */
    private $number;

    /**
     * @ORM\ManyToMany(targetEntity="Album", mappedBy="tracks")
     */
    private $albums;

    /**
     * @ORM\ManyToMany(targetEntity="Song", mappedBy="tracks")
     */
    private $songs;


    public function __toString(){

        return $this->number;
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
     * Set number
     *
     * @param string $number
     *
     * @return Track
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set albums
     *
     * @param \BackendBundle\Entity\Album $albums
     *
     * @return Track
     */
    public function setAlbums(\BackendBundle\Entity\Album $albums = null)
    {
        $this->albums = $albums;

        return $this;
    }

    /**
     * Get albums
     *
     * @return \BackendBundle\Entity\Album
     */
    public function getAlbums()
    {
        return $this->albums;
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
     * @return Track
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
     * Add song
     *
     * @param \BackendBundle\Entity\Song $song
     *
     * @return Track
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
