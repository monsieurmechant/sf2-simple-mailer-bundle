<?php

namespace Mechant\MailerBundle\Template;


interface TemplateInterface
{

    /**
     * Sets the custom content/variables that are
     * used in the current template view file.
     *
     * @param array $arguments
     * @return $this
     */
    public function setArguments($arguments);

    /**
     * Returns an evaluated template
     * as a string.
     *
     * @return string
     */
    public function getBody();

    /**
     * Returns the template title
     * as a string.
     *
     * @return string
     */
    public function getSubject();

}
