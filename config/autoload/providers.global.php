<?php

return [
    'providers' => [
        'youtrack' => [
            [
                'query' => 'Priority: Critical #Unresolved',
                'type' => 'count',
                'title' => 'Criticals count',
                'team' => 'portal',
            ],
            [
                'query' => '#Show-stopper #Unresolved',
                'type' => 'count',
                'title' => 'Show-stoppers count',
                'team' => 'payroll'
            ],
        ],
//        'kibana' => [
//
//        ]
    ],
];
