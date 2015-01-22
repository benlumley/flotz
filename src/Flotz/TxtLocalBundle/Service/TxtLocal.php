<?php

namespace Flotz\TxtLocalBundle\Service;

use Symfony\Component\HttpKernel\Kernel;

use Flotz\lib\Textlocal;

class TxtLocal
{
    private $txtLocal;

    public function __construct(Kernel $kernel)
    {
        $username = $kernel->getContainer()->getParameter('flotz_txtlocal_username');
        $hash = $kernel->getContainer()->getParameter('flotz_txtlocal_hash');
        $apiKey = $kernel->getContainer()->getParameter('flotz_txtlocal_apiKey');
        $this->test = $kernel->getContainer()->getParameter('flotz_txtlocal_test');

        $this->txtLocal = new Textlocal($username, $hash, $apiKey);
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
