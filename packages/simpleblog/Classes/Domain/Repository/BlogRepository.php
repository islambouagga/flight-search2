<?php
namespace ExtbaseBook\Simpleblog\Domain\Repository;


/***
 *
 * This file is part of the "Simple Blog Extension" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Mohammed Bachir Bouuagga <wachfiha@gmail.com>, algebratec
 *
 ***/
/**
 * The repository for Blogs
 */
use \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult;
use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser;
use \TYPO3\CMS\Extbase\Persistence\QueryInterface;
class BlogRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
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
    /**
     * Returns Blogs with a specific search term in the title
     *
     * @param string Search keyword
     * @param int Max number of Blogs to read from storage
     * @return QueryResult
     */
    public function findSearchForm($search, $limit): QueryResult
    {


        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->like('title', '%' . $search . '%')
        );
        $query->setOrderings(['title' => QueryInterface::ORDER_ASCENDING]);
        $limit = intval($limit);
        if ($limit > 0) {
            $query->setLimit($limit);
        }
        return $query->execute();
    }
}
