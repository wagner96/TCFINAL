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
    'alpha_spaces'         => 'O :attribute só pode conter letras e números..',

    'accepted'             => 'O :attribute deve ser accepted.',
    'active_url'           => 'O :attribute is not a valid URL.',
    'after'                => 'O :attribute deve ser a date after :date.',
    'after_or_equal'       => 'O :attribute deve ser a date after or equal to :date.',
    'alpha'                => 'O :attribute só pode conter apenas letras.',
    'alpha_dash'           => 'O :attribute só apenas contém letras, números e traços.',
    'alpha_num'            => 'O :attribute só apenas contém letras e números.',
    'array'                => 'O :attribute deve ser apenas contém letras e números.',
    'before'               => 'O :attribute deve ser uma data antes :date.',
    'before_or_equal'      => 'O :attribute deve ser uma data anterior ou igual a :date.',
    'between'              => [
        'numeric' => 'O :attribute deve ser entre :min e :max.',
        'file'    => 'O :attribute deve ser entre :min e :max kilobytes.',
        'string'  => 'O :attribute deve ser entre :min e :max caráter.',
        'array'   => 'O :attribute deve have entre :min e :max items.',
    ],
    'boolean'              => 'O :attribute campo deve ser verdadeiro ou falso.',
    'confirmed'            => 'O :attribute confirmation does not match.',
    'date'                 => 'O :attribute não é uma data válida.',
    'date_format'          => 'O :attribute does not match O format :format.',
    'different'            => 'O :attribute and :oOr deve ser different.',
    'digits'               => 'O :attribute deve ser :digits digits.',
    'digits_between'       => 'O :attribute deve ser between :min and :max digits.',
    'dimensions'           => 'O :attribute has invalid image dimensions.',
    'distinct'             => 'O :attribute field has a duplicate value.',
    'email'                => 'O :attribute deve ser a endereço de email valido.',
    'exists'               => 'O :attribute já exite.',
    'file'                 => 'O :attribute deve ser a arquivo.',
    'filled'               => 'O :attribute field deve have a value.',
    'image'                => 'O :attribute deve ser uma imagem.',
    'in'                   => 'O selected :attribute is invalid.',
    'in_array'             => 'O :attribute field does not exist in :oOr.',
    'integer'              => 'O :attribute deve ser an integer.',
    'ip'                   => 'O :attribute deve ser a valid IP address.',
    'ipv4'                 => 'O :attribute deve ser a valid IPv4 address.',
    'ipv6'                 => 'O :attribute deve ser a valid IPv6 address.',
    'json'                 => 'O :attribute deve ser a valid JSON string.',
    'max'                  => [
        'numeric' => 'O :attribute  não pode ser maior do que :max.',
        'file'    => 'O :attribute  não pode ser maior do que :max kilobytes.',
        'string'  => 'O :attribute não pode ser maior do que :max characters.',
        'array'   => 'O :attribute  not have more than :max items.',
    ],
    'mimes'                => 'O :attribute deve ser a file of type: :values.',
    'mimetypes'            => 'O :attribute deve ser a file of type: :values.',
    'min'                  => [
        'numeric' => 'O :attribute deve ser pelo menos :min.',
        'file'    => 'O :attribute deve ser pelo menos :min kilobytes.',
        'string'  => 'O :attribute deve ser pelo menos :min characters.',
        'array'   => 'O :attribute deve have pelo menos :min items.',
    ],
    'not_in'               => 'O selected :attribute is invalid.',
    'numeric'              => 'O :attribute deve ser um número.',
    'present'              => 'O :attribute field deve ser present.',
    'regex'                => 'O :attribute format is invalid.',
    'required'             => 'O :attribute é um campo obrigatório.',
    'required_if'          => 'O :attribute é um campo obrigatório quando :other e :value.',
    'required_unless'      => 'O :attribute é um campo obrigatório unless :other is in :values.',
    'required_with'        => 'O :attribute é um campo obrigatório quando :values is present.',
    'required_with_all'    => 'O :attribute é um campo obrigatório quando :values is present.',
    'required_without'     => 'O :attribute é um campo obrigatório quando :values is not present.',
    'required_without_all' => 'O :attribute é um campo obrigatório quando nenhum :values are present.',
    'same'                 => 'O :attribute and :other deve match.',
    'size'                 => [
        'numeric' => 'O :attribute deve ser :size.',
        'file'    => 'O :attribute deve ser :size kilobytes.',
        'string'  => 'O :attribute deve ser :size characters.',
        'array'   => 'O :attribute deve contain :size items.',
    ],
    'string'               => 'O :attribute deve ser a string.',
    'timezone'             => 'O :attribute deve ser a valid zone.',
    'unique'               => 'O :attribute já existe, tente outro.',
    'uploaded'             => 'O :attribute failed to upload.',
    'url'                  => 'O :attribute format is invalid.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
