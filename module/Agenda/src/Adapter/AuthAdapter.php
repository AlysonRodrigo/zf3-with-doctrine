<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 19/07/17
 * Time: 21:47
 */

namespace Agenda\Adapter;

use Doctrine\ORM\EntityManager;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;

class AuthAdapter implements AdapterInterface
{

    protected $em;
    protected $username;
    protected $password;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * Performs an authentication attempt
     *
     * @return \Zend\Authentication\Result
     * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface If authentication cannot be performed
     */
    public function authenticate()
    {
        $repository = $this->em->getRepository('Agenda\Entity\UserRepository');
        $user = $repository->findByEmailAndPassword($this->getUsername(),$this->getPassword());

        if($user)
            return new Result(Result::SUCCESS,['user' => $user],['ok']);
        else
            return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, []);
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


}