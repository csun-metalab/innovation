<?php

use Sami\Sami;
use Sami\Version\GitVersionCollection;
use Symfony\Component\Finder\Finder;
use Sami\Parser\Filter\TrueFilter;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->in(__DIR__."/app")
;

$versions = GitVersionCollection::create(__DIR__."/app")
    ->add('dev', 'dev branch')
;

$options = [
    'theme'    => 'default',
    'versions' => $versions,
];

$sami = new Sami($iterator);

$sami['filter'] = function () {
    return new TrueFilter();
};

return $sami;
