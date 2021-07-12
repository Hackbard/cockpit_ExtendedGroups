<?php
$app->on('collections.find.after', function ($name, &$entries) use ($app) {
    if ($app['user']['group'] === 'admin') {
        return;
    }
    $collection = $this->module('collections')->collection($name);
    foreach ($entries as $key => $entry) {
        if (isset($entry['_inital_user_group'])) {
            if ($entry['_inital_user_group'] !== $this->module("extendedgroups")->getCurrentUserGroup()) {
                unset($entries[$key]);
            }
        }
    }
});
