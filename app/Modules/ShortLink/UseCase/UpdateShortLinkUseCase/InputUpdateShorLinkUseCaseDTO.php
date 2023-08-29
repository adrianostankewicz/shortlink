<?php declare(strict_types=1);
namespace App\Modules\ShortLink\UseCase\UpdateShortLinkUseCase;

use App\Modules\_Shared\UseCase\InputUseCaseDTO;

/**
 * Represents a short link DTO input to update short link use case
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class InputUpdateShortLinkUseCaseDTO extends InputUseCaseDTO {

    /**
     * Create a new object of InputUpdateShortLinkUseCaseDTO
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param int $id
     * @param string $originalLink
     * @param string $identifier
     * @param int $userId
     */
    public function __construct(
        private int $id,
        private string $originalLink,
        private string $identifier,
        private int $userId,
    ) {}

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
