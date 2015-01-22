<?php

namespace Flotz\TxtLocalBundle\Service;

use Symfony\Component\HttpKernel\Kernel;

use Flotz\lib\textlocal;

class TxtLocal
{
    private $txtLocal;

    public function __construct(Kernel $kernel)
    {
        $container  = $kernel->getContainer();
        $username   = $container->getParameter('flotz_txt_local_username');
        $hash       = $container->getParameter('flotz_txt_local_hash');
        $apiKey     = $container->getParameter('flotz_txt_local_apiKey');
        $this->test = $container->getParameter('flotz_txt_local_test');

        $this->txtLocal = new textlocal($username, $hash, $apiKey);
    }

    public function sendSms($numbers, $message, $sender)
    {
        return $this->txtLocal->sendSms($numbers, $message, $sender, null, $this->test);
    }

    public function sendMms($numbers, $fileSource, $message)
    {
        return $this->txtLocal->sendMms($numbers, $fileSource, $message, null, $this->test);
    }
}
