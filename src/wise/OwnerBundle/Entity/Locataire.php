<?php

namespace wise\OwnerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Locataire
 *
 * @ORM\Table(name="locataire")
 * @ORM\Entity(repositoryClass="wise\OwnerBundle\Repository\LocataireRepository")
 */
class Locataire
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
     * @ORM\ManyToOne(targetEntity="Proprietaire", inversedBy="locataire", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $proprietaire;

    /**
     * @ORM\OneToMany(targetEntity="Appartement", mappedBy="locataire", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $appartement;


    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=255, unique=true)
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=true)
     */
    private $enabled;


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
     * Set nom
     *
     * @param string $nom
     * @return Locataire
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set pseudo
     *
     * @param string $pseudo
     * @return Locataire
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string 
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Locataire
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Locataire
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
     * Set proprietaire
     *
     * @param \wise\OwnerBundle\Entity\Proprietaire $proprietaire
     * @return Locataire
     */
    public function setProprietaire(\wise\OwnerBundle\Entity\Proprietaire $proprietaire)
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
     * Constructor
     */
    public function __construct()
    {
        $this->appartement = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add appartement
     *
     * @param \wise\OwnerBundle\Entity\Appartement $appartement
     * @return Locataire
     */
    public function addAppartement(\wise\OwnerBundle\Entity\Appartement $appartement)
    {
        $this->appartement[] = $appartement;

        return $this;
    }

    /**
     * Remove appartement
     *
     * @param \wise\OwnerBundle\Entity\Appartement $appartement
     */
    public function removeAppartement(\wise\OwnerBundle\Entity\Appartement $appartement)
    {
        $this->appartement->removeElement($appartement);
    }

    /**
     * Get appartement
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAppartement()
    {
        return $this->appartement;
    }
}
