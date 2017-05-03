<?php

namespace wise\OwnerBundle\TwigExtension;

use Symfony\Component\Config\Definition\Exception\Exception;
use Twig_Extension;
use wise\OwnerBundle\Entity\Bien;
use wise\OwnerBundle\Services\HousingBailCalculator;

class BailExtension extends Twig_Extension
{
    private $bailCalculator;

    public function __construct(HousingBailCalculator $bailCalculator)
    {
        $this->bailCalculator = $bailCalculator;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('bailProgressPercent', array($this, 'bailProgressInPercent')),
            new \Twig_SimpleFilter('bailRenewalNumber', array($this, 'bailRenewalNumber')),
            new \Twig_SimpleFilter('bailStartedFrom', array($this, 'bailStartedFrom')),
            new \Twig_SimpleFilter('isLeased', array($this, 'isLeased')),
        );
    }

    public function bailProgressInPercent($started, \DateTime $ended)
    {
        return $this->bailCalculator->calculBailDurationByPercent($started, $ended);
    }

    public function bailRenewalNumber($dateBailStarted, $bailType)
    {
        $dateToday = new \DateTime('NOW');
        $dateBailStarted = new \DateTime($dateBailStarted);
        try {
            $data = $this->bailCalculator->countBailRenewal($dateToday, $dateBailStarted, $bailType);
        } catch (Exception $e) {
            echo "Une exception a été jetée : ".$e;
        }

            return $data;
    }

    function pluralize($count, $text)
    {
        return $count.(($count == 1) ? (" $text") : (" ${text}s"));
    }

    // TODO A tester unitairement.
    public function bailStartedFrom($dateBailStarted)
    {
        $dateToday = new \DateTime('NOW');
        $timeToBailPast = $dateToday->diff($dateBailStarted);
        if (1 <= $timeToBailPast->y) {
            $result = $this->pluralize($timeToBailPast->y, "année");
        } elseif (1 <= $timeToBailPast->m) {
            $result = $timeToBailPast->m. ' mois';
        } elseif (1 <= $timeToBailPast->d) {
            $result =  $this->pluralize($timeToBailPast->d, 'jour');
        }elseif (1 <= $timeToBailPast->h) {
            $result =  $this->pluralize($timeToBailPast->d, 'heure');
        } else {
            $result = $this->pluralize($timeToBailPast->s, 'seconde');
        }

        return $result;
    }

    /**
     * Return true if the appartement is leased.
     *
     * @param Bien $bien
     * @return bool
     */
    public function isLeased(Bien $bien)
    {
        $result = "Vide";
        if(0 < count($bien->getLocataire())) {
            $result = "Loué";
        }

        return $result;
    }
}