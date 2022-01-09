<?php

return [
    'default' => [
        [
            'name'      => 'O seu nome',
            'type'      => 'input',
            'validator' => 'required|string|max:255',
        ],
        [
            'name'      => 'A sua função no projectos',
            'type'      => 'input',
            'validator' => 'required|string|max:255',
        ],
        [
            'name'      => 'Numa escala de 1 a 10, como descreve o desempenho do gestor de projecto?',
            'type'      => 'range',
            'validator' => 'required|integer|min:1|max:10',
        ],
        [
            'name'      => 'Numa escala de 1 a 10, como descreve o desempenho do account manager no projecto?',
            'type'      => 'range',
            'validator' => 'required|integer|min:1|max:10',
        ],
        [
            'name'      => 'Numa escala de 1 a 10, descreva a sua experiência geral no projecto?',
            'type'      => 'range',
            'validator' => 'required|integer|min:1|max:10',
        ],
        [
            'name'      => 'Que melhorias sugeria para o projecto?',
            'type'      => 'text',
            'validator' => 'nullable|string|max:5000',
        ],
        [
            'name'      => 'Que melhorias sugeria para a empresa?',
            'type'      => 'text',
            'validator' => 'nullable|string|max:5000',
        ],
    ],
];
