<?php

namespace wise\OwnerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bail
 *
 * @ORM\Table(name="bail")
 * @ORM\Entity(repositoryClass="wise\OwnerBundle\Repository\BailRepository")
 */
class Bail
{
    const LOCATION_VIDE   = 0;
    const LOCATION_MEUBLE = 1;
    const AUTRE_TYPE      = 2;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Integer
     *
     * @ORM\Column(name="loyer", type="integer", nullable=true)
     */
    private $loyer;

    /**
     * @var \bool
     *
     * @ORM\Column(name="meuble", type="boolean", nullable=false)
     */
    private $meuble;

    /**
     * @var \integer
     *
     * @ORM\Column(name="caution_value", type="integer", nullable=false)
     */
    private $cautionValue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="datetime", nullable=true)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin_bail", type="datetime", nullable=true)
     */
    private $dateBailEnded;

    /**
     * @var integer
     *
     * @ORM\Column(name="bail_type", type="integer", nullable=false)
     */
    private $type;

    /**
     * @var bool
     *
     * @ORM\Column(name="actif", type="boolean")
     */
    private $actif;

    public function __construct()
    {
        $this->setDateBailEnded(1);
    }

    public function setDateBailEnded($number)
    {
        $dateToIncrement = clone $this->dateDebut;
        $this->dateBailEnded = $dateToIncrement->add(new \DateInterval('P'.$number."Y"));
    }

    public function getDateBailEnded()
    {
        return $this->dateBailEnded;
    }

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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     * @return Bail
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime 
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     * @return Bail
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return boolean 
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set loyer
     *
     * @param integer $loyer
     * @return Bail
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
     * Set meuble
     *
     * @param boolean $meuble
     * @return Bail
     */
    public function setMeuble($meuble)
    {
        $this->meuble = $meuble;

        return $this;
    }

    /**
     * Get meuble
     *
     * @return boolean 
     */
    public function getMeuble()
    {
        return $this->meuble;
    }

    /**
     * Set cautionValue
     *
     * @param integer $cautionValue
     * @return Bail
     */
    public function setCautionValue($cautionValue)
    {
        $this->cautionValue = $cautionValue;

        return $this;
    }

    /**
     * Get cautionValue
     *
     * @return integer 
     */
    public function getCautionValue()
    {
        return $this->cautionValue;
    }

    /**
     * Set bien
     *
     * @param \wise\OwnerBundle\Entity\Bien $bien
     * @return Bail
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

    /**
     * Set type
     *
     * @param  integer type
     * @return type
     */
    public function setType($type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }
}
