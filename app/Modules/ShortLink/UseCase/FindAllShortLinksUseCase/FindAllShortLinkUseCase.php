<?php declare(strict_types=1);
namespace App\Modules\ShortLink\UseCase\FindAllShortLinksUseCase;

use App\Modules\_Shared\UseCase\UseCaseInterface;
use App\Infrastructure\ShortLink\Eloquent\Repository\ShortLinkRepository;
use App\Modules\ShortLink\UseCase\FindAllShortLinksUseCase\OutputFindAllShortLinksUseCaseDTO;

/**
 * This class represents a Use Case to find all shortLinks in the application.
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class FindAllShortLinksUseCase implements UseCaseInterface {

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
     * Execute the Use Case to find all existing short links
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @return array
     */
    public function execute(): array {
        $shortLinks = $this->shortLinkRepository->findAll();

        $entities = array();
        if(count($shortLinks) > 0) {
            foreach($shortLinks as $shortLink) {
                $shortLinkEntity = new OutputFindAllShortLinksUseCaseDTO(
                    $shortLink->getId(),
                    $shortLink->getOriginalLink(),
                    $shortLink->getIdentifier(),
                    $shortLink->getUserId()
                );

                array_push($entities, $shortLinkEntity);
            }
        }
        return $entities;
    }
}
