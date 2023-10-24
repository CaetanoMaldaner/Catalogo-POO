<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public $produto = [
        'imagem' => [
            'rules' => 'uploaded[imagem]|max_size[imagem,1024]|ext_in[imagem,jpg,jpeg,png,gif]',
            'errors' => [
                'uploaded' => 'Você deve fazer o upload de uma imagem.',
                'max_size' => 'A imagem é muito grande. O tamanho máximo permitido é 1MB.',
                'ext_in' => 'Apenas arquivos JPG, JPEG, PNG e GIF são permitidos.'
            ]
        ],
    ];
    

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}
