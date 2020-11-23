<?php


namespace ExtbaseBook\Flightsearch\Domain\Repository;
use TYPO3\CMS\Extbase\Persistence\Repository;

/***
 *
 * This file is part of the "Flight Search" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 islam bouagga <wachfiha@gmail.com>, algebratec
 *
 ***/
/**
 * The repository for Flights
 */

class FlightRepository extends Repository
{
    public function initializeObject()
    {
        // get the current settings
        $querySettings = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings');
        // change the default setting, whether the storage page ID is ignored by the plugins (FALSE) or not (TRUE - default setting)
        $querySettings->setRespectStoragePage(FALSE);
        // store the new setting(s)
        $this->setDefaultQuerySettings($querySettings);
    }

}
