<?php declare(strict_types=1);
namespace App\Modules\ShortLink\Facade;

use App\Modules\_Shared\UseCase\InputUseCaseDTO;
use App\Modules\_Shared\UseCase\OutputUseCaseDTO;
use App\Modules\ShortLink\UseCase\ShortLinkUseCaseProps;

/**
 * Represents a short link facade implementation
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class ShortLinkFacadeImpl implements ShortLinkFacade {

    /**
     * @var App\Modules\Auth\UseCase\AddShortLinkUseCase\AddShortLinkUseCase
     */
    private $addShortLinkUseCase;

    /**
     * @var App\Modules\Auth\UseCase\AddShortLinkUseCase\UpdateShortLinkUseCase
     */
    private $updateShortLinkUseCase;

    /**
     * @var App\Modules\Auth\UseCase\AddShortLinkUseCase\FindShortLinkUseCase
     */
    private $findShortLinkUseCase;

    /**
     * @var App\Modules\Auth\UseCase\AddShortLinkUseCase\FindAllShortLinksUseCase
     */
    private $findAllShortLinksUseCase;

    /**
     * @var App\Modules\Auth\UseCase\AddShortLinkUseCase\DeleteShortLinkUseCase
     */
    private $deleteShortLinkUseCase;

    public function __construct(ShortLinkUseCaseProps $shortLinkUseCaseProps) {
        $this->addShortLinkUseCase = $shortLinkUseCaseProps->addUsecase;
        $this->updateShortLinkUseCase = $shortLinkUseCaseProps->updateUsecase;
        $this->findShortLinkUseCase = $shortLinkUseCaseProps->findUsecase;
        $this->findAllShortLinksUseCase = $shortLinkUseCaseProps->findAllUsecase;
        $this->deleteShortLinkUseCase = $shortLinkUseCaseProps->deleteUsecase;
    }

    /**
     * Execute a use case to add a new short link entity
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputUseCaseDTO $inputUseCaseDTO
     * @return void
     */
    public function create(InputUseCaseDTO $inputAddShortLinkUseCaseDTO): void {
        $this->addShortLinkUseCase->execute($inputAddShortLinkUseCaseDTO);
    }

    /**
     * Execute a use case to update a existing short link entity
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputUseCaseDTO $inputUseCaseDTO
     * @return void
     */
    public function update(InputUseCaseDTO $inputUpdateShortLinkUseCaseDTO): void {
        $this->updateShortLinkUseCase->execute($inputUpdateShortLinkUseCaseDTO);
    }

    /**
     * Execute a use case to find a existing short link entity
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputUseCaseDTO $inputUseCaseDTO
     * @return void
     */
    public function find(InputUseCaseDTO $inputFindShortLinkUseCaseDTO): OutputUseCaseDTO {
        return $this->findShortLinkUseCase->execute($inputFindShortLinkUseCaseDTO);
    }

    /**
     * Execute a use case to find all existing short links entities
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @return array
     */
    public function findAll(): array {
        return $this->findAllShortLinksUseCase->execute();
    }

    /**
     * Execute a use case to delete a existing short link entity
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputUseCaseDTO $inputUseCaseDTO
     * @return void
     */
    public function delete(InputUseCaseDTO $inputDeleteShortLinkUseCaseDTO): void {
        $this->deleteShortLinkUseCase->execute($inputDeleteShortLinkUseCaseDTO);
    }
}
