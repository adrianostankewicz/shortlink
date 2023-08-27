<?php declare(strict_types=1);
namespace App\Modules\Auth\UseCase\DeleteUserUseCase;

use App\Modules\_Shared\UseCase\InputUseCaseDTO;

/**
 * Represents a user DTO input to delete a user use case
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class InputUserDeleteUseCaseDTO extends InputUseCaseDTO {

    /**
     * Create a new object of InputUserDeleteUseCaseDTO
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param int $id
     */
    public function __construct(
        private int $id,
    ) {}

    public function getId(): int {
        return $this->id;
    }
}
