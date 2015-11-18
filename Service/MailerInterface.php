<?php

namespace Mechant\MailerBundle\Service;


interface MailerInterface
{

    /**
     * Sends the email using a given provider.
     * Throws an exception if setEmail
     * was not called previously.
     *
     * @return mixed
     * @throws \Mechant\MailerBundle\Exception\EmailMissingException
     */
    public function send();

    /**
     * @return \Mechant\MailerBundle\Wrapper\Mail
     */
    public function getEmail();

    /**
     * @param \Mechant\MailerBundle\Wrapper\Mail $email
     * @return $this
     */
    public function setEmail(\Mechant\MailerBundle\Wrapper\Mail $email);
}
