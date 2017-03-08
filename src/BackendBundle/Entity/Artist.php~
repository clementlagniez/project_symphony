<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artist
 *
 * @ORM\Table(name="artist")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\ArtistRepository")
 */
class Artist
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
     * @ORM\Column(name="known_as", type="string", length=255, nullable=true)
     */
    private $knownAs;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birth", type="date", nullable=true)
     */
    private $birth;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="death", type="date", nullable=true)
     */
    private $death;

    /**
     * @ORM\ManyToOne(targetEntity="City")
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity="Book", mappedBy="artist")
     */
    private $books;

    /**
     * @ORM\ManyToMany(targetEntity="Band", inversedBy="artists")
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
     * @return Artist
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
     * Set knownAs
     *
     * @param string $knownAs
     *
     * @return Artist
     */
    public function setKnownAs($knownAs)
    {
        $this->knownAs = $knownAs;

        return $this;
    }

    /**
     * Get knownAs
     *
     * @return string
     */
    public function getKnownAs()
    {
        return $this->knownAs;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Artist
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set birth
     *
     * @param \DateTime $birth
     *
     * @return Artist
     */
    public function setBirth($birth)
    {
        $this->birth = $birth;

        return $this;
    }

    /**
     * Get birth
     *
     * @return \DateTime
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * Set death
     *
     * @param \DateTime $death
     *
     * @return Artist
     */
    public function setDeath($death)
    {
        $this->death = $death;

        return $this;
    }

    /**
     * Get death
     *
     * @return \DateTime
     */
    public function getDeath()
    {
        return $this->death;
    }

    /**
     * Set city
     *
     * @param \BackendBundle\Entity\City $city
     *
     * @return Artist
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
     * @return Artist
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
     * Add book
     *
     * @param \BackendBundle\Entity\Book $book
     *
     * @return Artist
     */
    public function addBook(\BackendBundle\Entity\Book $book)
    {
        $this->books[] = $book;

        return $this;
    }

    /**
     * Remove book
     *
     * @param \BackendBundle\Entity\Book $book
     */
    public function removeBook(\BackendBundle\Entity\Book $book)
    {
        $this->books->removeElement($book);
    }

    /**
     * Get books
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * Add band
     *
     * @param \BackendBundle\Entity\Band $band
     *
     * @return Artist
     */
    public function addBand(\BackendBundle\Entity\Band $band)
    {
        $this->bands[] = $band;

        return $this;
    }

    /**
     * Remove band
     *
     * @param \BackendBundle\Entity\Band $band
     */
    public function removeBand(\BackendBundle\Entity\Band $band)
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
