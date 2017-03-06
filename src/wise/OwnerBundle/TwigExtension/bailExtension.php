<?php

namespace wise\OwnerBundle\TwigExtension;

use Symfony\Component\Config\Definition\Exception\Exception;
use Twig_Extension;
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
            echo "Une exeception a été jetée : ".$e;
        }

            return $data;
    }
}