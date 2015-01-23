TxtLocal Wrapper
========================

This is just a Symfony Bundle Wrapper for [Text Local](http://www.textlocal.com/) with a bit of configuration.

Installation
============
In your `composer.json` file, add:
``` json
{
    "require": {
        "flotz/txtlocal" : "dev-master"
    }
}
```

In your `app/AppKernel.php` file, add:
``` php
{
    ...
    new Flotz\TxtLocalBundle\FlotzTxtLocalBundle(),
    ...
}
```

In your `app/config/config.yml`:
```yml
flotz_txt_local:
    username: your@email.com
    hash: "hash key here as provided by TextLocal"
    test: false # This is optional (default is true)
    apiKey: "api key here as provided by TextLocal" # This is optional
```

Then update your composer:

``` bash
$ composer update
```

Usage
============
From a symfony controller:
```php

    // Note: $number could be a simple mobile number:
    $number     = '447123123123';

    // or a comma separated serie of numbers:
    $number     = '447123123123, 447500400600';

    // or an array of numbers:
    $number     = array('447123123123', '447500400600');

    // $message is the content of the received SMS
    $message    = 'Thank you for using this bundle';

    // $sender is the name that will appear as a sender
    $sender     = 'Florent';

    $this->get('flotz_txtlocal')->sendSms($number, $message, $sender);
    $balance = $this->get('flotz_txtlocal')->getBalance();
```
