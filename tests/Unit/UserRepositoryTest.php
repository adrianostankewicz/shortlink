<?php declare(strict_types=1);
namespace Tests\Unit;

use App\Infrastructure\Auth\Eloquent\Models\UserModel;
use Tests\TestCase;
use InvalidArgumentException;
use App\Modules\_Shared\Entity\Entity;
use App\Modules\Auth\Entity\UserEntity;
use App\Infrastructure\Auth\Eloquent\Repository\UserRepository;
use App\Modules\Auth\Service\UserService;

/**
 * Unit tests for UserRepository
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class UserRepositoryTest extends TestCase
{
    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldThrowExceptionWhenAddAUser(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            __('auth.repository.user.params',
                ['class' => 'UserEntity']
            )
        );
        $repository = new UserRepository();
        $user = new EntityTest();
        $repository->add($user);
    }

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldAddAUser(): void {
        $repository = new UserRepository();
        $user = new UserEntity(
            null,
            'User 1',
            'user@user.com',
            '12345'
        );
        $repository->add($user);

        $userCreated = $repository->findByEmail($user->getEmail());

        $this->assertInstanceOf(UserEntity::class, $userCreated);
        $this->assertEquals($user->getName(), $userCreated->getName());
        $this->assertTrue(
            UserService::checkPassword(
                $user->getPassword(),
                $userCreated->getPassword()
            )
        );
    }

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldThrowExceptionWhenUpdateAUser(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            __('auth.repository.user.params',
                ['class' => 'UserEntity']
            )
        );
        $repository = new UserRepository();
        $user = new EntityTest();
        $repository->update($user);
    }

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldUpdateAUser(): void {
        $repository = new UserRepository();
        $user = new UserEntity(
            1,
            'User 2',
            'user@user2.com',
            '12345'
        );
        $repository->update($user);

        $userUpdated = $repository->findByEmail($user->getEmail());

        $this->assertInstanceOf(UserEntity::class, $userUpdated);
        $this->assertEquals($user->getName(), $userUpdated->getName());
        $this->assertTrue(
            UserService::checkPassword(
                $user->getPassword(),
                $userUpdated->getPassword()
            )
        );
    }

    /**
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @test
     */
    public function shouldRemoveAUser(): void {
        $repository = new UserRepository();
        $repository->remove(1);

        $userRemoved = $repository->find(1);

        $this->assertEquals(null, $userRemoved);
    }
}

class EntityTest extends Entity {}
