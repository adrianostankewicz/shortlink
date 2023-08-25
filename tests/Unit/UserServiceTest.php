<?php declare(strict_types=1);
namespace Tests\Unit;

use Tests\TestCase;
use App\Modules\Auth\Service\UserService;

/**
 * Unit tests for UserService
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class UserServiceTest extends TestCase
{
    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldEncryptAPassword(): void {
        $password = '12345';
        $encryptedPassword = UserService::encryptPassword($password);
        $isEncryptedPassword = password_verify($password, $encryptedPassword);
        $this->assertTrue($isEncryptedPassword);
    }

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldCheckAEncryptedPassword(): void {
        $password = '12345';
        $encryptedPassword = UserService::encryptPassword($password);
        $isValidPassword = UserService::checkPassword($password, $encryptedPassword);
        $this->assertTrue($isValidPassword);
    }
}
