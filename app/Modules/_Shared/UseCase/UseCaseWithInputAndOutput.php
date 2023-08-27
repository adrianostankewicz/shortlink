<?php declare(strict_types=1);
namespace App\Modules\_Shared\UseCase;

/**
 * This interface represents a Use Case with input and output
 *
 * @author Adriano Stankewicz
 * @version 1.0.0
 * @since 1.0.0
 */
interface UseCaseWithInputAndOutputInterface {

    /**
     * Execute use case
     *
     * @author Adriano Stankewicz
     * @version 1.0.0
     * @since 1.0.0
     * @param InputUseCaseDTO $input
     * @return OutputUseCaseDTO
     */
    public function execute(InputUseCaseDTO $input): OutputUseCaseDTO|null;
}
