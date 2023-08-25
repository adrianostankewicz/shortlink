<?php declare(strict_types=1);
namespace App\Modules\Auth\Entity;

use DateTime;
use InvalidArgumentException;

/**
 * This class represents a user entity
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class User {

    /**
     * Create a new user object
     * @param string $name
     * @param string $email
     * @param string $password
     * @param DateTime|null $createdAt
     * @param DateTime|null $updatedAt
     * @param integer|null $id
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     */
    public function __construct(
        private string $name,
        private string $email,
        private string $password,
        private ?DateTime $createdAt = null,
        private ?DateTime $updatedAt = null,
        private ?int $id = null,
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
        if(!empty($this->id) && $this->id <= 0) {
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
