<?php declare(strict_types=1);
namespace App\Modules\Auth\UseCase\FindAllUsersUseCase;

use App\Modules\_Shared\UseCase\UseCaseInterface;
use App\Infrastructure\Auth\Eloquent\Repository\UserRepository;
use App\Modules\Auth\UseCase\FindAllUsersUseCase\OutputFindAllUsersUseCaseDTO;

/**
 * This class represents a Use Case to find all users in the application.
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class FindAllUserUseCase implements UseCaseInterface {

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository) {
      $this->userRepository = $userRepository;
    }

    /**
     * Execute the Use Case to find all existing short links
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @return array
     */
    public function execute(): array {
        $users = $this->userRepository->findAll();

        $entities = array();
        if(count($users) > 0) {
            foreach($users as $user) {
                $userEntity = new OutputFindAllUsersUseCaseDTO(
                    $user->getId(),
                    $user->getName(),
                    $user->getEmail()
                );

                array_push($entities, $userEntity);
            }
        }
        return $entities;
    }
}
