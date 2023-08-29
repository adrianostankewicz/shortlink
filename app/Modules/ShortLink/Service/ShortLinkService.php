<?php declare(strict_types=1);
namespace App\Modules\ShortLink\Service;

/**
 * This class represents the services of short link
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class ShortLinkService {

    /**
     * Generate a identifier based on random caracthers
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param int $length
     * @return string
     */
    public static function generateIdentifier(int $length): string {
        return random_bytes($length);
    }
}
