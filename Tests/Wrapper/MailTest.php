<?php


namespace Mechant\MailerBundle\Tests\Wrapper;

use Mechant\MailerBundle\Wrapper\Mail;

class MailTest extends \PHPUnit_Framework_TestCase
{

    public function test_it_accepts_a_subject()
    {
        $mail = new Mail();
        $mail->setSubject('Test Email');

        $this->assertEquals('Test Email', $mail->getSubject());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function test_it_only_accepts_a_string_as_subject()
    {
        $mail = new Mail();
        $mail->setSubject(['I am an array' => true]);
    }

    public function test_it_accepts_a_from_email_address()
    {
        $mail = new Mail();
        $mail->setFrom('test@909c.fr');

        $this->assertEquals('test@909c.fr', $mail->getFrom());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function test_it_only_accepts_a_correct_email_as_from()
    {
        $mail = new Mail();
        $mail->setFrom('test909c.fr');
    }

    public function test_it_accepts_a_to_email_address()
    {
        $mail = new Mail();
        $mail->setTo('test@909c.fr');

        $this->assertEquals('test@909c.fr', $mail->getTo());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function test_it_only_accepts_a_correct_email_as_to()
    {
        $mail = new Mail();
        $mail->setTo('test909c.fr');
    }


    public function test_it_accepts_a_body()
    {
        $mail = new Mail();

        $body = '<h1>HTML Ipsum Presents</h1> <p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p><h2>Header Level 2</h2> <ol> <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li><li>Aliquam tincidunt mauris eu risus.</li></ol><blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote><h3>Header Level 3</h3><ul> <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li><li>Aliquam tincidunt mauris eu risus.</li></ul>';

        $mail->setBody($body);

        $this->assertEquals($body, $mail->getBody());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function test_it_only_accepts_a_string_as_body()
    {
        $mail = new Mail();
        $mail->setBody(['I am an array' => true]);
    }

    public function test_it_sets_its_content_from_a_template()
    {
        $mail = new Mail();

        $template = $this->getMockBuilder('\Mechant\MailerBundle\Template\TemplateInterface')
            ->disableOriginalConstructor()
            ->getMock();

        $template->method('getSubject')->willReturn('test subject');
        $template->method('getBody')->willReturn('test body');

        $mail->setFromTemplate($template);
    }
}
