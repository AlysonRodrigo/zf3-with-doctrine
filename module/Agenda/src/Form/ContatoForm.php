<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 19/07/17
 * Time: 22:08
 */

namespace Agenda\Form;


use Zend\Form\Element\Button;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class ContatoForm extends Form
{

    public function __construct($name = null, array $options = [])
    {
        parent::__construct('form-contato');

        $id = new Hidden('id');
        $this->add($id);

        $nome = new Text('nome');
        $nome->setLabel('Nome');
        $nome->setAttributes([
            'id' => 'nome',
            'class' => 'form-control',
            'placeholder' => 'Informe o nome'
        ]);
        $this->add($nome);

        $telefone = new Text('telefone');
        $telefone->setLabel('Telefone');
        $telefone->setAttributes([
            'id' => 'telefone',
            'class' => 'form-control',
            'placeholder' => 'Informe o telefone'
        ]);
        $this->add($telefone);

        $celular = new Text('celular');
        $celular->setLabel('Celular');
        $celular->setAttributes([
            'id' => 'celular',
            'class' => 'form-control',
            'placeholder' => 'Informe o celular'
        ]);
        $this->add($celular);

        $email = new Email('email');
        $email->setLabel('Email');
        $email->setAttributes([
            'id' => 'email',
            'class' => 'form-control',
            'placeholder' => 'Informe o email'
        ]);
        $this->add($email);

        $button = new Button('entrar');
        $button->setLabel('Entrar');
        $button->setValue('Entrar');
        $button->setAttributes([
           'class' => 'btn btn-success'
        ]);
        $this->add($button);

    }

}