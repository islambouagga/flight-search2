<?php
namespace ExtbaseBook\Simpleblog\Domain\Repository;
use TYPO3\CMS\Extbase\Persistence\Repository;
class TagRepository extends Repository
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