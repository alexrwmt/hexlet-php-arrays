<?php

namespace App\Strings;

// BEGIN (write your solution here)
function buildDefinitionList($items) {
    if (count($items) == 0) {
        return '';
    }

    $list = [];
    foreach ($items as $row) {
        [$key, $value] = $row;
        $list[] = sprintf('<dt>%s</dt>', $key);
        $list[] = sprintf('<dd>%s</dd>', $value);
    }

    return sprintf('<dl>%s</dl>', implode($list));
}
// END


$definitions1 = [
    ['key', 'value'],
    ['key2', 'value2'],
];
$actual1 = buildDefinitionList($definitions1);
$expected1 = '<dl><dt>key</dt><dd>value</dd><dt>key2</dt><dd>value2</dd></dl>';

echo '.';