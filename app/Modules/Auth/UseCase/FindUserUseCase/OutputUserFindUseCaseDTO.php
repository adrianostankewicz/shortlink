<?php declare(strict_types=1);
namespace App\Modules\Auth\UseCase\FindUserUseCase;

use App\Modules\_Shared\UseCase\OutputUseCaseDTO;

/**
 * Represents a user DTO output find a user use case
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class OutputFindUserUseCaseDTO extends OutputUseCaseDTO {

    /**
     * Create a new object of OutputFindUserUseCaseDTO
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function __construct(
        private int $id,
        private string $name,
        private string $email
    ) {}

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }
}
