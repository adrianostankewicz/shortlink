<?php declare(strict_types=1);
namespace Tests\Unit;

use Tests\TestCase;
use InvalidArgumentException;
use App\Modules\ShortLink\Entity\ShortLinkEntity;

/**
 * Unit tests for Shortlink
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class ShortLinkTest extends TestCase {

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldThrowExceptionWhenCreateAShortLinkWithIdLessThanOrEqualToZero(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(__('auth.entity.shortlink.fields.id'));
        $shortLink = new ShortLinkEntity(
            0,
            '',
            'h49hut5s',
            1,
        );
    }

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldThrowExceptionWhenCreateAShortLinkWithEmptyOriginalLink(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(__('auth.entity.shortlink.fields.original_link'));
        $shortLink = new ShortLinkEntity(
            null,
            '',
            'h49hut5s',
            1,
        );
    }

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldThrowExceptionWhenCreateAEmptyIdentifier(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(__('auth.entity.shortlink.fields.identifier'));
        $shortLink = new ShortLinkEntity(
            null,
            'https://google.com',
            '',
            1,
        );
    }

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldThrowExceptionWhenCreateAUserIdLessThanOrEqualToZero(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(__('auth.entity.shortlink.fields.user_id'));
        $shortLink = new ShortLinkEntity(
            null,
            'https://google.com',
            'h49hut5s',
            0,
        );
    }

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldCreateAShortLink(): void {
        $shortLink = new ShortLinkEntity(
            null,
            'https://google.com',
            'h49hut5s',
            1,
        );

        $this->assertInstanceOf(ShortLinkEntity::class, $shortLink);
        $this->assertEquals('https://google.com', $shortLink->getOriginalLink());
        $this->assertEquals('h49hut5s', $shortLink->getIdentifier());
        $this->assertEquals(1, $shortLink->getUserId());
    }
}
