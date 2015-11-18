Simple Mailer Bundle 
============
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/f391a5b9-4383-4fd9-b461-fd75a7e6b21d/big.png)](https://insight.sensiolabs.com/projects/f391a5b9-4383-4fd9-b461-fd75a7e6b21d)

A library agnostic mailer for Symfony 2. 

This bundle is basically an interface for Mailing Providers (Swift Mailer implementation is included OOTB), 
a simple Mail wrapper object and an interface for templates.

It is deliberately simple and barebone. I use it as a starting point for mailing in my projects. 
Use it and modify it as you please (or not, you do you).

Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require monsieurmechant/sf2-simple-mailer-bundle "*"
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            // ...

            new Mechant\SimpleMailer\SimpleMailerBundle(),
        ];

        // ...
    }

    // ...
}
```