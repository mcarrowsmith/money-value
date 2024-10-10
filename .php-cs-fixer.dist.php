<?php

$finder = Symfony\Component\Finder\Finder::create()
    ->in([
        __DIR__ . '/src',
    ])
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$config = new PhpCsFixer\Config;
$config->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setRules(\McArrowsmithPackages\HouseCodeStyleRules\PhpCsFixer::make());

return $config;
