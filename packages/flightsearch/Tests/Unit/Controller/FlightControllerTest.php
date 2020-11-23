<?php
namespace ExtbaseBook\Flightsearch\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author islam <wachfiha@gmail.com>
 */
class FlightControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \ExtbaseBook\Flightsearch\Controller\FlightController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\ExtbaseBook\Flightsearch\Controller\FlightController::class)
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
    public function listActionFetchesAllFlightsFromRepositoryAndAssignsThemToView()
    {

        $allFlights = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $flightRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $flightRepository->expects(self::once())->method('findAll')->will(self::returnValue($allFlights));
        $this->inject($this->subject, 'flightRepository', $flightRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('flights', $allFlights);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
