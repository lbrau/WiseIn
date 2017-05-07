<?php

namespace wise\OwnerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="wise\OwnerBundle\Repository\MessageRepository")
 */
class Message
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
     * @ORM\ManyToOne(targetEntity="Proprietaire", inversedBy="messages", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $proprietaire;

    /**
     * @ORM\ManyToOne(targetEntity="Locataire", inversedBy="messages", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $locataire;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", nullable=true)
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string")
     */
    private $auteur;
    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     * @var int
     *
     * @ORM\Column(name="flag", type="integer", nullable=true)
     */
    private $flag;


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
     * Set contenu
     *
     * @param string $contenu
     * @return Message
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Message
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
     * Set enabled
     *
     * @param boolean $enabled
     * @return Message
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set flag
     *
     * @param integer $flag
     * @return Message
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;

        return $this;
    }

    /**
     * Get flag
     *
     * @return integer 
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     * @return Message
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set proprietaire
     *
     * @param \wise\OwnerBundle\Entity\Proprietaire $proprietaire
     * @return Message
     */
    public function setProprietaire(\wise\OwnerBundle\Entity\Proprietaire $proprietaire = null)
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    /**
     * Get proprietaire
     *
     * @return \wise\OwnerBundle\Entity\Proprietaire 
     */
    public function getProprietaire()
    {
        return $this->proprietaire;
    }

    /**
     * Set locataire
     *
     * @param \wise\OwnerBundle\Entity\Locataire $locataire
     * @return Message
     */
    public function setLocataire(\wise\OwnerBundle\Entity\Locataire $locataire = null)
    {
        $this->locataire = $locataire;

        return $this;
    }

    /**
     * Get locataire
     *
     * @return \wise\OwnerBundle\Entity\Locataire 
     */
    public function getLocataire()
    {
        return $this->locataire;
    }
}
