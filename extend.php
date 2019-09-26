<?php

use Flarum\Extend;
use s9e\TextFormatter\Configurator;

return [
    (new Extend\Formatter)
        ->configure(function (Configurator $configurator) {
            $dom = $configurator->tags['URL']->template->asDOM();

            foreach ($dom->getElementsByTagName('a') as $a) {
                $a->setAttribute('target', '_blank');

                $rel = $a->getAttribute('rel');
                $a->setAttribute('rel', "$rel noopener");
            }

            $dom->saveChanges();
        }),
];
