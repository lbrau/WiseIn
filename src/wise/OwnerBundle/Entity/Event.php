<?php

namespace wise\OwnerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="wise\OwnerBundle\Repository\EventRepository")
 */
class Event
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
     * @ORM\ManyToOne(targetEntity="Bien", inversedBy="event", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $bien;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255)
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Event
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return Event
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Event
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bien = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add bien
     *
     * @param \wise\OwnerBundle\Entity\Bien $bien
     * @return Event
     */
    public function addBien(\wise\OwnerBundle\Entity\Bien $bien)
    {
        $this->bien[] = $bien;

        return $this;
    }

    /**
     * Remove bien
     *
     * @param \wise\OwnerBundle\Entity\Bien $bien
     */
    public function removeBien(\wise\OwnerBundle\Entity\Bien $bien)
    {
        $this->bien->removeElement($bien);
    }

    /**
     * Get bien
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBien()
    {
        return $this->bien;
    }
}
