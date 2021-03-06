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

namespace AulaSoftwareLibre\Gata\Domain\Group\Model;

use AulaSoftwareLibre\Gata\Domain\ApplyMethodDispatcherTrait;
use AulaSoftwareLibre\Gata\Domain\Group\Event\GroupWasAdded;
use AulaSoftwareLibre\Gata\Domain\Group\Event\GroupWasRenamed;
use AulaSoftwareLibre\Gata\Domain\Idea\Model\Idea;
use AulaSoftwareLibre\Gata\Domain\Idea\Model\IdeaDescription;
use AulaSoftwareLibre\Gata\Domain\Idea\Model\IdeaId;
use AulaSoftwareLibre\Gata\Domain\Idea\Model\IdeaTitle;
use Prooph\EventSourcing\AggregateRoot;

class Group extends AggregateRoot
{
    use ApplyMethodDispatcherTrait;

    /**
     * @var GroupId
     */
    private $groupId;

    /**
     * @var GroupName
     */
    private $name;

    public static function add(GroupId $groupId, GroupName $groupName): self
    {
        $group = new self();

        $group->recordThat(GroupWasAdded::with($groupId, $groupName));

        return $group;
    }

    public function __toString(): string
    {
        return $this->name->toString();
    }

    public function groupId(): GroupId
    {
        return $this->groupId;
    }

    public function name(): GroupName
    {
        return $this->name;
    }

    public function rename(GroupName $groupName): void
    {
        $this->recordThat(GroupWasRenamed::with($this->groupId(), $groupName));
    }

    public function addIdea(
        IdeaId $ideaId,
        IdeaTitle $ideaTitle,
        IdeaDescription $ideaDescription
    ): Idea {
        return Idea::add(
            $ideaId,
            $this->groupId(),
            $ideaTitle,
            $ideaDescription
        );
    }

    protected function aggregateId(): string
    {
        return $this->groupId()->toString();
    }

    protected function applyGroupWasAdded(GroupWasAdded $event): void
    {
        $this->groupId = $event->groupId();
        $this->name = $event->name();
    }

    protected function applyGroupWasRenamed(GroupWasRenamed $event): void
    {
        $this->name = $event->name();
    }
}
