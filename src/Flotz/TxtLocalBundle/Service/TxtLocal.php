<?php

namespace Flotz\TxtLocalBundle\Service;

use Symfony\Component\HttpKernel\Kernel;

use Flotz\lib\Textlocal;

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

        $this->txtLocal = new Textlocal($username, $hash, $apiKey);
    }

    /**
     * Get last request's parameters
     * @return array
     */
    public function getLastRequest() {
        return $this->txtLocal->getLastRequest();
    }

    /**
     * Send an SMS
     * @param $numbers  array of numbers|comma separated numbers
     * @param $message  string
     * @param $sender   string
     * @return array
     * @throws Exception
     */
    public function sendSms($numbers, $message, $sender)
    {
        if(!is_array($numbers)) {
            $numbers = array_map('trim', explode(',', $numbers));
        }
        return $this->txtLocal->sendSms($numbers, $message, $sender, null, $this->test);
    }

    /**
     * Send an SMS to a Group of contacts - group IDs can be retrieved from getGroups()
     * @param $groupId
     * @param $message
     * @param null $sender
     * @return array|mixed
     * @throws Exception
     */
    public function sendSmsGroup($groupId, $message, $sender = null)
    {
        return $this->txtLocal->sendSmsGroup($groupId, $message, $sender, null, $this->test);
    }

    /**
     * Send an MMS to a one or more contacts
     * @param $numbers  array of numbers|comma separated numbers
     * @param $fileSource - either an absolute or relative path, or http url to a file.
     * @param $message
     * @return array|mixed
     * @throws Exception
     */
    public function sendMms($numbers, $fileSource, $message)
    {
        if(!is_array($numbers)) {
            $numbers = array_map('trim', explode(',', $numbers));
        }
        return $this->txtLocal->sendMms($numbers, $fileSource, $message, null, $this->test);
    }

    /**
     * Send an MMS to a group - group IDs can be
     * @param $groupId
     * @param $fileSource
     * @param $message
     * @return array|mixed
     * @throws Exception
     */
    public function sendMmsGroup($groupId, $fileSource, $message)
    {
        return $this->txtLocal->sendMmsGroup($groupId, $fileSource, $message, null, $this->test);
    }

    /**
     * Get Credit Balances
     * @return array with keys `sms`, `mms`
     */
    public function getBalance()
    {
        return $this->txtLocal->getBalance();
    }

    /**
     * In case you want to access the whole txtlocal API
     * @return txtlocal
     */
    public function getLib()
    {
        return $this->txtLocal;
    }
}
