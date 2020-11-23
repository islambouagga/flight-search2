<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'ExtbaseBook.Flightsearch',
            'Flightlist',
            [
                'Flight' => 'list,add',
                'City' => 'list'
            ],
            // non-cacheable actions
            [
                'Flight' => 'list,add',
                'City' => 'list'
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        flightlist {
                            iconIdentifier = flightsearch-plugin-flightlist
                            title = LLL:EXT:flightsearch/Resources/Private/Language/locallang_db.xlf:tx_flightsearch_flightlist.name
                            description = LLL:EXT:flightsearch/Resources/Private/Language/locallang_db.xlf:tx_flightsearch_flightlist.description
                            tt_content_defValues {
                                CType = list
                                list_type = flightsearch_flightlist
                            }
                        }
                    }
                    show = *
                }
           }'
        );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

			$iconRegistry->registerIcon(
				'flightsearch-plugin-flightlist',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:flightsearch/Resources/Public/Icons/user_plugin_flightlist.svg']
			);

    }
);
