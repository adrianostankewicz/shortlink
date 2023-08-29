<?php declare(strict_types=1);
namespace App\Modules\ShortLink\UseCase\AddShortLinkUseCase;

use App\Exceptions\UseCaseException;
use App\Exceptions\RepositoryException;
use App\Modules\_Shared\UseCase\InputUseCaseDTO;
use App\Modules\ShortLink\Entity\ShortLinkEntity;
use App\Modules\_Shared\UseCase\UseCaseWithInputInterface;
use App\Infrastructure\ShortLink\Eloquent\Repository\ShortLinkRepository;
use App\Modules\ShortLink\Service\ShortLinkService;

/**
 * This class represents a Use Case to add a short link in the application.
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class AddShortLinkUseCase implements UseCaseWithInputInterface {

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
     * Execute the Use Case to add a new short link
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputAddShortLinkUseCaseDTO $input
     * @return void
     * @throws UseCaseException
     */
    public function execute(InputUseCaseDTO $input): void {
        if(!$input instanceof InputAddShortLinkUseCaseDTO){
            throw new UseCaseException(
                __('shortlink.usecase.shortlink.params',
                    ['class' => 'InputAddShortLinkUseCaseDTO']
                )
            );
        }

        $identifier = ShortLinkService::generateIdentifier(8);

        $shortLinkEntity = new ShortLinkEntity(
            null,
            $input->getOriginalLink(),
            $identifier,
            $input->getUserId()
        );

        try{
            $this->shortLinkRepository->add($shortLinkEntity);
        } catch(RepositoryException $e){
            throw new UseCaseException($e->getMessage());
        }
    }
}
