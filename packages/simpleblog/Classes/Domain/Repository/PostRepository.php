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
 * The repository for Posts
 */
class PostRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
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
