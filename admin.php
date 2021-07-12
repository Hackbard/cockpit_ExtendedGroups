<?php
define('EXTENDEDGROUPS_INITAL_USER_GROUP', '_inital_user_group');
//
$this("acl")->addResource('extendedgroups', [
    'access',
]);

$this->on('collections.entry.aside', function ($name) use ($app) {
    $currentUserGroup = $app->module('extendedgroups')->getCurrentUserGroup();
    $this->renderView("extendedgroups:views/partials/entry-aside.php", ['initial_user_group_attribute_name' => EXTENDEDGROUPS_INITAL_USER_GROUP, 'currentUserGroup' => $currentUserGroup]);
});

// add group of current user to entry
$this->on('collections.save.before', function ($collection, &$entry) use ($app) {
    if (!key_exists(EXTENDEDGROUPS_INITAL_USER_GROUP, $entry)) {
        $entry[EXTENDEDGROUPS_INITAL_USER_GROUP] = $app->module('extendedgroups')->getCurrentUserGroup();
    }
});



/**
 * @TODO erstmal entry aside bei neuen einträgen leer lassen
 * @TODO Nach dem ersten speichern Gruppe setzen, danach in Moderation Addon schauen wie das mit dem rausfiltern geht, dabei die API nicht vergessen!
 * @TODO Rechte Management aufsetzen damit man für * und pro collection anstellen kann!
 */
