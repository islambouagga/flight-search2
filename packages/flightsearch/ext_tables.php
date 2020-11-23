<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {





        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_flightsearch_domain_model_flight', 'EXT:flightsearch/Resources/Private/Language/locallang_csh_tx_flightsearch_domain_model_flight.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_flightsearch_domain_model_flight');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_flightsearch_domain_model_city', 'EXT:flightsearch/Resources/Private/Language/locallang_csh_tx_flightsearch_domain_model_city.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_flightsearch_domain_model_city');

    }
);
