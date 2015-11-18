<?php

namespace Mechant\MailerBundle\Tests\Service\Gateway;

use Mechant\MailerBundle\Service\Gateway\SwiftMailer;

class SwiftMailerTest extends \PHPUnit_Framework_TestCase
{

    protected $swifMailer;
    protected $email;

    public function __construct()
    {
        $this->swifMailer = $this->getMockBuilder('\Swift_Mailer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->email = $this->getMockBuilder('\Mechant\MailerBundle\Wrapper\Mail')
            ->getMock();
    }

    public function test_it_accepts_a_mail_object()
    {
        $mailer = new SwiftMailer($this->swifMailer);

        $mailer->setEmail($this->email);

        $this->assertInstanceOf('\Mechant\MailerBundle\Wrapper\Mail', $mailer->getEmail());
    }

    public function test_it_sends_an_email_through_swiftMailer()
    {
        $mailer = new SwiftMailer($this->swifMailer);

        $this->swifMailer->expects($this->once())->method('send');

        $mailer->setEmail($this->email)->send();
    }

    /**
     * @expectedException \Mechant\MailerBundle\Exception\EmailMissingException
     */
    public function test_it_sends_an_email_missing_exception_when_send_is_called_before_setEmail()
    {
        $mailer = new SwiftMailer($this->swifMailer);

        $mailer->send();
    }
}
