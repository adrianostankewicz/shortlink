<?php declare(strict_types=1);
namespace App\Modules\Auth\Entity;

use DateTime;
use InvalidArgumentException;
use App\Modules\_Shared\Entity\Entity;

/**
 * This class represents a user entity
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class UserEntity extends Entity {

    /**
     * Create a new user object
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param string $name
     * @param string $email
     * @param string $password
     * @param DateTime|null $createdAt
     * @param DateTime|null $updatedAt
     * @param integer|null $id
     */
    public function __construct(
        private ?int $id,
        private string $name,
        private string $email,
        private ?string $password,
        private ?DateTime $createdAt = null,
        private ?DateTime $updatedAt = null,
    )
    {
        $this->validate();
    }

    /**
     * Validation of entity attributes
     *
     * @return boolean|InvalidArgumentException
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     */
    private function validate(): bool|InvalidArgumentException {
        if(!is_null($this->id) && $this->id <= 0) {
            throw new InvalidArgumentException(__('auth.entity.user.fields.id'));
          }

          if(empty($this->name)) {
            throw new InvalidArgumentException(__('auth.entity.user.fields.name'));
          }

          if(empty($this->email)) {
            throw new InvalidArgumentException(__('auth.entity.user.fields.email'));
          }

          if(empty($this->password)) {
            throw new InvalidArgumentException(__('auth.entity.user.fields.password'));
          }

          return true;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function changePassword(string $password): void {
        $this->password = $password;
    }
}
