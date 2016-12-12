<?php

namespace wise\OwnerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Appartement
 *
 * @ORM\Table(name="appartement")
 * @ORM\Entity(repositoryClass="wise\OwnerBundle\Repository\AppartementRepository")
 */
class Appartement
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
     * @ORM\ManyToOne(targetEntity="Proprietaire", inversedBy="appartement", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $proprietaire;

    /**
     * @ORM\ManyToOne(targetEntity="Locataire", inversedBy="appartement", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $locataire;

    /**
     * @ORM\OneToOne(targetEntity="Bail", inversedBy="appartement", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $bail;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="residence", type="string", length=255)
     */
    private $residence;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer", nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo;


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
     * Set libelle
     *
     * @param string $libelle
     * @return Appartement
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return Appartement
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Appartement
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Appartement
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
     * Set photo
     *
     * @param string $photo
     * @return Appartement
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set proprietaire
     *
     * @param \wise\OwnerBundle\Entity\Proprietaire $proprietaire
     * @return Appartement
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
     * Set locataire
     *
     * @param \wise\OwnerBundle\Entity\Locataire $locataire
     * @return Appartement
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

    public function __toString()
    {
        return $this->getLibelle();
    }

    /**
     * Set bail
     *
     * @param \wise\OwnerBundle\Entity\Bail $bail
     * @return Appartement
     */
    public function setBail(\wise\OwnerBundle\Entity\Bail $bail = null)
    {
        $this->bail = $bail;

        return $this;
    }

    /**
     * Get bail
     *
     * @return \wise\OwnerBundle\Entity\Bail 
     */
    public function getBail()
    {
        return $this->bail;
    }

    /**
     * Set residence
     *
     * @param string $residence
     * @return Appartement
     */
    public function setResidence($residence)
    {
        $this->residence = $residence;

        return $this;
    }

    /**
     * Get residence
     *
     * @return string 
     */
    public function getResidence()
    {
        return $this->residence;
    }
}
