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
use AulaSoftwareLibre\Gata\Application\Idea\Repository\Ideas;

final class RetitleIdeaHandler implements CommandHandler
{
    /**
     * @var Ideas
     */
    private $ideas;

    public function __construct(Ideas $ideas)
    {
        $this->ideas = $ideas;
    }

    public function __invoke(RetitleIdea $retitleIdea): void
    {
        $idea = $this->ideas->get($retitleIdea->ideaId());

        $idea->retitle($retitleIdea->title());

        $this->ideas->save($idea);
    }
}
