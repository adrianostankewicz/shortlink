<?php declare(strict_types=1);
namespace App\Modules\ShortLink\Factory;

use App\Modules\ShortLink\Facade\ShortLinkFacadeImpl;
use App\Modules\ShortLink\UseCase\ShortLinkUseCaseProps;
use App\Modules\ShortLink\UseCase\AddShortLinkUseCase\AddShortLinkUseCase;
use App\Modules\ShortLink\UseCase\FindShortLinkUseCase\FindShortLinkUseCase;
use App\Modules\ShortLink\UseCase\DeleteShortLinkUseCase\DeleteShortLinkUseCase;
use App\Modules\ShortLink\UseCase\UpdateShortLinkUseCase\UpdateShortLinkUseCase;
use App\Modules\ShortLink\UseCase\FindAllShortLinksUseCase\FindAllShortLinksUseCase;
use App\Infrastructure\ShortLink\Eloquent\Repository\ShortLinkRepository;

/**
 * ShortLink Factory to create a methods to manipulate a ShortLink Entity in the application
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class ShortLinkFactory {

    /**
     * Create the objects responsible for manipulating the short link
     *
     * @return void
     */
    public static function create() {
    $repository = new ShortLinkRepository();
    $addUsecase = new AddShortLinkUseCase($repository);
    $updateUsecase = new UpdateShortLinkUseCase($repository);
    $findUsecase = new FindShortLinkUseCase($repository);
    $findAllUsecase = new FindAllShortLinksUseCase($repository);
    $deleteUsecase = new DeleteShortLinkUseCase($repository);
    $facade = new ShortLinkFacadeImpl(
        new ShortLinkUseCaseProps(
        $addUsecase,
        $updateUsecase,
        $findUsecase,
        $findAllUsecase,
        $deleteUsecase
        )
    );

    return $facade;
    }
}
