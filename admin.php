<?php
$this->on('collections.entry.aside', function ($name) use ($app) {
    $collection = $this->module('collections')->collection($name);
    $this->renderView("extended_groups:test.php", compact('collection', 'app'));
});

// add group of current user to entry
$this->on('collections.save.before', function ($collection, &$entry) use ($app) {
    $meta_name = '_inital_user_group';
    if (!key_exists($meta_name, $entry)) {
        $entry[$meta_name] = $app->module('cockpit')->getUserGroup();
    }
});


