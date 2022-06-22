<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'L’:attribute doit être accepté.',
    'active_url' => 'L’:attribute n’est pas une URL valide.',
    'after' => 'L’:attribute doit être une date après :date.',
    'after_or_equal' => 'L’:attribute doit être une date postérieure ou égale à :date.',
    'alpha' => 'L’:attribute ne peut contenir que des lettres.',
    'alpha_dash' => 'L’:attribute ne peut contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num' => 'L’:attribute ne peut contenir que des lettres et des chiffres.',
    'array' => 'L’:attribute doit être un tableau.',
    'before' => 'L’:attribute doit être une date avant :date.',
    'before_or_equal' => 'L’:attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'numeric' => 'L’:attribute Doit être entre :min et :max.',
        'file' => 'L’:attribute Doit être entre :min et :max kilobytes.',
        'string' => 'L’:attribute Doit être entre :min et :max characters.',
        'array' => 'L’:attribute doit avoir entre:min et :max éléments.',
    ],
    'boolean' => 'L’:attribute le champ doit être vrai ou faux.',
    'confirmed' => 'L’:attribute la confirmation ne correspond pas.',
    'date' => 'L’:attribute la date n’est pas valide.',
    'date_equals' => 'L’:attribute doit être une date égale à :date.',
    'date_format' => 'L’:attribute ne correspond pas au format :format.',
    'different' => 'L’:attribute et :other doivent être différents.',
    'digits' => 'L’:attribute doit être :digits chiffres.',
    'digits_between' => 'L’:attribute doit être entre :min et :max chiffres.',
    'dimensions' => 'L’:attribute a des dimensions d’image non valides.',
    'distinct' => 'L’:attribute champ a une valeur en double.',
    'email' => 'L’:attribute doit être une adresse e-mail valide.',
    'ends_with' => 'L’:attribute doit se terminer par l’un des éléments suivants: :values',
    'exists' => ' :attribute sélectionné n’est pas valide.',
    'file' => 'L’:attribute doit être un fichier.',
    'filled' => 'L’:attribute champ doit avoir une valeur.',
    'gt' => [
        'numeric' => 'L’:attribute doit être supérieur à :value.',
        'file' => 'L’:attribute doit être supérieur à :value kilobytes.',
        'string' => 'L’:attribute doit être supérieur à :value characters.',
        'array' => 'L’:attribute doit avoir plus de :value items.',
    ],
    'gte' => [
        'numeric' => 'L’:attribute doit être supérieur ou égal :value.',
        'file' => 'L’:attribute doit être supérieur ou égal :value kilobytes.',
        'string' => 'L’:attribute doit être supérieur ou égal :value characters.',
        'array' => 'L’:attribute must have :value items ou plus.',
    ],
    'image' => 'L’:attribute doit être une image.',
    'in' => ' :attribute sélectionné est invalide.',
    'in_array' => 'L’:attribute champ n’existe pas dans :other.',
    'integer' => 'L’:attribute Doit être un entier.',
    'ip' => 'L’:attribute doit être une adresse IP valide.',
    'ipv4' => 'L’:attribute doit être une adresse IPv4 valide.',
    'ipv6' => 'L’:attribute doit être une adresse IPv6 valide.',
    'json' => 'L’:attribute doit être une chaîne JSON valide.',
    'lt' => [
        'numeric' => 'L’:attribute doit être inférieur à :value.',
        'file' => 'L’:attribute doit être inférieur à :value kilobytes.',
        'string' => 'L’:attribute doit être inférieur à :value characters.',
        'array' => 'L’:attribute must have less than :value éléments.',
    ],
    'lte' => [
        'numeric' => 'L’:attribute doit être inférieur ou égale :value.',
        'file' => 'L’:attribute doit être inférieur  ou égale :value kilobytes.',
        'string' => 'L’:attribute doit être inférieur ou égale :value characters.',
        'array' => 'L’:attribute ne doit pas avoir plus de :value éléments.',
    ],
    'max' => [
        'numeric' => 'L’:attribute ne peut être supérieur à :max.',
        'file' => 'L’:attribute ne peut être supérieur à :max kilobytes.',
        'string' => 'L’:attribute ne peut être supérieur à :max characters.',
        'array' => 'L’:attribute ne peut pas avoir plus de :max éléments.',
    ],
    'mimes' => 'L’:attribute doit être un fichier de type: :values.',
    'mimetypes' => 'L’:attribute doit être un fichier de type: :values.',
    'min' => [
        'numeric' => 'L’:attribute  doit être au moins :min.',
        'file' => 'L’:attribute  doit être au moins :min kilobytes.',
        'string' => 'L’:attribute  doit être au moins :min characters.',
        'array' => 'L’:attribute doit avoir au moins :min éléments.',
    ],
    'not_in' => ':attribute sélectionné est invalide.',
    'not_regex' => 'L’:attribute format n’est pas valide.',
    'numeric' => 'L’:attribute doit être un entier.',
    'present' => 'L’:attribute champ doit être présent.',
    'regex' => 'L’:attribute format n’est pas valide',
    'required' => 'L’:attribute Champ requis.',
    'required_if' => 'L’:attribute champ est obligatoire lorsque :other est :value.',
    'required_unless' => 'L’:attribute champ est obligatoire sauf si :other est dans :values.',
    'required_with' => 'L’:attribute champ est obligatoire lorsque :values est present.',
    'required_with_all' => 'L’:attribute champ est obligatoire lorsque :values sont present.',
    'required_without' => 'L’:attribute champ est obligatoire lorsque :values est not present.',
    'required_without_all' => 'L’:attribute champ est obligatoire lorsque aucun de :values sont present.',
    'same' => 'L’:attribute et :other doivent correspondre.',
    'size' => [
        'numeric' => 'L’:attribute doit être :size.',
        'file' => 'L’:attribute doit être :size kilobytes.',
        'string' => 'L’:attribute doit être :size characters.',
        'array' => 'L’:attribute doit contenir :size éléments.',
    ],
    'starts_with' => 'L’:attribute Commencez par l’un des éléments  following: :values',
    'string' => 'L’:attribute doit être un string.',
    'timezone' => 'L’:attribute doit être une zone valide.',
    'unique' => 'L’:attribute a déjà été pris.',
    'uploaded' => 'L’:attribute échec du téléchargement.',
    'url' => 'L’:attribute format n’est pas valide.',
    'uuid' => 'L’:attribute doit être un UUID valide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
