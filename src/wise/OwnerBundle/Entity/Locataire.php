<?php

namespace wise\OwnerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * Locataire
 *
 * @ORM\Table(name="locataire")
 * @ORM\Entity(repositoryClass="wise\OwnerBundle\Repository\LocataireRepository")
 */
class Locataire extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")w
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Proprietaire", inversedBy="locataire", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $proprietaire;

    /**
     * @ORM\OneToMany(targetEntity="DemandeIntervention", mappedBy="locataire", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $demandeIntervention;

    /**
     * @ORM\OneToMany(targetEntity="Demande", mappedBy="locataire", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $demande;

    /**
     * @ORM\OneToMany(targetEntity="Bien", mappedBy="locataire", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $bien;


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
        parent::__construct();
        $this->bien = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pseudo = "pseudo";
    }

    /**
     * Add bien
     *
     * @param \wise\OwnerBundle\Entity\Bien $bien
     * @return Locataire
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

    public function __toString()
    {
        return $this->getNom().' '.$this->getPseudo();
    }

    /**
     * Add demandeIntervention
     *
     * @param \wise\OwnerBundle\Entity\DemandeIntervention $demandeIntervention
     * @return Locataire
     */
    public function addDemandeIntervention(\wise\OwnerBundle\Entity\DemandeIntervention $demandeIntervention)
    {
        $this->demandeIntervention[] = $demandeIntervention;

        return $this;
    }

    /**
     * Remove demandeIntervention
     *
     * @param \wise\OwnerBundle\Entity\DemandeIntervention $demandeIntervention
     */
    public function removeDemandeIntervention(\wise\OwnerBundle\Entity\DemandeIntervention $demandeIntervention)
    {
        $this->demandeIntervention->removeElement($demandeIntervention);
    }

    /**
     * Get demandeIntervention
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDemandeIntervention()
    {
        return $this->demandeIntervention;
    }

    /**
     * Add demande
     *
     * @param \wise\OwnerBundle\Entity\Demande $demande
     * @return Locataire
     */
    public function addDemande(\wise\OwnerBundle\Entity\Demande $demande)
    {
        $this->demande[] = $demande;

        return $this;
    }

    /**
     * Remove demande
     *
     * @param \wise\OwnerBundle\Entity\Demande $demande
     */
    public function removeDemande(\wise\OwnerBundle\Entity\Demande $demande)
    {
        $this->demande->removeElement($demande);
    }

    /**
     * Get demande
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDemande()
    {
        return $this->demande;
    }
}
