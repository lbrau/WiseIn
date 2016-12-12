<?php

namespace wise\OwnerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proprietaire
 *
 * @ORM\Table(name="proprietaire")
 * @ORM\Entity(repositoryClass="wise\OwnerBundle\Repository\ProprietaireRepository")
 */
class Proprietaire
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
     * @ORM\OneToMany(targetEntity="Appartement", mappedBy="proprietaire", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $appartement;

    /**
     * @ORM\OneToMany(targetEntity="Alerte", mappedBy="proprietaire", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    /*protected $alert;*/

    /**
     * @ORM\OneToMany(targetEntity="Annonce", mappedBy="proprietaire", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $annonce;

    /**
     * @ORM\OneToMany(targetEntity="Locataire", mappedBy="proprietaire", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $locataire;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=255)
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
     * @return Proprietaire
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
     * Set prenom
     *
     * @param string $prenom
     * @return Proprietaire
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set pseudo
     *
     * @param string $pseudo
     * @return Proprietaire
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
     * @return Proprietaire
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
     * @return Proprietaire
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
     * Constructor
     */
    public function __construct()
    {
        $this->appartement = new \Doctrine\Common\Collections\ArrayCollection();
        $this->annonce = new \Doctrine\Common\Collections\ArrayCollection();
        $this->locataire = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add appartement
     *
     * @param \wise\OwnerBundle\Entity\Appartement $appartement
     * @return Proprietaire
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

    /**
     * Add annonce
     *
     * @param \wise\OwnerBundle\Entity\Annonce $annonce
     * @return Proprietaire
     */
    public function addAnnonce(\wise\OwnerBundle\Entity\Annonce $annonce)
    {
        $this->annonce[] = $annonce;

        return $this;
    }

    /**
     * Remove annonce
     *
     * @param \wise\OwnerBundle\Entity\Annonce $annonce
     */
    public function removeAnnonce(\wise\OwnerBundle\Entity\Annonce $annonce)
    {
        $this->annonce->removeElement($annonce);
    }

    /**
     * Get annonce
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }

    /**
     * Add locataire
     *
     * @param \wise\OwnerBundle\Entity\Locataire $locataire
     * @return Proprietaire
     */
    public function addLocataire(\wise\OwnerBundle\Entity\Locataire $locataire)
    {
        $this->locataire[] = $locataire;

        return $this;
    }

    /**
     * Remove locataire
     *
     * @param \wise\OwnerBundle\Entity\Locataire $locataire
     */
    public function removeLocataire(\wise\OwnerBundle\Entity\Locataire $locataire)
    {
        $this->locataire->removeElement($locataire);
    }

    /**
     * Get locataire
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLocataire()
    {
        return $this->locataire;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getNom().' '.$this->getPrenom();
    }
}
