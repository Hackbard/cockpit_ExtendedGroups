<?php
$app->path('extended_groups', 'addons/ExtendedGroups/');

$this->module("cockpit")->extend([
    "getUserGroup" => function() use($app) {
        return $app('session')->read('cockpit.app.auth')['group'];
    }
]);

if (COCKPIT_ADMIN && !COCKPIT_API_REQUEST) {
    include_once __DIR__ . '/admin.php';
}
