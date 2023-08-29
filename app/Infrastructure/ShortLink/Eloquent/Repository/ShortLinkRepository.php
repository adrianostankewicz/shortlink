<?php declare(strict_types=1);
namespace App\Infrastructure\ShortLink\Eloquent\Repository;

use InvalidArgumentException;
use App\Modules\_Shared\Entity\Entity;
use App\Exceptions\RepositoryException;
use Illuminate\Database\QueryException;
use App\Modules\ShortLink\Entity\ShortLinkEntity;
use App\Infrastructure\ShortLink\Eloquent\Models\ShortLinkModel;
use App\Modules\ShortLink\Repository\ShortLinkRepositoryInterface;

/**
 * This class implements the actions to manipulate the shortlink repository
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class ShortLinkRepository implements ShortLinkRepositoryInterface {

    /**
     * Add a new shrotlink entity in the repository
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param ShortLinkEntity $shortLinkEntity
     * @return void
     * @throws RepositoryException
     */
    public function add(Entity $shortLinkEntity): void {
        if(!$shortLinkEntity instanceof ShortLinkEntity){
            throw new InvalidArgumentException(
                __('shortlink.repository.shortlink.params', ['class' => 'ShortLinkEntity'])
            );
        }

        try{
            ShortLinkModel::create([
                'original_link' => $shortLinkEntity->getOriginalLink(),
                'identifier'    => $shortLinkEntity->getIdentifier(),
                'user_id'       => $shortLinkEntity->getUserId()
            ]);
        } catch(QueryException $e){
            throw new RepositoryException(__('shortlink.repository.shortlink.exception.add'));
        }
    }

    /**
     * Update a existing shrot link entity in the repository
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param ShortLinkEntity $shortLinkEntity
     * @return void
     * @throws RepositoryException
     */
    public function update(Entity $shortLinkEntity): void {
        if(!$shortLinkEntity instanceof ShortLinkEntity){
            throw new InvalidArgumentException(
                __('shortlink.repository.shortlink.params', ['class' => 'ShortLinkEntity'])
            );
        }

        $shortLink = ShortLinkModel::find($shortLinkEntity->getId());

        if(is_null($shortLink)) {
            throw new RepositoryException(__('shortlink.repository.shortlink.exception.find'));
        }

        try{
            $shortLink->original_link = $shortLinkEntity->getOriginalLink();
            $shortLink->identifier = $shortLinkEntity->getIdentifier();
            $shortLink->user_id = $shortLinkEntity->getUserId();

            $shortLink->save();

        } catch(QueryException $e){
            throw new RepositoryException(__('shortlink.repository.shortlink.exception.update'));
        }
    }

    /**
     * Find a existing shrot link entity in the repository
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param int $id
     * @return ShortLinkEntity
     */
    public function find(int $id): ShortLinkEntity|null {
        $shortLink = ShortLinkModel::find($id);

        if(is_null($shortLink)){
            return null;
        }

        return new ShortLinkEntity(
            $shortLink->id,
            $shortLink->original_link,
            $shortLink->identifier,
            $shortLink->user_id
        );
    }

    /**
     * Find all existing shrot links entities in the repository
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @return array
     */
    public function findAll(): array {
        $shortLinks = ShortLinkModel::all();

        $entities = array();
        if(count($shortLinks) > 0){
            foreach($shortLinks as $user){
                $shortLinkEntity = new ShortLinkEntity(
                    $user->id,
                    $user->name,
                    $user->email,
                    $user->password
                );
                array_push($entities, $shortLinkEntity);
            }
        }
        return $entities;
    }

    /**
     * Remove a existing short link entity in the repository
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param int $id
     * @return void
     */
    public function remove(int $id): void {
        $shortLink = ShortLinkModel::find($id);
        $shortLink->delete();
    }
}
