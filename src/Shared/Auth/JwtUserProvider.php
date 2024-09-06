<?php

namespace App\Shared\Auth;

use Lexik\Bundle\JWTAuthenticationBundle\Security\User\JWTUser;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class JwtUserProvider implements UserProviderInterface
{

    public function refreshUser(UserInterface $user): UserInterface
    {
        throw new \Exception('Not supported.');
    }

    public function supportsClass(string $class): bool
    {
        return true;
    }

    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        return new JWTUser('', []);
    }
}