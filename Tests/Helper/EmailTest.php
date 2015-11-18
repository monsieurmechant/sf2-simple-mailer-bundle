<?php
namespace Mechant\MailerBundle\Tests\Helper;

use Mechant\MailerBundle\Helper\Email;

class EmailTest extends \PHPUnit_Framework_TestCase
{

    public function test_it_returns_true_on_valid_email_address()
    {
        $emailHelper = new Email();

        $validEmails = [
            'email@example.com',
            'firstname.lastname@example.com',
            'email@subdomain.example.com',
            'firstname+lastname@example.com',
            '1234567890@example.com',
            'email@example-one.com',
            '_______@example.com',
            'email@example.name',
            'email@example.museum',
            'email@example.co.jp',
            'firstname-lastname@example.com',
        ];

        foreach ($validEmails as $email) {
            $this->assertTrue($emailHelper->isEmailAddressValid($email), $email . ' was not considered valid.');
        }
    }

    public function test_it_returns_false_on_invalid_email_address()
    {
        $emailHelper = new Email();

        $invalidEmails = [
            'plainaddress',
            '#@%^%#$@#$@#.com',
            '@example.com',
            'Joe Smith <email@example.com>',
            'email.example.com',
            'email@example@example.com',
            '.email@example.com',
            'email.@example.com',
            'email..email@example.com',
            'あいうえお@example.com',
            'email@example.com (Joe Smith)',
            'email@example',
            'email@-example.com',
            'email@111.222.333.44444',
            'email@example..com',
            'Abc..123@example.com',
            '"(),:;<>[\]@example.com',
            'just"not"right@example.com',
            'this\ is\"really\"not\\\\allowed@example.com',
            123456789,
            true,
            false
        ];

        foreach ($invalidEmails as $email) {
            $this->assertFalse($emailHelper->isEmailAddressValid($email), $email . ' was considered valid.');
        }
    }
}
