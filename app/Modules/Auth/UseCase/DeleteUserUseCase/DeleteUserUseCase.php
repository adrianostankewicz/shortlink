<?php declare(strict_types=1);
namespace App\Modules\Auth\UseCase\DeleteUserUseCase;

use App\Exceptions\UseCaseException;
use App\Modules\_Shared\UseCase\InputUseCaseDTO;
use App\Modules\_Shared\UseCase\UseCaseWithInputInterface;
use App\Infrastructure\Auth\Eloquent\Repository\UserRepository;

/**
 * This class represents a Use Case to delete a user in the application.
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class DeleteUserUseCase implements UseCaseWithInputInterface {

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
     * Execute the Use Case to delete a existing user
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputUserDeleteUseCaseDTO $input
     * @return void
     * @throws UseCaseException
     */
    public function execute(InputUseCaseDTO $input): void {
        if(!$input instanceof InputUserDeleteUseCaseDTO){
            throw new UseCaseException(
                __('auth.usecase.user.params',
                    ['class' => 'InputUserDeleteUseCaseDTO']
                )
            );
        }

        $this->userRepository->remove($input->getId());
    }
}
