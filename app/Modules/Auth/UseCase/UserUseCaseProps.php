<?php declare(strict_types=1);
namespace App\Modules\Auth\UseCase;

use App\Modules\_Shared\UseCase\UseCaseInterface;
use App\Modules\_Shared\UseCase\UseCaseWithInputInterface;
use App\Modules\_Shared\UseCase\UseCaseWithInputAndOutputInterface;

class UserUseCaseProps {
    public function __construct(
        public UseCaseWithInputInterface $addUsecase,
        public UseCaseWithInputInterface $updateUsecase,
        public UseCaseWithInputAndOutputInterface $findUsecase,
        public UseCaseInterface $findAllUsecase,
        public UseCaseWithInputInterface $deleteUsecase
    ) {}
}
