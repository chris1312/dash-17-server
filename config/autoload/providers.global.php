<?php

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
                'query' => 'Priority: Critical #Unresolved #{Dash-17 team opiin}',
                'type' => 'count',
                'title' => 'Criticals count',
                'team' => 'opiin',
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
            [
                'query' => '#Show-stopper #Unresolved #{Dash-17 team opiin}',
                'type' => 'count',
                'title' => 'Show-stoppers count',
                'team' => 'opiin'
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
            [
                'query' => 'changes/?q=status:open+project:"^%s"',
                'project_description_filter' => 'lead: tarasaur',
                'type' => 'count',
                'team' => 'opiin',
                'title' => 'Unreviewed commits count',
            ],
        ],
    ],
];
