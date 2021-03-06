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

namespace AulaSoftwareLibre\Gata\Application\Idea\Command;

final class RegisterIdeaAttendee extends \Prooph\Common\Messaging\Command
{
    use \Prooph\Common\Messaging\PayloadTrait;

    public const MESSAGE_NAME = 'AulaSoftwareLibre\Gata\Application\Idea\Command\RegisterIdeaAttendee';

    protected $messageName = self::MESSAGE_NAME;

    public function ideaId(): \AulaSoftwareLibre\Gata\Domain\Idea\Model\IdeaId
    {
        return \AulaSoftwareLibre\Gata\Domain\Idea\Model\IdeaId::fromString($this->payload['ideaId']);
    }

    public function userId(): \AulaSoftwareLibre\Gata\Domain\User\Model\UserId
    {
        return \AulaSoftwareLibre\Gata\Domain\User\Model\UserId::fromString($this->payload['userId']);
    }

    public static function with(\AulaSoftwareLibre\Gata\Domain\Idea\Model\IdeaId $ideaId, \AulaSoftwareLibre\Gata\Domain\User\Model\UserId $userId): RegisterIdeaAttendee
    {
        return new self([
            'ideaId' => $ideaId->toString(),
            'userId' => $userId->toString(),
        ]);
    }

    protected function setPayload(array $payload): void
    {
        if (!isset($payload['ideaId']) || !\is_string($payload['ideaId'])) {
            throw new \InvalidArgumentException("Key 'ideaId' is missing in payload or is not a string");
        }

        if (!isset($payload['userId']) || !\is_string($payload['userId'])) {
            throw new \InvalidArgumentException("Key 'userId' is missing in payload or is not a string");
        }

        $this->payload = $payload;
    }
}
