<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:flightsearch/Resources/Private/Language/locallang_db.xlf:tx_flightsearch_domain_model_flight',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title',
        'iconfile' => 'EXT:flightsearch/Resources/Public/Icons/tx_flightsearch_domain_model_flight.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden, title, datetimestart, city_start, city_end',
    ],
    'types' => [
        '1' => ['showitem' => 'hidden, title, datetimestart, city_start, city_end, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'title' => [
            'exclude' => false,
            'label' => 'LLL:EXT:flightsearch/Resources/Private/Language/locallang_db.xlf:tx_flightsearch_domain_model_flight.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'datetimestart' => [
            'exclude' => false,
            'label' => 'LLL:EXT:flightsearch/Resources/Private/Language/locallang_db.xlf:tx_flightsearch_domain_model_flight.datetimestart',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 10,
                'eval' => 'datetime,required',
                'default' => time()
            ],
        ],
        'city_start' => [
            'exclude' => false,
            'label' => 'LLL:EXT:flightsearch/Resources/Private/Language/locallang_db.xlf:tx_flightsearch_domain_model_flight.city_start',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_flightsearch_domain_model_city',
                'foreign_field' => 'flight',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],
        'city_end' => [
            'exclude' => true,
            'label' => 'LLL:EXT:flightsearch/Resources/Private/Language/locallang_db.xlf:tx_flightsearch_domain_model_flight.city_end',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_flightsearch_domain_model_city',
                'foreign_field' => 'flight1',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],
    
    ],
];
