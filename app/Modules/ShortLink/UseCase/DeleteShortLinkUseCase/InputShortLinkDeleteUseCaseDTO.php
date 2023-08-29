<?php declare(strict_types=1);
namespace App\Modules\ShortLink\UseCase\DeleteUserUseCase;

use App\Modules\_Shared\UseCase\InputUseCaseDTO;

/**
 * Represents a short link DTO input to delete a short link use case
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class InputShortLinkDeleteUseCaseDTO extends InputUseCaseDTO {

    /**
     * Create a new object of InputShortLinkDeleteUseCaseDTO
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
