<?php declare(strict_types=1);
namespace Tests\Unit;

use Tests\TestCase;
use InvalidArgumentException;
use App\Modules\_Shared\Entity\Entity;
use App\Modules\ShortLink\Entity\ShortLinkEntity;
use App\Infrastructure\ShortLink\Eloquent\Repository\ShortLinkRepository;

/**
 * Unit tests for ShortLinkRepository
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class ShortLinkRepositoryTest extends TestCase {

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldThrowExceptionWhenAddAShortLink(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            __('shortlink.repository.shortlink.params',
                ['class' => 'ShorLinkEntity']
            )
        );
        $repository = new ShortLinkRepository();
        $shortlink = new EntityShortLinkTest();
        $repository->add($shortlink);
    }

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldAddAShortLink(): void {
        $repository = new ShortLinkRepository();
        $shortLink = new ShortLinkEntity(
            null,
            'https://google.com',
            'h49hut5s',
            1
        );
        $repository->add($shortLink);

        $shortLinkCreated = $repository->find(1);

        $this->assertInstanceOf(ShortLinkEntity::class, $shortLinkCreated);
        $this->assertEquals($shortLink->getOriginalLink(), $shortLinkCreated->getOriginalLink());
    }

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldThrowExceptionWhenUpdateAShortLink(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            __('shortlink.repository.shortlink.params',
                ['class' => 'ShorLinkEntity']
            )
        );
        $repository = new ShortLinkRepository();
        $shortLink = new EntityShortLinkTest();
        $repository->update($shortLink);
    }

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldUpdateAShortLink(): void {
        $repository = new ShortLinkRepository();
        $shortLink = new ShortLinkEntity(
            1,
            'https://microsoft.com',
            'itr785s38',
            1
        );
        $repository->update($shortLink);

        $shortLinkUpdated = $repository->find(1);

        $this->assertInstanceOf(ShortLinkEntity::class, $shortLinkUpdated);
        $this->assertEquals($shortLink->getId(), $shortLinkUpdated->getId());
        $this->assertEquals($shortLink->getOriginalLink(), $shortLinkUpdated->getOriginalLink());
        $this->assertEquals($shortLink->getIdentifier(), $shortLinkUpdated->getIdentifier());
        $this->assertEquals($shortLink->getUserId(), $shortLinkUpdated->getUserId());
    }

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldRemoveAShortLink(): void {
        $repository = new ShortLinkRepository();
        $repository->remove(1);

        $shortLinkRemoved = $repository->find(1);

        $this->assertEquals(null, $shortLinkRemoved);
    }
}

class EntityShortLinkTest extends Entity {}
