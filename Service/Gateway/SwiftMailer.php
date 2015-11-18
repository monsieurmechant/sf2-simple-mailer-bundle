<?php
namespace Mechant\MailerBundle\Service\Gateway;

use Mechant\MailerBundle\Exception\EmailMissingException;
use Mechant\MailerBundle\Service\MailerInterface;
use Mechant\MailerBundle\Wrapper\Mail;

class SwiftMailer implements MailerInterface
{

    /** @var Mail $email */
    private $email;
    /** @var \Swift_Mailer $mailer */
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Sends the email using a given provider.
     * Throws an exception if setEmail
     * was not called previously.
     *
     * @return mixed
     * @throws \Mechant\MailerBundle\Exception\EmailMissingException
     */
    public function send() {
        if ($this->email instanceof Mail) {
            $message = \Swift_Message::newInstance()
                ->setSubject($this->email->getSubject())
                ->setFrom($this->email->getFrom())
                ->setTo($this->email->getTo())
                ->setBody($this->email->getBody(), 'text/html');

            return $this->mailer->send($message);
        }

        throw new EmailMissingException();
    }

    /**
     * @return Mail
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param Mail $email
     * @return $this
     */
    public function setEmail(Mail $email)
    {
        $this->email = $email;

        return $this;
    }

}
