<?php declare(strict_types=1);
namespace App\Modules\Auth\Service;

/**
 * This class represents the services of user
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class UserService {

    /**
     * Encrypt a password of user
     *
     * @param string $password
     * @return string
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     */
    public static function encryptPassword(string $password): string {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Check the password of user is valid
     *
     * @param string $password
     * @return string
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     */
    public static function checkPassword(string $password, string $encryptedPassword): bool {
        return password_verify($password, $encryptedPassword);
    }
}
