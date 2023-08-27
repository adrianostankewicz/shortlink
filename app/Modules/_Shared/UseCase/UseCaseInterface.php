<?php declare(strict_types=1);
namespace App\Modules\_Shared\UseCase;

/**
 * This interface represents a Use Case
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
interface UseCaseInterface {

    /**
     * Execute use case
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @return void
     */
    public function execute();
}
