<?php declare(strict_types=1);
namespace App\Modules\_Shared\Facade;

use App\Modules\_Shared\UseCase\InputUseCaseDTO;
use App\Modules\_Shared\UseCase\OutputUseCaseDTO;

/**
 * Represents a facade to execute the use cases
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
interface FacadeInterface {

    /**
     * Create a new entity in the application
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputUseCaseDTO $inputUseCaseDTO
     * @return void
     */
    public function create(InputUseCaseDTO $inputUseCaseDTO): void;

    /**
     * Update a existing entity in the application
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputUseCaseDTO $inputUseCaseDTO
     * @return void
     */
    public function update(InputUseCaseDTO $inputUseCaseDTO): void;

    /**
     * Find a existing entity in the application
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputUseCaseDTO $inputUseCaseDTO
     * @return OutputUseCaseDTO
     */
    public function find(InputUseCaseDTO $inputUseCaseDTO): OutputUseCaseDTO;

    /**
     * Find all existing entities in the application
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @return array
     */
    public function findAll(): array;

    /**
     * Delete a existing entity in the application
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputUseCaseDTO $inputUseCaseDTO
     * @return void
     */
    public function delete(InputUseCaseDTO $inputUseCaseDTO): void;
}
