<?php

$header = <<<HEADER
This file is part of Portfolio project.
(c) Caroline Noyer <hello@carolinenoyer.info>

This source file is subject to the MIT license that is bundled
with this source code in the file LICENSE.
HEADER;

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var')
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        'header_comment' => [
            'header' => $header,
            'comment_type' => 'PHPDoc'
        ],
    ])
    ->setFinder($finder)
;
