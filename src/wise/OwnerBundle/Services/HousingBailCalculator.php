<?php

namespace wise\OwnerBundle\Services;

class HousingBailCalculator implements BailCalculator
{
    // j'ai mis des contantes en attendant de mettre les valeurs en parametres.
    const LOCATION_VIDE   = 3;
    const LOCATION_MEUBLE = 1;
    const LOCATION_AUTRES = 2;

    public function calculBailDurationByPercent(\DateTime $dateStarted, \DateTime $dateEnded)
    {
        $fullBailDuration = $dateStarted->diff($dateEnded);
        $timepastFromBailStarted = $dateStarted->diff(new \DateTime('NOW'));
        $fullBailDurationInDays = intval($fullBailDuration->format('%a'));
        $timepastFromBailStartedInDays = intval($timepastFromBailStarted->format('%a'));
        $fullBailDurationInDays = (0 == $fullBailDurationInDays) ? 1 : $fullBailDurationInDays;
        $result = ($timepastFromBailStartedInDays * 100)/$fullBailDurationInDays;
        $result = (100 < $result) ? 100 : $result;

        return round($result, 0, PHP_ROUND_HALF_UP);
    }

    public function countBailRenewal($dateToday, \DateTime $dateBailStarted, $bailType)
    {
//        dump($dateToday,$dateBailStarted,$bailType);die;
//        if (0 >= $bailType) {
//            throw new \DivisionByZeroError("Le type de bail ne peut être de 0");
//        }

//        $renewalCount = ($dateToday - $dateBailStarted) / $bailType;

        //TODO faire le rapport entre le nombre d'année passé avec comme quotient le type de contrat de location
        // 3 ans pour les locations vides et 1 an pour les locations meublés.

        return 3;
    }
}