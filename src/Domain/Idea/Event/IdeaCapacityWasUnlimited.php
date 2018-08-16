<?php

// this file is auto-generated by prolic/fpp
// don't edit this file manually

declare(strict_types=1);

/*
 * This file is part of the `gata` project.
 *
 * (c) Aula de Software Libre de la UCO <aulasoftwarelibre@uco.es>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AulaSoftwareLibre\Gata\Domain\Idea\Event;

final class IdeaCapacityWasUnlimited extends \Prooph\EventSourcing\AggregateChanged
{
    public const MESSAGE_NAME = 'AulaSoftwareLibre\Gata\Domain\Idea\Event\IdeaCapacityWasUnLimited';

    protected $messageName = self::MESSAGE_NAME;

    protected $payload = [];

    private $ideaId;

    public function ideaId(): \AulaSoftwareLibre\Gata\Domain\Idea\Model\IdeaId
    {
        if (null === $this->ideaId) {
            $this->ideaId = \AulaSoftwareLibre\Gata\Domain\Idea\Model\IdeaId::fromString($this->aggregateId());
        }

        return $this->ideaId;
    }

    public static function with(\AulaSoftwareLibre\Gata\Domain\Idea\Model\IdeaId $ideaId): IdeaCapacityWasUnlimited
    {
        return new self($ideaId->toString(), [
        ]);
    }

    protected function setPayload(array $payload): void
    {
        $this->payload = $payload;
    }
}
