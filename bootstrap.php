<?php
$app->path('extendedgroups', 'addons/ExtendedGroups/');

if (COCKPIT_ADMIN && !COCKPIT_API_REQUEST) {
    $this->module("extendedgroups")->extend([
        "getCurrentUserGroup" => function () use ($app) {
            return $app('session')->read('cockpit.app.auth')['group'];
        }
    ]);


    include_once __DIR__ . '/admin.php';
}

include_once __DIR__ . '/actions.php';
