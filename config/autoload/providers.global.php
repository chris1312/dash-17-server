<?php

return [
    'providers' => [
        'youtrack' => [
            [
                'query' => 'Priority: Critical #Unresolved',
                'type' => 'count',
                'title' => 'Criticals count',
            ],
            [
                'query' => '#Show-stopper #Unresolved',
                'type' => 'count',
                'title' => 'Show-stoppers count',
            ],
        ],
//        'kibana' => [
//
//        ]
    ],
];
