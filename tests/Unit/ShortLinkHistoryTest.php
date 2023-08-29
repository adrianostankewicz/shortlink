<?php declare(strict_types=1);
namespace Tests\Unit;

use Tests\TestCase;
use InvalidArgumentException;
use App\Modules\ShortLink\Entity\ShortLinkHistoryEntity;

/**
 * Unit tests for ShortLinkHistory
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class ShortLinkHistoryTest extends TestCase {

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldThrowExceptionWhenCreateAShortLinkHistoryWithIdLessThanOrEqualToZero(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(__('shortlink_history.entity.shortlink_history.fields.id'));
        $shortLinkHistory = new ShortLinkHistoryEntity(
            0,
            '127.0.0.1',
            'Mozilla/5.0',
            1
        );
    }
}
