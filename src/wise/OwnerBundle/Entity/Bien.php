<?php

namespace wise\OwnerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Bien
 *
 * @ORM\Table(name="bien")
 * @ORM\Entity(repositoryClass="wise\OwnerBundle\Repository\BienRepository")
 */
class Bien
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
     * @ORM\OneToMany(targetEntity="Event", mappedBy="bien", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $event;

    /**
     * @ORM\OneToMany(targetEntity="DoYouKnow", mappedBy="bien", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $doyouknow;

    /**
     * @ORM\ManyToOne(targetEntity="Proprietaire", inversedBy="bien", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $proprietaire;

    /**
     * @ORM\OneToOne(targetEntity="Bail", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $bail;

    /**
     * @ORM\ManyToOne(targetEntity="Locataire", inversedBy="bien", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $locataire;

    /**
     * @ORM\OneToMany(targetEntity="Annonce", mappedBy="bien", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $annonce;

    /**
     * @ORM\OneToMany(targetEntity="Picture", mappedBy="bien", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="loyer", type="integer")
     */
    private $loyer;

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
     * Define the bail progress by calculating from date started and date ended.
     *
     * @var $bailDuration
     */
    private $bailDuration;


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
     * @return Bien
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
     * @return Bien
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
     * @return Bien
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
     * @return Bien
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
     * @return Bien
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
     * @return Bien
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
     * @return Bien
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
     * Set residence
     *
     * @param string $residence
     * @return Bien
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->annonce = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add annonce
     *
     * @param \wise\OwnerBundle\Entity\Annonce $annonce
     * @return Bien
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
     * Set loyer
     *
     * @param integer $loyer
     * @return Bien
     */
    public function setLoyer($loyer)
    {
        $this->loyer = $loyer;

        return $this;
    }

    /**
     * Get loyer
     *
     * @return integer
     */
    public function getLoyer()
    {
        return $this->loyer;
    }

    /**
     * Add bail
     *
     * @param \wise\OwnerBundle\Entity\Bail $bail
     * @return Bien
     */
    public function addBail(\wise\OwnerBundle\Entity\Bail $bail)
    {
        $this->bail[] = $bail;

        return $this;
    }

    /**
     * Remove bail
     *
     * @param \wise\OwnerBundle\Entity\Bail $bail
     */
    public function removeBail(\wise\OwnerBundle\Entity\Bail $bail)
    {
        $this->bail->removeElement($bail);
    }

    /**
     * Get bail
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBail()
    {
        return $this->bail;
    }

    /**
     * Add picture
     *
     * @param \wise\OwnerBundle\Entity\Picture $picture
     * @return Bien
     */
    public function addPicture(\wise\OwnerBundle\Entity\Picture $picture)
    {
        $this->picture[] = $picture;

        return $this;
    }

    /**
     * Remove picture
     *
     * @param \wise\OwnerBundle\Entity\Picture $picture
     */
    public function removePicture(\wise\OwnerBundle\Entity\Picture $picture)
    {
        $this->picture->removeElement($picture);
    }

    /**
     * Get picture
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPicture()
    {
        return $this->picture;
    }


    public function getBailDuration()
    {
        $fullBailDuration = $this->bail->getDateDebut()->diff($this->bail->getDateBailEnded());
        $timepastFromBailStarted = $this->bail->getDateDebut()->diff(new \DateTime('NOW'));
        $fullBailDurationInDays = intval($fullBailDuration->format('%a'));
        $timepastFromBailStartedInDays = intval($timepastFromBailStarted->format('%a'));

        $result = ($timepastFromBailStartedInDays * 100)/$fullBailDurationInDays;
        if (100 < $result) {
            $result = 100;
        }

        return round($result, 0, PHP_ROUND_HALF_UP);
    }

    /**
     * Set bail
     *
     * @param \wise\OwnerBundle\Entity\Bail $bail
     * @return Bien
     */
    public function setBail(\wise\OwnerBundle\Entity\Bail $bail = null)
    {
        $this->bail = $bail;

        return $this;
    }

    /**
     * Set event
     *
     * @param \wise\OwnerBundle\Entity\Event $event
     * @return Bien
     */
    public function setEvent(\wise\OwnerBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \wise\OwnerBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set doyouknow
     *
     * @param \wise\OwnerBundle\Entity\DoYouKnow $doyouknow
     * @return Bien
     */
    public function setDoyouknow(\wise\OwnerBundle\Entity\DoYouKnow $doyouknow = null)
    {
        $this->doyouknow = $doyouknow;

        return $this;
    }

    /**
     * Get doyouknow
     *
     * @return \wise\OwnerBundle\Entity\DoYouKnow 
     */
    public function getDoyouknow()
    {
        return $this->doyouknow;
    }

    /**
     * Add event
     *
     * @param \wise\OwnerBundle\Entity\Event $event
     * @return Bien
     */
    public function addEvent(\wise\OwnerBundle\Entity\Event $event)
    {
        $this->event[] = $event;

        return $this;
    }

    /**
     * Remove event
     *
     * @param \wise\OwnerBundle\Entity\Event $event
     */
    public function removeEvent(\wise\OwnerBundle\Entity\Event $event)
    {
        $this->event->removeElement($event);
    }

    /**
     * Add doyouknow
     *
     * @param \wise\OwnerBundle\Entity\DoYouKnow $doyouknow
     * @return Bien
     */
    public function addDoyouknow(\wise\OwnerBundle\Entity\DoYouKnow $doyouknow)
    {
        $this->doyouknow[] = $doyouknow;

        return $this;
    }

    /**
     * Remove doyouknow
     *
     * @param \wise\OwnerBundle\Entity\DoYouKnow $doyouknow
     */
    public function removeDoyouknow(\wise\OwnerBundle\Entity\DoYouKnow $doyouknow)
    {
        $this->doyouknow->removeElement($doyouknow);
    }
}
