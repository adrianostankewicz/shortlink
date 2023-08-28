<?php declare(strict_types=1);
namespace Tests\Unit;

use Tests\TestCase;
use InvalidArgumentException;
use App\Modules\Auth\Entity\UserEntity;

/**
 * Unit tests for User
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class UserEntityTest extends TestCase {

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldThrowExceptionWhenCreateAUserWithIdLessThanOrEqualToZero(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(__('auth.entity.user.fields.name'));
        $user = new UserEntity(
            0,
            'User 1',
            'user@user.com',
            '12345'
        );
    }

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldThrowExceptionWhenCreateAUserWithEmptyName(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(__('auth.entity.user.fields.name'));
        $user = new UserEntity(
            null,
            '',
            'user@user.com',
            '12345'
        );
    }

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldThrowExceptionWhenCreateAUserWithEmptyEmail(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(__('auth.entity.user.fields.email'));
        $user = new UserEntity(
            null,
            'User 1',
            '',
            '12345'
        );
    }

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldThrowExceptionWhenCreateAUserWithEmptyPassword(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(__('auth.entity.user.fields.password'));
        $user = new UserEntity(
            null,
            'User 1',
            'user@user.com',
            ''
        );
    }

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldCreateAUser(): void {
        $user = new UserEntity(
            null,
            'User 1',
            'user@user.com',
            '12345'
        );

        $this->assertInstanceOf(UserEntity::class, $user);
        $this->assertEquals('User 1', $user->getName());
        $this->assertEquals('user@user.com', $user->getEmail());
        $this->assertEquals('12345', $user->getPassword());
    }
}
