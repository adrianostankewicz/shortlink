<?php declare(strict_types=1);
namespace App\Modules\ShortLink\Entity;

use App\Modules\_Shared\Entity\Entity;
use InvalidArgumentException;

/**
 * This class represents a short link entity
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class ShortLinkEntity extends Entity {

    /**
     * Create a new short link object
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param int|null $id
     * @param string $originalLink
     * @param string $identifier
     * @param integer $userId
     */
    public function __construct(
        private ?int $id,
        private string $originalLink,
        private string $identifier,
        private int $userId,
    ) {
        $this->validate();
    }

    /**
     * Validate the attributes
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @return boolean
     */
    public function validate(): bool {
        if(!is_null($this->id) && $this->id <= 0) {
            throw new InvalidArgumentException(__('auth.entity.shortlink.fields.id'));
        }

        if(empty($this->originalLink)) {
            throw new InvalidArgumentException(__('auth.entity.shortlink.fields.original_link'));
        }

        if(empty($this->identifier)) {
            throw new InvalidArgumentException(__('auth.entity.shortlink.fields.identifier'));
        }

        if(empty($this->userId) && $this->userId <= 0) {
            throw new InvalidArgumentException(__('auth.entity.shortlink.fields.user_id'));
        }

        return true;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getOriginalLink(): string {
        return $this->originalLink;
    }

    public function getIdentifier(): string {
        return $this->identifier;
    }

    public function getUserId(): int {
        return $this->userId;
    }
}
