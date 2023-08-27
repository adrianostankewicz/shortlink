<?php declare(strict_types=1);
namespace App\Modules\Auth\Factory;

use App\Modules\Auth\Facade\UserFacadeImpl;
use App\Modules\Auth\UseCase\UserUseCaseProps;
use App\Modules\Auth\UseCase\AddUserUseCase\AddUserUseCase;
use App\Modules\Auth\UseCase\FindUserUseCase\FindUserUseCase;
use App\Modules\Auth\UseCase\DeleteUserUseCase\DeleteUserUseCase;
use App\Modules\Auth\UseCase\UpdateUserUseCase\UpdateUserUseCase;
use App\Modules\Auth\UseCase\FindAllUsersUseCase\FindAllUsersUseCase;
use App\Infrastructure\Auth\Eloquent\Repository\UserRepository;

/**
 * User Factory to create a methods to manipulate a User Entity in the application
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class UserFactory {

    /**
     * Create the objects responsible for manipulating the user
     *
     * @return void
     */
    public static function create() {
    $repository = new UserRepository();
    $addUsecase = new AddUserUseCase($repository);
    $updateUsecase = new UpdateUserUseCase($repository);
    $findUsecase = new FindUserUseCase($repository);
    $findAllUsecase = new FindAllUsersUseCase($repository);
    $deleteUsecase = new DeleteUserUseCase($repository);
    $facade = new UserFacadeImpl(
        new UserUseCaseProps(
        $addUsecase,
        $updateUsecase,
        $findUsecase,
        $findAllUsecase,
        $deleteUsecase
        )
    );

    return $facade;
    }
}
