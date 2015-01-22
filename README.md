TxtLocal Wrapper
========================

This is just a wrapper for [Text Local](http://www.textlocal.com/) with a bit of configuration.

Installation
============
Update your `composer.json` file and add:

``` json
{
    "require": {
        "flotz/txtlocal" : "dev-master"
    }
}
```

then update your composer:

``` bash
$ composer update
```

Configuration
============
In your config.yml:

```yml
flotz_txt_local:
    username: your@email.com
    hash: "hash key here as provided by TextLocal"
    test: false # This is optional (default is true)
    apiKey: "api key here as provided by TextLocal" # This is optional
```

Usage
============
From a controller:
```php
  $this->get('flotz_txtlocal')->sendSms($number, $message, $sender);
  $balance = $this->get('flotz_txtlocal')->getBalance();
```
