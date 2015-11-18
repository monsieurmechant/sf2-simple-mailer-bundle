<?php


namespace Mechant\MailerBundle\Wrapper;


use Mechant\MailerBundle\Helper\Email;
use Mechant\MailerBundle\Template\TemplateInterface;

class Mail
{

    private $subject;
    private $from;
    private $to;
    private $body;

    /**
     * @param string $subject
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setSubject($subject)
    {
        if (is_string($subject)) {
            $this->subject = $subject;

            return $this;
        }

        throw new \InvalidArgumentException('The subject should be string.');

    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $from
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setFrom($from)
    {
        if (is_string($from) && Email::isEmailAddressValid($from)) {
            $this->from = $from;
            return $this;
        }

        throw new \InvalidArgumentException('Incorrect email address given.');
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param string $to
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setTo($to)
    {
        if (is_string($to) && Email::isEmailAddressValid($to)) {
            $this->to = $to;
            return $this;
        }

        throw new \InvalidArgumentException('Incorrect email address given.');
    }


    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setBody($body)
    {
        if (is_string($body)) {
            $this->body = $body;

            return $this;
        }

        throw new \InvalidArgumentException('The body should be string.');
    }

    /**
     * Sets the email body and subject
     * from a pre-defined template.
     *
     * @param TemplateInterface $template
     * @return $this
     */
    public function setFromTemplate(TemplateInterface $template)
    {
        $this->setSubject($template->getSubject());
        $this->setBody($template->getBody());

        return $this;
    }

}
