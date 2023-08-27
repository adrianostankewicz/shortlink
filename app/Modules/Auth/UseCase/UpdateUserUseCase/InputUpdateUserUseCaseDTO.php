<?php declare(strict_types=1);
namespace App\Modules\Auth\UseCase\UpdateUserUseCase;

use App\Modules\_Shared\UseCase\InputUseCaseDTO;

/**
 * Represents a user DTO input to update user use case
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class InputUpdateUserUseCaseDTO extends InputUseCaseDTO {

    /**
     * Create a new object of InputUpdateUserUseCaseDTO
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
        private string $email,
        private ?string $password = null,
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

    public function getPassword(): string|null {
        return $this->password;
    }
}
