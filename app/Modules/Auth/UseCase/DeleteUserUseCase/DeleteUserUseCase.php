<?php declare(strict_types=1);
namespace App\Modules\ShortLink\UseCase\DeleteShortLinkUseCase;

use App\Exceptions\UseCaseException;
use App\Modules\_Shared\UseCase\InputUseCaseDTO;
use App\Modules\_Shared\UseCase\UseCaseWithInputInterface;
use App\Infrastructure\ShortLink\Eloquent\Repository\ShortLinkRepository;
use App\Modules\ShortLink\UseCase\DeleteUserUseCase\InputShortLinkDeleteUseCaseDTO;

/**
 * This class represents a Use Case to delete a short link in the application.
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class DeleteShortLinkUseCase implements UseCaseWithInputInterface {

    /**
     * @var ShortLinkRepository
     */
    private $shortLinkRepository;

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param ShortLinkRepository $shortLinkRepository
     */
    public function __construct(ShortLinkRepository $shortLinkRepository) {
      $this->shortLinkRepository = $shortLinkRepository;
    }

    /**
     * Execute the Use Case to delete a existing short link
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputShortLinkDeleteUseCaseDTO $input
     * @return void
     * @throws UseCaseException
     */
    public function execute(InputUseCaseDTO $input): void {
        if(!$input instanceof InputShortLinkDeleteUseCaseDTO){
            throw new UseCaseException(
                __('auth.usecase.user.params',
                    ['class' => 'InputShortLinkDeleteUseCaseDTO']
                )
            );
        }

        $this->shortLinkRepository->remove($input->getId());
    }
}
