<?php declare(strict_types=1);
namespace App\Modules\_Shared\Repository;

use App\Modules\_Shared\Entity\Entity;

/**
 * This interface represents all required methods of repository
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
interface RepositoryInterface {

    /**
     * @param Entity $entity
     * @return void
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     */
    public function add(Entity $entity): void;

    /**
     * @param Entity $entity
     * @return void
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     */
    public function update(Entity $entity): void;

    /**
     * @param int $id
     * @return Entity
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     */
    public function find(int $id): Entity|null;

    /**
     * @return array
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     */
    public function remove(int $id): void;
}
