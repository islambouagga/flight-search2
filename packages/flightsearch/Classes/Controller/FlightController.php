<?php

namespace ExtbaseBook\Flightsearch\Controller;


use ExtbaseBook\Flightsearch\Domain\Model\Flight;
use ExtbaseBook\Flightsearch\Domain\Repository\FlightRepository;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

/***
 *
 * This file is part of the "flight search" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 islam <wachfiha@gmail.com>, algebratec
 *
 ***/

/**
 * FlightController
 */
class FlightController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     *flightRepository
     *
     * @var FlightRepository
     */
    protected $flightRepository = null;

    /**
     * @param FlightRepository $FlightRepository
     */
    public function injectFlightRepository(FlightRepository $FlightRepository)
    {
        $this->flightRepository = $FlightRepository;
    }
    /**
     *
     * sksdjk
     */
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {

//        for ($i = 1; $i <= 3; $i++) {
//            /** @var Flight $flight */
//            $blog = $this->objectManager->get(Flight::class);
//            $blog->setTitle('This is the ' . $i . '. Flight!');
//            $this->flightRepository->add($blog);
//        }
//        $this->objectManager->get(PersistenceManager::class)->persistAll();
//        $this->view->assign('flights', $this->flightRepository->findAll());
        $flights = $this->flightRepository->findAll();
        $this->view->assign('flights', $flights);
    }
}
