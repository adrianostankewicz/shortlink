<?php declare(strict_types=1);
namespace App\Modules\Auth\UseCase\AddUserUseCase;

use App\Exceptions\UseCaseException;
use App\Exceptions\RepositoryException;
use App\Modules\Auth\Entity\UserEntity;
use App\Modules\Auth\Service\UserService;
use App\Modules\_Shared\UseCase\InputUseCaseDTO;

use App\Modules\_Shared\UseCase\UseCaseWithInputInterface;
use App\Infrastructure\Auth\Eloquent\Repository\UserRepository;

/**
 * This class represents a Use Case to add a user in the application.
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class AddUserUseCase implements UseCaseWithInputInterface {

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
     * Execute the Use Case to add a new user
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputAddUserUseCaseDTO $input
     * @return void
     * @throws UseCaseException
     */
    public function execute(InputUseCaseDTO $input): void {
        if(!$input instanceof InputAddUserUseCaseDTO){
            throw new UseCaseException(
                __('auth.usecase.user.params',
                    ['class' => 'InputAddUserUseCaseDTO']
                )
            );
        }

        $password = UserService::encryptPassword($input->getPassword());

        $userEntity = new UserEntity(
            null,
            $input->getName(),
            $input->getEmail(),
            $password
        );

        try{
            $this->userRepository->add($userEntity);
        } catch(RepositoryException $e){
            throw new UseCaseException($e->getMessage());
        }
    }
}
