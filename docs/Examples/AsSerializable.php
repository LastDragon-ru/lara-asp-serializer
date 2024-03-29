<?php declare(strict_types = 1);

// phpcs:disable PSR1.Files.SideEffects
// phpcs:disable PSR1.Classes.ClassDeclaration

namespace LastDragon_ru\LaraASP\Serializer\Docs\Examples\AsSerializable;

use Illuminate\Database\Eloquent\Model;
use LastDragon_ru\LaraASP\Dev\App\Example;
use LastDragon_ru\LaraASP\Serializer\Casts\AsSerializable;
use LastDragon_ru\LaraASP\Serializer\Contracts\Serializable;
use Override;

use function array_merge;

class UserSettings implements Serializable {
    public function __construct(
        public int $perPage,
        public bool $showSidebar,
    ) {
        // empty
    }
}

/**
 * @property UserSettings|null $settings
 */
class User extends Model {
    /**
     * @return array<array-key, mixed>
     */
    #[Override]
    protected function casts(): array {
        return array_merge(parent::casts(), [
            'settings' => AsSerializable::using(UserSettings::class),
        ]);
    }
}

$user           = new User();
$user->settings = new UserSettings(35, false);

Example::dump($user->settings);
Example::dump($user->getAttributes());
