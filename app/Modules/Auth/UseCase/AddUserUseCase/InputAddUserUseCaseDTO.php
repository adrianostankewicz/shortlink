<?php declare(strict_types=1);
namespace App\Modules\Auth\UseCase\AddUserUseCase;

use App\Modules\_Shared\UseCase\InputUseCaseDTO;

/**
 * Represents a user DTO input add user use case
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class InputAddUserUseCaseDTO extends InputUseCaseDTO {

    /**
     * Create a new object of InputAddUserUseCaseDTO
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function __construct(
        private string $name,
        private string $email,
        private string $password,
    ) {}

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }
}
