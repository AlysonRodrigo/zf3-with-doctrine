<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 19/07/17
 * Time: 21:49
 */

namespace Agenda\Repository;


use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{

    public function findByEmailAndPassword($email, $password)
    {
        $user = $this->findOneByEmail($email);

        if($user)
        {
            if($password == $user->getSenha())
                return $user;
            else
                return false;
        }
        else
            return false;
    }

}