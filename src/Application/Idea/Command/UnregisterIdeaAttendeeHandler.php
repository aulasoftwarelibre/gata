<?php

declare(strict_types=1);

/*
 * This file is part of the `gata` project.
 *
 * (c) Aula de Software Libre de la UCO <aulasoftwarelibre@uco.es>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AulaSoftwareLibre\Gata\Application\Idea\Command;

use AulaSoftwareLibre\DDD\BaseBundle\Handlers\CommandHandler;
use AulaSoftwareLibre\Gata\Application\Idea\Exception\IdeaNotFoundException;
use AulaSoftwareLibre\Gata\Application\Idea\Repository\Ideas;
use AulaSoftwareLibre\Gata\Domain\Idea\Model\Idea;

final class UnregisterIdeaAttendeeHandler implements CommandHandler
{
    /**
     * @var Ideas
     */
    private $ideas;

    public function __construct(Ideas $ideas)
    {
        $this->ideas = $ideas;
    }

    public function __invoke(UnregisterIdeaAttendee $unregisterIdeaAttendee): void
    {
        $idea = $this->ideas->get($unregisterIdeaAttendee->ideaId());

        if (!$idea instanceof Idea) {
            throw new IdeaNotFoundException();
        }

        $idea->unregisterAttendee($unregisterIdeaAttendee->userId());

        $this->ideas->save($idea);
    }
}
