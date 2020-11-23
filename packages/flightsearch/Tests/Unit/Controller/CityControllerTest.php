<?php
namespace ExtbaseBook\Flightsearch\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author islam <wachfiha@gmail.com>
 */
class CityControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \ExtbaseBook\Flightsearch\Controller\CityController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\ExtbaseBook\Flightsearch\Controller\CityController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllCitiesFromRepositoryAndAssignsThemToView()
    {

        $allCities = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $cityRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $cityRepository->expects(self::once())->method('findAll')->will(self::returnValue($allCities));
        $this->inject($this->subject, 'cityRepository', $cityRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('cities', $allCities);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
