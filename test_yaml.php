<?php
require 'vendor/autoload.php';
use Illuminate\Support\Str;
use Symfony\Component\Yaml\Yaml;

\ = file_get_contents('sabbath-school-lessons-stage/src/en/2026-01-zaijkdsg/pdf.yml');
\ = preg_replace('/^---\s*[\r\n]+/', '', \);
\ = explode(\"\n\", \);
\ = PHP_INT_MAX;
foreach (\ as \) {
    if (trim(\) === '') continue;
    if (preg_match('/^(\s+)/', \, \)) {
        \ = min(\, strlen(\[1]));
    } else {
        \ = 0;
        break;
    }
}
if (\ > 0 && \ !== PHP_INT_MAX) {
    \ = preg_replace('/^ {' . \ . '}/m', '', \);
}
\ = Yaml::parse(\);
print_r(\);
