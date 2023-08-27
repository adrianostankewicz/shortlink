<?php declare(strict_types=1);
namespace App\Infrastructure\Auth\Eloquent\Repository;

use InvalidArgumentException;
use App\Modules\_Shared\Entity\Entity;
use App\Exceptions\RepositoryException;
use App\Modules\Auth\Entity\UserEntity;
use Illuminate\Database\QueryException;
use App\Modules\Auth\Service\UserService;
use App\Infrastructure\Auth\Eloquent\Models\UserModel;
use App\Modules\Auth\Repository\UserRepositoryInterface;

/**
 * This class implements the actions to manipulate a user repository
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class UserRepository implements UserRepositoryInterface {

    /**
     * Add a new user entity in the repository
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param UserEntity $userEntity
     * @return void
     * @throws RepositoryException
     */
    public function add(Entity $userEntity): void {
        if(!$userEntity instanceof UserEntity){
            throw new InvalidArgumentException(
                __('auth.repository.user.params', ['class' => 'UserEntity'])
            );
        }

        try{
            UserModel::create([
                'name'      => $userEntity->getName(),
                'email'     => $userEntity->getEmail(),
                'password'  => $userEntity->getPassword()
            ]);
        } catch(QueryException $e){
            throw new RepositoryException(__('auth.repository.user.exception.add'));
        }
    }

    /**
     * Update a existing user entity in the repository
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param UserEntity $userEntity
     * @return void
     * @throws RepositoryException
     */
    public function update(Entity $userEntity): void {
        if(!$userEntity instanceof UserEntity){
            throw new InvalidArgumentException(
                __('auth.repository.user.params', ['class' => 'UserEntity'])
            );
        }

        $user = UserModel::find($userEntity->getId());

        if(is_null($user)) {
            throw new RepositoryException(__('auth.repository.user.exception.find'));
        }

        $password = $user->password;
        if(!UserService::checkPassword($user->password, $userEntity->getPassword())) {
            $password = UserService::encryptPassword($userEntity->getPassword());
        }

        try{
            $user->name = $userEntity->getName();
            $user->email = $userEntity->getEmail();
            $user->password = $password;

            $user->save();

        } catch(QueryException $e){
            throw new RepositoryException(__('auth.repository.user.exception.update'));
        }
    }

    /**
     * Find a existing user entity in the repository by id
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param int $id
     * @return UserEntity
     */
    public function find(int $id): UserEntity|null {
        $user = UserModel::find($id);

        if(is_null($user)){
            return null;
        }

        return new UserEntity(
            $user->id,
            $user->name,
            $user->email,
            $user->password
        );
    }

    /**
     * Find all user entities in the repository
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @return array
     */
    public function findAll(): array {
        $users = UserModel::all();

        $entities = array();
        if(count($users) > 0){
            foreach($users as $user){
                $userEntity = new UserEntity(
                    $user->id,
                    $user->name,
                    $user->email,
                    $user->password
                );
                array_push($entities, $userEntity);
            }
        }
        return $entities;
    }

    /**
     * Remove a existing user entity in the repository
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param int $id
     * @return void
     */
    public function remove(int $id): void {
        $user = UserModel::find($id);
        $user->delete();
    }


    /**
     * Remove a existing user entity in the repository
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param string $email
     * @return UserEntity
     */
    public function findByEmail(string $email): UserEntity|null {
        $user = UserModel::where('email', $email)->first();

        if(is_null($user)) {
            return null;
        }

        return new UserEntity(
            $user->id,
            $user->name,
            $user->email,
            $user->password
        );
    }
}
