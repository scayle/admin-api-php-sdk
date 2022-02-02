<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in(__DIR__ . '/lib')
    ->in(__DIR__ . '/tests')
    ->name('*.php');

return (new Config())
    ->setRiskyAllowed(true)
    ->setFinder($finder)
    ->setRules([
        '@PSR2' => true,
        '@PhpCsFixer' => true,
        '@PhpCsFixer:risky' => true,
        '@PHP56Migration:risky' => true,
        '@PHPUnit57Migration:risky' => true,
        'fopen_flags' => true,
        'linebreak_after_opening_tag' => true,
        'native_function_invocation' => true,
        'concat_space' => ['spacing' => 'one'],
        'ordered_class_elements' => false,
        'phpdoc_align' => false,
        'self_accessor' => false,
        'php_unit_test_class_requires_covers' => false
    ]);
