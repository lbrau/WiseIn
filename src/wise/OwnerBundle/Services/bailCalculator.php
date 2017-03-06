<?php

namespace wise\OwnerBundle\Services;

Interface BailCalculator
{
    public function calculBailDurationByPercent(\DateTime $dateStarted, \DateTime $dateEnded);
    public function countBailRenewal($dateToday, \DateTime $dateBailStarted, $bailType);
}