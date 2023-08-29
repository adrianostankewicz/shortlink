<?php declare(strict_types=1);
namespace App\Modules\Auth\Facade;

use App\Modules\Auth\UseCase\UserUseCaseProps;
use App\Modules\_Shared\UseCase\InputUseCaseDTO;
use App\Modules\_Shared\UseCase\OutputUseCaseDTO;

/**
 * Represents a user facade implementation
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class UserFacadeImpl implements UserFacade {

    /**
     * @var App\Modules\Auth\UseCase\AddUserUseCase\AddUserUseCase
     */
    private $addUserUseCase;

    /**
     * @var App\Modules\Auth\UseCase\AddUserUseCase\UpdateUserUseCase
     */
    private $updateUserUseCase;

    /**
     * @var App\Modules\Auth\UseCase\AddUserUseCase\FindUserUseCase
     */
    private $findUserUseCase;

    /**
     * @var App\Modules\Auth\UseCase\AddUserUseCase\FindAllUsersUseCase
     */
    private $findAllUsersUseCase;

    /**
     * @var App\Modules\Auth\UseCase\AddUserUseCase\DeleteUserUseCase
     */
    private $deleteUserUseCase;

    public function __construct(UserUseCaseProps $userUseCaseProps) {
        $this->addUserUseCase = $userUseCaseProps->addUsecase;
        $this->updateUserUseCase = $userUseCaseProps->updateUsecase;
        $this->findUserUseCase = $userUseCaseProps->findUsecase;
        $this->findAllUsersUseCase = $userUseCaseProps->findAllUsecase;
        $this->deleteUserUseCase = $userUseCaseProps->deleteUsecase;
    }

    /**
     * Execute a use case to add a new user entity
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputUseCaseDTO $inputUseCaseDTO
     * @return void
     */
    public function create(InputUseCaseDTO $inputAddUserUseCaseDTO): void {
        $this->addUserUseCase->execute($inputAddUserUseCaseDTO);
    }

    /**
     * Execute a use case to update a existing user entity
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputUseCaseDTO $inputUseCaseDTO
     * @return void
     */
    public function update(InputUseCaseDTO $inputUpdateUserUseCaseDTO): void {
        $this->updateUserUseCase->execute($inputUpdateUserUseCaseDTO);
    }

    /**
     * Execute a use case to find a existing user entity
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputUseCaseDTO $inputUseCaseDTO
     * @return void
     */
    public function find(InputUseCaseDTO $inputFindUserUseCaseDTO): OutputUseCaseDTO {
        return $this->findUserUseCase->execute($inputFindUserUseCaseDTO);
    }

    /**
     * Execute a use case to find all existing users entities
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @return array
     */
    public function findAll(): array {
        return $this->findAllUsersUseCase->execute();
    }

    /**
     * Execute a use case to delete a existing user entity
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputUseCaseDTO $inputUseCaseDTO
     * @return void
     */
    public function delete(InputUseCaseDTO $inputDeleteUserUseCaseDTO): void {
        $this->deleteUserUseCase->execute($inputDeleteUserUseCaseDTO);
    }
}
