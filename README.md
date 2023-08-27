# Serializer

This package provides a customizable wrapper around the [Symfony Serializer Component](https://symfony.com/doc/current/components/serializer.html).

[include:exec]: <../../dev/artisan lara-asp-documentator:requirements>
[//]: # (start: 48d8d2e1d13d5a77021bfa28fdd9623872f525d5)
[//]: # (warning: Generated automatically. Do not edit.)

# Requirements

| Requirement  | Constraint          | Supported by |
|--------------|---------------------|------------------|
|  PHP  | `^8.2` |  `HEAD`  ,  `5.0.0-beta.0`   |
|  | `^8.1` |  `HEAD`  ,  `5.0.0-beta.0`   |
|  Laravel  | `^10.0.0` |  `HEAD`  ,  `5.0.0-beta.0`   |
|  | `^9.21.0` |  `HEAD`   |
|  | `^9.0.0` |  `5.0.0-beta.0`   |

[//]: # (end: 48d8d2e1d13d5a77021bfa28fdd9623872f525d5)

# Installation

```shell
composer require lastdragon-ru/lara-asp-serializer
```

# Usage

[include:example]: ./docs/Examples/Usage.php
[//]: # (start: 541223f68a5167a71033c91e18d5ca4062e3c768)
[//]: # (warning: Generated automatically. Do not edit.)

```php
<?php declare(strict_types = 1);

// phpcs:disable PSR1.Files.SideEffects
// phpcs:disable PSR1.Classes.ClassDeclaration

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Date;
use LastDragon_ru\LaraASP\Dev\App\Example;
use LastDragon_ru\LaraASP\Serializer\Contracts\Serializable;
use LastDragon_ru\LaraASP\Serializer\Contracts\Serializer;

class User implements Serializable {
    public function __construct(
        public int $id,
        public string $name,
        public DateTimeInterface $created,
    ) {
        // empty
    }
}

$user         = new User(1, 'User', Date::make('2023-08-27T08:30:44.473+00:00'));
$serializer   = Container::getInstance()->make(Serializer::class);
$serialized   = $serializer->serialize($user);
$deserialized = $serializer->deserialize(User::class, $serialized);

Example::dump($serialized);
Example::dump($deserialized);
```

The `$serialized` is:

```plain
"{"id":1,"name":"User","created":"2023-08-27T08:30:44.473+00:00"}"
```

The `$deserialized` is:

```plain
User {#808
  +id: 1
  +name: "User"
  +created: Illuminate\Support\Carbon @1693125044 {#806
    #endOfTime: false
    #startOfTime: false
    #constructedObjectId: "00000000000003260000000000000000"
    #localMonthsOverflow: null
    #localYearsOverflow: null
    #localStrictModeEnabled: null
    #localHumanDiffOptions: null
    #localToStringFormat: null
    #localSerializer: null
    #localMacros: null
    #localGenericMacros: null
    #localFormatFunction: null
    #localTranslator: null
    #dumpProperties: [
      "date",
      "timezone_type",
      "timezone",
    ]
    #dumpLocale: null
    #dumpDateProperties: null
    date: 2023-08-27 08:30:44.473 +00:00
  }
}
```

[//]: # (end: 541223f68a5167a71033c91e18d5ca4062e3c768)

# Extending

Out of the box, the package supports only the following objects (see [`Factory`](./src/Factory.php) for more details):

* Any object that implement [`Serializable`](./src/Contracts/Serializable.php) (see [`SerializableNormalizer`](./src/Normalizers/SerializableNormalizer.php))
* Any object that implement `\DateTimeInterface` (see [`DateTimeNormalizer`](./src/Normalizers/DateTimeNormalizer.php))
* `\DateTimeZone`
* `\DateInterval`

Publish the config and add normalizers/denormalizers if you need more:

```shell
php artisan vendor:publish --provider=LastDragon_ru\\LaraASP\\Serializer\\Provider --tag=config
```

[include:file]: ../../docs/shared/Contributing.md
[//]: # (start: 777f7598ee1b1a8c8fe67be6a3b7fce78a6e687e)
[//]: # (warning: Generated automatically. Do not edit.)

# Contributing

This package is the part of Awesome Set of Packages for Laravel. Please use the [main repository](https://github.com/LastDragon-ru/lara-asp) to [report issues](https://github.com/LastDragon-ru/lara-asp/issues), send [pull requests](https://github.com/LastDragon-ru/lara-asp/pulls), or [ask questions](https://github.com/LastDragon-ru/lara-asp/discussions).

[//]: # (end: 777f7598ee1b1a8c8fe67be6a3b7fce78a6e687e)
