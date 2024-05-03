<?php declare(strict_types = 1);

namespace LastDragon_ru\LaraASP\Serializer\Testing\Package;

use LastDragon_ru\LaraASP\Core\Provider as CoreProvider;
use LastDragon_ru\LaraASP\Serializer\Provider;
use LastDragon_ru\LaraASP\Testing\Package\TestCase as PackageTestCase;
use Override;

use function array_merge;

/**
 * @internal
 */
abstract class TestCase extends PackageTestCase {
    /**
     * @inheritDoc
     */
    #[Override]
    protected function getPackageProviders(mixed $app): array {
        return array_merge(parent::getPackageProviders($app), [
            CoreProvider::class,
            Provider::class,
        ]);
    }
}
