<?php

namespace App\Service;

use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RequestStack;

class ExampleService
{
    public function __construct(
        private Security $security,
        RequestStack $requestStack
    ){
    }

    public function someMethod(){
        $request = $this->requestStack->getCurrentRequest();
        $firewallName = $this->security->getFirewallConfig($request)?->getName();
    }
}