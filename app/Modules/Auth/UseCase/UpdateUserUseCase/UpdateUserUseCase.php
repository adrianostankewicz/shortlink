<?php declare(strict_types=1);
namespace App\Modules\Auth\UseCase\UpdateUserUseCase;

use App\Exceptions\UseCaseException;
use App\Exceptions\RepositoryException;
use App\Modules\Auth\Entity\UserEntity;
use App\Modules\_Shared\UseCase\InputUseCaseDTO;

use App\Modules\_Shared\UseCase\UseCaseWithInputInterface;
use App\Infrastructure\Auth\Eloquent\Repository\UserRepository;

/**
 * This class represents a Use Case to update a user in the application.
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class UpdateUserUseCase implements UseCaseWithInputInterface {

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
     * Execute the Use Case to update a existing user
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputUpdateUserUseCaseDTO $input
     * @return void
     * @throws UseCaseException
     */
    public function execute(InputUseCaseDTO $input): void {
        if(!$input instanceof InputUpdateUserUseCaseDTO){
            throw new UseCaseException(
                __('auth.usecase.user.params',
                    ['class' => 'InputUpdateUserUseCaseDTO']
                )
            );
        }

        $userEntity = new UserEntity(
            $input->getId(),
            $input->getName(),
            $input->getEmail(),
            $input->getPassword(),
        );

        try{
            $this->userRepository->update($userEntity);
        } catch(RepositoryException $e){
            throw new UseCaseException($e->getMessage());
        }
    }
}
