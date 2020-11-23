<?php
namespace ExtbaseBook\Flightsearch\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author islam <wachfiha@gmail.com>
 */
class FlightTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \ExtbaseBook\Flightsearch\Domain\Model\Flight
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \ExtbaseBook\Flightsearch\Domain\Model\Flight();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDatetimestartReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDatetimestart()
        );
    }

    /**
     * @test
     */
    public function setDatetimestartForDateTimeSetsDatetimestart()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDatetimestart($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'datetimestart',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCityStartReturnsInitialValueForCity()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getCityStart()
        );
    }

    /**
     * @test
     */
    public function setCityStartForObjectStorageContainingCitySetsCityStart()
    {
        $cityStart = new \ExtbaseBook\Flightsearch\Domain\Model\City();
        $objectStorageHoldingExactlyOneCityStart = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneCityStart->attach($cityStart);
        $this->subject->setCityStart($objectStorageHoldingExactlyOneCityStart);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneCityStart,
            'cityStart',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addCityStartToObjectStorageHoldingCityStart()
    {
        $cityStart = new \ExtbaseBook\Flightsearch\Domain\Model\City();
        $cityStartObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $cityStartObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($cityStart));
        $this->inject($this->subject, 'cityStart', $cityStartObjectStorageMock);

        $this->subject->addCityStart($cityStart);
    }

    /**
     * @test
     */
    public function removeCityStartFromObjectStorageHoldingCityStart()
    {
        $cityStart = new \ExtbaseBook\Flightsearch\Domain\Model\City();
        $cityStartObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $cityStartObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($cityStart));
        $this->inject($this->subject, 'cityStart', $cityStartObjectStorageMock);

        $this->subject->removeCityStart($cityStart);
    }

    /**
     * @test
     */
    public function getCityEndReturnsInitialValueForCity()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getCityEnd()
        );
    }

    /**
     * @test
     */
    public function setCityEndForObjectStorageContainingCitySetsCityEnd()
    {
        $cityEnd = new \ExtbaseBook\Flightsearch\Domain\Model\City();
        $objectStorageHoldingExactlyOneCityEnd = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneCityEnd->attach($cityEnd);
        $this->subject->setCityEnd($objectStorageHoldingExactlyOneCityEnd);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneCityEnd,
            'cityEnd',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addCityEndToObjectStorageHoldingCityEnd()
    {
        $cityEnd = new \ExtbaseBook\Flightsearch\Domain\Model\City();
        $cityEndObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $cityEndObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($cityEnd));
        $this->inject($this->subject, 'cityEnd', $cityEndObjectStorageMock);

        $this->subject->addCityEnd($cityEnd);
    }

    /**
     * @test
     */
    public function removeCityEndFromObjectStorageHoldingCityEnd()
    {
        $cityEnd = new \ExtbaseBook\Flightsearch\Domain\Model\City();
        $cityEndObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $cityEndObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($cityEnd));
        $this->inject($this->subject, 'cityEnd', $cityEndObjectStorageMock);

        $this->subject->removeCityEnd($cityEnd);
    }
}
