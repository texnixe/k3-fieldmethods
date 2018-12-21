<?php 
Kirby::plugin('texnixe/fieldmethods', [
    'fieldMethods' => [
        'ktRaw' => function ($field){  
            $field->value = preg_replace('/(.*)<\/p>/', '$1', preg_replace('/<p>(.*)/', '$1', $field->kirbytext()));
            return $field;     
        },
        'kirbytextRaw' => function($field) {
            return $field->ktRaw();
        },
        'contains' => function($field, string $needle, string $separator = ',') : bool {
            return in_array($needle, $field->split($separator));
        },
        'toSlug' => function($field) {
            return str::slug(str::unhtml($field->value()));
        },
        
    ]
]);
