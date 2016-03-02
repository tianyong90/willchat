<?php
/**
 * PHP-CS-fixer configuration.
 */

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->in(__DIR__ . '/app/')
;

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::PSR2_LEVEL)
    ->fixers(array('sf23', '-psr0'))
    ->finder($finder)
    ->setUsingCache(true)
;