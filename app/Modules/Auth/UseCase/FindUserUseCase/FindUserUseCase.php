<?php declare(strict_types=1);
namespace App\Modules\Auth\UseCase\FindUserUseCase;

use App\Exceptions\UseCaseException;
use App\Modules\_Shared\UseCase\InputUseCaseDTO;
use App\Infrastructure\Auth\Eloquent\Repository\UserRepository;
use App\Modules\_Shared\UseCase\OutputUseCaseDTO;
use App\Modules\_Shared\UseCase\UseCaseWithInputAndOutputInterface;

/**
 * This class represents a Use Case to find a user in the application.
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class FindUserUseCase implements UseCaseWithInputAndOutputInterface {

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
     * Execute the Use Case to find a existing user
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputFindUserUseCaseDTO $inputIdUser
     * @return OutputFindUserUseCaseDTO
     */
    public function execute(InputUseCaseDTO $inputUser): OutputUseCaseDTO|null {
        if(!$inputUser instanceof InputFindUserUseCaseDTO){
            throw new UseCaseException(
                __('auth.usecase.user.params',
                    ['class' => 'InputFindUserUseCaseDTO']
                )
            );
        }

        $user = $this->userRepository->find($inputUser->getId());

        if(is_null($user)){
            return null;
        }

        return new OutputFindUserUseCaseDTO(
            $user->getId(),
            $user->getName(),
            $user->getEmail()
        );
    }
}
