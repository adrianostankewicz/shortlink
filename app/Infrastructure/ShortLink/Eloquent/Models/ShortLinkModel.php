<?php declare(strict_types=1);
namespace App\Infrastructure\ShortLink\Eloquent\Models;

use App\Infrastructure\Auth\Eloquent\Models\UserModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * ShortLink Model
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class ShortLinkModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'short_links';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'original_link',
        'identifier',
        'user_id',
    ];

    /**
     * Return a user relationship with short link
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @return UserModel
     */
    public function user() {
        return $this->hasOne(UserModel::class, 'id', 'user_id');
    }
}
