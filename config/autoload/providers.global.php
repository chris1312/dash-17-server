<?php

//$portalProjects = [
//    'myvisma',
//    'myvisma/app/auth',
//    'myvisma/app/documents',
//    'myvisma/app/documents-ui',
//    'myvisma/app/idp',
//    'myvisma/app/messaging',
//    'myvisma/app/messaging-ui',
//    'myvisma/app/portal',
//    'myvisma/app/year-planner',
//    'myvisma/app/year-planner-ui',
//    'myvisma/module/analytics
//    'myvisma/module/authentication
//    'myvisma/module/news
//    'myvisma/module/portal
//    'myvisma/module/rest-proxy-server
//    'myvisma/module/shared-data-client
//    'myvisma/module/sso
//    'myvisma/module/translation-generator
//    'visma/module/errorhandling
//    'visma/module/locale
//    'visma/module/restproxy
//    'visma/module/session
//    'visma/module/translate
//]

return [
    'providers' => [
        'youtrack' => [
            [
                'query' => 'Priority: Critical #Unresolved #{Dash-17 team payroll}',
                'type' => 'count',
                'title' => 'Criticals count',
                'team' => 'payroll',
            ],
            [
                'query' => 'Priority: Critical #Unresolved #{Dash-17 team portal}',
                'type' => 'count',
                'title' => 'Criticals count',
                'team' => 'portal',
            ],
            [
                'query' => '#Show-stopper #Unresolved #{Dash-17 team payroll}',
                'type' => 'count',
                'title' => 'Show-stoppers count',
                'team' => 'payroll'
            ],
            [
                'query' => '#Show-stopper #Unresolved #{Dash-17 team portal}',
                'type' => 'count',
                'title' => 'Show-stoppers count',
                'team' => 'portal'
            ],
        ],
        'teamcity' => [
            [
                'queries' => [
                    'builds?locator=count:1,project:myvisma_apps_portal',
                    'builds?locator=count:1,project:myvisma_app_portal',
                    'builds?locator=count:1,project:myvisma_app_auth',
                    'builds?locator=count:1,project:myvisma_module_sso',
                    'builds?locator=count:1,project:visma_module_errorhandling',
                    'builds?locator=count:1,project:visma_module_locale',
                    'builds?locator=count:1,project:myvisma_module_session',
                    'builds?locator=count:1,project:myvisma',
                    'builds?locator=count:1,project:myvisma_app_MyvismaAppYearPlanner',
                    'builds?locator=count:1,project:myvisma_app_MyvismaAppYearPlannerUi',
                    'builds?locator=count:1,project:myvisma_app_MyvismaAppDocuments',
                    'builds?locator=count:1,project:myvisma_app_MyvismaAppDocumentsUi',
                    'builds?locator=count:1,project:myvisma_module_authentication',
                    'builds?locator=count:1,project:visma_module_restproxy',
                    'builds?locator=count:1,project:myvisma_module_shared_data_client',
                    'builds?locator=count:1,project:myvisma_app_MyvismaAppIdp',
                    'builds?locator=count:1,project:myvisma_module_analytics',
                ],
                'title' => 'Failing builds count',
                'type' => 'count',
                'team' => 'portal',
            ],
            [
                'queries' => [
                    'builds?locator=count:1,project:myvisma_app_MyvismaAppMessaging',
                    'builds?locator=count:1,project:myvisma_app_payroll',
                    'builds?locator=count:1,project:myvisma_app_MyvismaAppPayslips',
                ],
                'title' => 'Failing builds count',
                'type' => 'count',
                'team' => 'payroll',
            ]
        ],
        'gerrit' => [
            [
                'query' => 'changes/?q=status:open+project:"^%s"',
                'project_description_filter' => 'lead: krivimar',
                'type' => 'count',
                'team' => 'payroll',
                'title' => 'Unreviewed commits count',
            ],
            [
                'query' => 'changes/?q=status:open+project:"^%s"',
                'project_description_filter' => 'lead: grigamin',
                'type' => 'count',
                'team' => 'portal',
                'title' => 'Unreviewed commits count',
            ],
        ],
    ],
];
