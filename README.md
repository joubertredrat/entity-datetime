# Entity datetime

Trait for easy manage useful datetime in entities.

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
    lifecycleCallbacks:
        prePersist: [ forgeCreatedAt ]
        preUpdate: [ forgeUpdatedAt ]
```

Note: More about lifecycle callbacks in Doctrine [documentation](https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/events.html#lifecycle-callbacks).

#### TODO

* API documentation.