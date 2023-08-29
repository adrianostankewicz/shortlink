<?php declare(strict_types=1);
namespace App\Modules\ShortLink\UseCase\FindShortLinkUseCase;

use App\Exceptions\UseCaseException;
use App\Modules\_Shared\UseCase\InputUseCaseDTO;
use App\Modules\_Shared\UseCase\OutputUseCaseDTO;
use App\Modules\_Shared\UseCase\UseCaseWithInputAndOutputInterface;
use App\Infrastructure\ShortLink\Eloquent\Repository\ShortLinkRepository;
use App\Modules\ShortLink\UseCase\FindUserUseCase\InputShortLinkFindUseCaseDTO;
use App\Modules\ShortLink\UseCase\FindUserUseCase\OutputShortLinkFindUseCaseDTO;

/**
 * This class represents a Use Case to find a existing short link in the application.
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class FindShortLinkUseCase implements UseCaseWithInputAndOutputInterface {

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
     * Execute the Use Case to find a existing short link
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputFindShortLinkUseCaseDTO $input
     * @return OutputFindShortLinkUseCaseDTO
     */
    public function execute(InputUseCaseDTO $input): OutputUseCaseDTO|null {
        if(!$input instanceof InputShortLinkFindUseCaseDTO){
            throw new UseCaseException(
                __('shortlink.usecase.shortlink.params',
                    ['class' => 'InputShortLinkFindUseCaseDTO']
                )
            );
        }

        $shortLink = $this->shortLinkRepository->find($input->getId());

        if(is_null($shortLink)){
            return null;
        }

        return new OutputShortLinkFindUseCaseDTO(
            $shortLink->getId(),
            $shortLink->getOriginalLink(),
            $shortLink->getIdentifier(),
            $shortLink->getUserId()
        );
    }
}
