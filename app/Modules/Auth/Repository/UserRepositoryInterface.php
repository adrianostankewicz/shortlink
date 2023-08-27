<?php declare(strict_types=1);
namespace App\Modules\Auth\Repository;

use App\Modules\_Shared\Repository\RepositoryInterface;
use App\Modules\Auth\Entity\UserEntity;

/**
 * This interface define the actions to manipulate a user repository
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
interface UserRepositoryInterface extends RepositoryInterface {

    /**
     * Find user entity by email
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param string $email
     * @return UserEntity
     */
    public function findByEmail(string $email): UserEntity|null;
}
