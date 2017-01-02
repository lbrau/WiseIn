<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wise\OwnerBundle\Provider;

use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface as SecurityUserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface
{
    private $userManager;

    public function __construct($userManager)
    {
        $this->userManager = $userManager;
    }

    public function loadUserByUsername($username)
    {
        $userRepo = $this->userManager->getRepository("wiseOwnerBundle:Proprietaire");
        /** @var UserInterface $user */
        $user = $userRepo->findOneBy(array('username' => $username));
//        dump($user);
        if (null == $user) {
            $customerRepo = $this->userManager->getRepository("wiseOwnerBundle:Locataire");
            /** @var UserInterface $user */
//            dump('dans le if du provider', $customerRepo);
            $user = $customerRepo->findOneBy(array('username' => $username));
        }
//        dump('sonde load  2 user', $user);

        return $user;
    }

    public function refreshUser(SecurityUserInterface $user)
    {
        // TODO il faut trouver une solution car on a un probleme les roles ne correspondent pas avec le cahrgement BD.
        $user = $this->loadUserByUsername($user->getUsername());
//        dump('sonde refresh  2 user', $user, $user->getRoles());

        return $user;
    }

    public function supportsClass($class)
    {

    }

    public function __toString()
    {
        return "toString du provider";
    }
}
