<?php

return [
    'providers' => [
        'youtrack' => [
            [
                'query' => 'Priority: Critical #Unresolved project: MV, MVMessaging, MVPayslips, {MVPayroll UI}',
                'type' => 'count',
                'title' => 'Criticals count',
                'team' => 'payroll',
            ],
            [
                'query' => 'Priority: Critical #Unresolved project: MVPortal, MVAuth, MVSSO, MVErrorHandling, MVLocale, MVSession, MYV, MVNews, MVYearPlanner, MVDocuments, MvAuthentication, MvRestProxy, MvRestProxyServer',
                'type' => 'count',
                'title' => 'Criticals count',
                'team' => 'portal',
            ],
            [
                'query' => '#Show-stopper #Unresolved project: MV, MVMessaging, MVPayslips, {MVPayroll UI}',
                'type' => 'count',
                'title' => 'Show-stoppers count',
                'team' => 'payroll'
            ],
            [
                'query' => '#Show-stopper #Unresolved project: MVPortal, MVAuth, MVSSO, MVErrorHandling, MVLocale, MVSession, MYV, MVNews, MVYearPlanner, MVDocuments, MvAuthentication, MvRestProxy, MvRestProxyServer',
                'type' => 'count',
                'title' => 'Show-stoppers count',
                'team' => 'portal'
            ],
        ],
//        'kibana' => [
//
//        ]
    ],
];
