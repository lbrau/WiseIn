<?php

namespace wise\OwnerBundle\TwigExtension;

use Symfony\Component\HttpFoundation\RequestStack;
use Twig_Extension;

class DateExtension extends Twig_Extension
{

    private $requestStack;

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('dateInLetter', array($this, 'formatDateLetter')),
            new \Twig_SimpleFilter('frenchFormat', array($this, 'frenchFormat')),
        );
    }

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function formatDateLetter($date, $format = '%A %d %B %Y')
    {
        if ($date instanceof \DateTime) {
            $date = $date->getTimestamp();
        }

//        setlocale(LC_TIME, 'french');
        $request = $this->requestStack->getCurrentRequest();
        return strftime($format, $date);
    }

    public function frenchFormat($date)
    {
        $days  = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
        $months = ['janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre'];
        // Format date to french format
        $day = $days[$date->format('w')];
        $month = $months[$date->format('n')];
        $dateFormated = $day.' '.$date->format('d').' '.$month.' '.$date->format('Y');

        return $dateFormated;
    }


}