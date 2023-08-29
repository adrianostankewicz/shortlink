<?php declare(strict_types=1);
namespace App\Modules\ShortLink\UseCase\UpdateShortLinkUseCase;

use App\Exceptions\UseCaseException;
use App\Exceptions\RepositoryException;
use App\Modules\ShortLink\Entity\ShortLinkEntity;
use App\Modules\_Shared\UseCase\InputUseCaseDTO;

use App\Modules\_Shared\UseCase\UseCaseWithInputInterface;
use App\Infrastructure\ShortLink\Eloquent\Repository\ShortLinkRepository;

/**
 * This class represents a Use Case to update a short link in the application.
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class UpdateShortLinkUseCase implements UseCaseWithInputInterface {

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
     * Execute the Use Case to update a existing shortLink
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputUpdateShortLinkUseCaseDTO $input
     * @return void
     * @throws UseCaseException
     */
    public function execute(InputUseCaseDTO $input): void {
        if(!$input instanceof InputUpdateShortLinkUseCaseDTO){
            throw new UseCaseException(
                __('shortLink.usecase.shortLink.params',
                    ['class' => 'InputUpdateShortLinkUseCaseDTO']
                )
            );
        }

        $shortLinkEntity = new ShortLinkEntity(
            $input->getId(),
            $input->getOriginalLink(),
            $input->getIdentifier(),
            $input->getUserId(),
        );

        try{
            $this->shortLinkRepository->update($shortLinkEntity);
        } catch(RepositoryException $e){
            throw new UseCaseException($e->getMessage());
        }
    }
}
