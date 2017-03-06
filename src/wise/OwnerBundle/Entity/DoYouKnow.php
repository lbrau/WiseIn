<?php

namespace wise\OwnerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DoYouKnow
 *
 * @ORM\Table(name="do_you_know")
 * @ORM\Entity(repositoryClass="wise\OwnerBundle\Repository\DoYouKnowRepository")
 */
class DoYouKnow
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
     * @ORM\ManyToOne(targetEntity="Bien",inversedBy="doyouknow", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $bien;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=50)
     */
    private $author;

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
     * Set author
     *
     * @param string $author
     * @return DoYouKnow
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return DoYouKnow
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
     * @return DoYouKnow
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
     * Set bien
     *
     * @param \wise\OwnerBundle\Entity\Bien $bien
     * @return DoYouKnow
     */
    public function setBien(\wise\OwnerBundle\Entity\Bien $bien = null)
    {
        $this->bien = $bien;

        return $this;
    }

    /**
     * Get bien
     *
     * @return \wise\OwnerBundle\Entity\Bien 
     */
    public function getBien()
    {
        return $this->bien;
    }
}
