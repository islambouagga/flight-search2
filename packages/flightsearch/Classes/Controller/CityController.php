<?php
namespace ExtbaseBook\Flightsearch\Controller;


use ExtbaseBook\Flightsearch\Domain\Repository\CityRepository;

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
 * CityController
 */
class CityController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * cityRepository
     * @var CityRepository
     */
        protected $cityRepository = null;
    /**
     * @param CityRepository $CityRepository
     */

    public function injectCityRepository(CityRepository $CityRepository)
    {
        $this->cityRepository = $CityRepository;
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $cities = $this->cityRepository->findAll();
        $this->view->assign('cities', $cities);
    }
}
