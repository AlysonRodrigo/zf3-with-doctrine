<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 19/07/17
 * Time: 22:17
 */

namespace Agenda\Filter;


use Zend\InputFilter\InputFilter;

class UserFilter extends InputFilter
{

    public function __construct()
    {

        $this->add([
            'name' => 'nome',
            'required' => true,
            'filters' => [
                ['name' => 'StripTags'],
                ['name' => 'StringTrim']
            ],
            'validators' => [
                [
                    'name' => 'NotEmpty',
                    'options' => [
                        'messages' => [
                            'isEmpty' => 'Não pode ser em branco'
                        ]
                    ]
                ]
            ]
        ]);

    }
}