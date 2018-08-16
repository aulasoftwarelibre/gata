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

final class IdeaCapacityWasLimited extends \Prooph\EventSourcing\AggregateChanged
{
    public const MESSAGE_NAME = 'AulaSoftwareLibre\Gata\Domain\Idea\Event\IdeaCapacityWasLimited';

    protected $messageName = self::MESSAGE_NAME;

    protected $payload = [];

    private $ideaId;
    private $limit;

    public function ideaId(): \AulaSoftwareLibre\Gata\Domain\Idea\Model\IdeaId
    {
        if (null === $this->ideaId) {
            $this->ideaId = \AulaSoftwareLibre\Gata\Domain\Idea\Model\IdeaId::fromString($this->aggregateId());
        }

        return $this->ideaId;
    }

    public function limit(): int
    {
        if (null === $this->limit) {
            $this->limit = $this->payload['limit'];
        }

        return $this->limit;
    }

    public static function with(\AulaSoftwareLibre\Gata\Domain\Idea\Model\IdeaId $ideaId, int $limit): IdeaCapacityWasLimited
    {
        return new self($ideaId->toString(), [
            'limit' => $limit,
        ]);
    }

    protected function setPayload(array $payload): void
    {
        if (!isset($payload['limit']) || !\is_int($payload['limit'])) {
            throw new \InvalidArgumentException("Key 'limit' is missing in payload or is not a int");
        }

        $this->payload = $payload;
    }
}
