<?php
namespace ExtbaseBook\Flightsearch\Domain\Model;


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
 * Flight
 */
class Flight extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     * 
     * @var string
     */
    protected $title = '';

    /**
     * datetimestart
     * 
     * @var \DateTime
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $datetimestart = null;

    /**
     * cityStart
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ExtbaseBook\Flightsearch\Domain\Model\City>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $cityStart = null;

    /**
     * cityEnd
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ExtbaseBook\Flightsearch\Domain\Model\City>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $cityEnd = null;

    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->cityStart = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->cityEnd = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     * 
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     * 
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the datetimestart
     * 
     * @return \DateTime $datetimestart
     */
    public function getDatetimestart()
    {
        return $this->datetimestart;
    }

    /**
     * Sets the datetimestart
     * 
     * @param \DateTime $datetimestart
     * @return void
     */
    public function setDatetimestart(\DateTime $datetimestart)
    {
        $this->datetimestart = $datetimestart;
    }

    /**
     * Adds a City
     * 
     * @param \ExtbaseBook\Flightsearch\Domain\Model\City $cityStart
     * @return void
     */
    public function addCityStart(\ExtbaseBook\Flightsearch\Domain\Model\City $cityStart)
    {
        $this->cityStart->attach($cityStart);
    }

    /**
     * Removes a City
     * 
     * @param \ExtbaseBook\Flightsearch\Domain\Model\City $cityStartToRemove The City to be removed
     * @return void
     */
    public function removeCityStart(\ExtbaseBook\Flightsearch\Domain\Model\City $cityStartToRemove)
    {
        $this->cityStart->detach($cityStartToRemove);
    }

    /**
     * Returns the cityStart
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ExtbaseBook\Flightsearch\Domain\Model\City> $cityStart
     */
    public function getCityStart()
    {
        return $this->cityStart;
    }

    /**
     * Sets the cityStart
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ExtbaseBook\Flightsearch\Domain\Model\City> $cityStart
     * @return void
     */
    public function setCityStart(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $cityStart)
    {
        $this->cityStart = $cityStart;
    }

    /**
     * Adds a City
     * 
     * @param \ExtbaseBook\Flightsearch\Domain\Model\City $cityEnd
     * @return void
     */
    public function addCityEnd(\ExtbaseBook\Flightsearch\Domain\Model\City $cityEnd)
    {
        $this->cityEnd->attach($cityEnd);
    }

    /**
     * Removes a City
     * 
     * @param \ExtbaseBook\Flightsearch\Domain\Model\City $cityEndToRemove The City to be removed
     * @return void
     */
    public function removeCityEnd(\ExtbaseBook\Flightsearch\Domain\Model\City $cityEndToRemove)
    {
        $this->cityEnd->detach($cityEndToRemove);
    }

    /**
     * Returns the cityEnd
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ExtbaseBook\Flightsearch\Domain\Model\City> $cityEnd
     */
    public function getCityEnd()
    {
        return $this->cityEnd;
    }

    /**
     * Sets the cityEnd
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ExtbaseBook\Flightsearch\Domain\Model\City> $cityEnd
     * @return void
     */
    public function setCityEnd(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $cityEnd)
    {
        $this->cityEnd = $cityEnd;
    }
}
