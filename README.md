# Entity datetime

[![Build Status](https://travis-ci.org/joubertredrat/entity-datetime.svg?branch=master)](https://travis-ci.org/joubertredrat/entity-datetime)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/joubertredrat/entity-datetime/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/joubertredrat/entity-datetime/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/joubertredrat/entity-datetime/badges/build.png?b=master)](https://scrutinizer-ci.com/g/joubertredrat/entity-datetime/build-status/master)

Trait for easy manage useful datetime in entities.

#### Install

Install by composer

```
composer require redrat/entity-datetime
```

#### Usage

##### With Doctrine

1 - Add trait in your Entity

```php
<?php

use RedRat\Entity\DateTimeTrait;

class Foo
{
    use DateTimeTrait;
}
```

2 - Set `lifecycleCallbacks` in your Doctrine configuration, like example below:

```yaml
    fields:
        createdAt:
            type: datetime
        updatedAt:
            type: datetime
            nullable: true
            
    lifecycleCallbacks:
        prePersist: [ forgeCreatedAt ]
        preUpdate: [ forgeUpdatedAt ]
```

Note: More about lifecycle callbacks in Doctrine [documentation](https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/events.html#lifecycle-callbacks).

#### TODO

* API documentation.
