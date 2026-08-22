<?php
//
//function set_active($uri) {
//    return (uri_string() == $uri) ? 'active' : '';
//}
function set_active($uris) {
    if (!is_array($uris)) {
        $uris = [$uris]; // agar single string hai to usse array bana do
    }

    foreach ($uris as $uri) {
        if (uri_string() == $uri) {
            return 'active';
        }
    }
    return '';
}