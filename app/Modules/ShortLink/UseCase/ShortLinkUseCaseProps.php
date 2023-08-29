<?php declare(strict_types=1);
namespace App\Modules\ShortLink\UseCase;

use App\Modules\_Shared\UseCase\UseCaseInterface;
use App\Modules\_Shared\UseCase\UseCaseWithInputInterface;
use App\Modules\_Shared\UseCase\UseCaseWithInputAndOutputInterface;

class ShortLinkUseCaseProps {
    public function __construct(
        public UseCaseWithInputInterface $addUsecase,
        public UseCaseWithInputInterface $updateUsecase,
        public UseCaseWithInputAndOutputInterface $findUsecase,
        public UseCaseInterface $findAllUsecase,
        public UseCaseWithInputInterface $deleteUsecase
    ) {}
}
