<?php declare(strict_types=1);
namespace App\Modules\ShortLink\Entity;

use App\Modules\_Shared\Entity\Entity;
use InvalidArgumentException;

/**
 * This class represents a short link history entity
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
class ShortLinkHistoryEntity extends Entity {

    /**
     * Create a new short link history object
     *
     * @param integer $id
     * @param string $ip
     * @param string $userAgent
     * @param integer $shortLinkId
     * @param integer $clicks
     */
    public function __construct(
        private int $id,
        private string $ip,
        private string $userAgent,
        private int $shortLinkId,
        private int $clicks = 0,
    ) {
        $this->validate();
    }

    /**
     * Validate the attributes
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @return boolean
     */
    public function validate(): bool {
        if(!is_null($this->id) && $this->id <= 0) {
            throw new InvalidArgumentException(__('shortlink_history.entity.shortlink_history.fields.id'));
        }

        if(empty($this->ip)) {
            throw new InvalidArgumentException(__('shortlink_history.entity.shortlink_history.fields.ip'));
        }

        if(empty($this->userAgent)) {
            throw new InvalidArgumentException(__('shortlink_history.entity.shortlink_history.fields.user_agent'));
        }

        if($this->shortLinkId <= 0) {
            throw new InvalidArgumentException(__('shortlink_history.entity.shortlink_history.fields.shortlink_id'));
        }

        return true;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getIp(): string {
        return $this->ip;
    }

    public function getUserAgent(): string {
        return $this->userAgent;
    }

    public function getShortLinkId(): int {
        return $this->shortLinkId;
    }

    public function getClicks(): int {
        return $this->clicks;
    }

    /**
     * Increments one when the user click on link
     *
     * @return void
     */
    public function incrementClicks(): void {
        $this->clicks += 1;
    }
}
