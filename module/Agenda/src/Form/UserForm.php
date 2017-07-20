<?php

namespace Agenda\Form;

use Zend\Form\Element\Button;
use Zend\Form\Element\Checkbox;
use Zend\Form\Element\Email;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Password;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class UserForm extends Form
{

    public function __construct($name = null, array $options = [])
    {
        parent::__construct('form-user');

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

        $email = new Email('email');
        $email->setLabel('Email');
        $email->setAttributes([
            'id' => 'email',
            'class' => 'form-control',
            'placeholder' => 'Informe o email'
        ]);
        $this->add($email);

        $senha = new Password('senha');
        $senha->setLabel('Senha');
        $senha->setAttributes([
            'id' => 'senha',
            'class' => 'form-control',
            'placeholder' => 'Informe o senha'
        ]);
        $this->add($senha);

        $status = new Checkbox('status');
        $status->setLabel('Status');
        $status->setUseHiddenElement(true);
        $status->setCheckedValue('true');
        $status->setUncheckedValue('false');
        $this->add($status);

        $button = new Button('entrar');
        $button->setLabel('Entrar');
        $button->setValue('Entrar');
        $this->add($button);
    }

}