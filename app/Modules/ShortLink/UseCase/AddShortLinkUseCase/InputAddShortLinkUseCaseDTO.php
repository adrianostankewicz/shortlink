<?php declare(strict_types=1);
namespace App\Modules\ShortLink\UseCase\AddShortLinkUseCase;

use App\Modules\_Shared\UseCase\InputUseCaseDTO;

/**
 * Represents a short link DTO input add short link use case
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class InputAddShortLinkUseCaseDTO extends InputUseCaseDTO {

    /**
     * Create a new object of InputAddShortLinkUseCaseDTO
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param string $originalLink
     * @param string $identifier
     * @param int $userId
     */
    public function __construct(
        private string $originalLink,
        private string $identifier,
        private int $userId,
    ) {}

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
