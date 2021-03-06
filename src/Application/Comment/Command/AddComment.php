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

namespace AulaSoftwareLibre\Gata\Application\Comment\Command;

final class AddComment extends \Prooph\Common\Messaging\Command
{
    use \Prooph\Common\Messaging\PayloadTrait;

    public const MESSAGE_NAME = 'AulaSoftwareLibre\Gata\Application\Comment\Command\AddComment';

    protected $messageName = self::MESSAGE_NAME;

    public function commentId(): \AulaSoftwareLibre\Gata\Domain\Comment\Model\CommentId
    {
        return \AulaSoftwareLibre\Gata\Domain\Comment\Model\CommentId::fromString($this->payload['commentId']);
    }

    public function ideaId(): \AulaSoftwareLibre\Gata\Domain\Idea\Model\IdeaId
    {
        return \AulaSoftwareLibre\Gata\Domain\Idea\Model\IdeaId::fromString($this->payload['ideaId']);
    }

    public function userId(): \AulaSoftwareLibre\Gata\Domain\User\Model\UserId
    {
        return \AulaSoftwareLibre\Gata\Domain\User\Model\UserId::fromString($this->payload['userId']);
    }

    public function text(): \AulaSoftwareLibre\Gata\Domain\Comment\Model\CommentText
    {
        return \AulaSoftwareLibre\Gata\Domain\Comment\Model\CommentText::fromString($this->payload['text']);
    }

    public static function with(\AulaSoftwareLibre\Gata\Domain\Comment\Model\CommentId $commentId, \AulaSoftwareLibre\Gata\Domain\Idea\Model\IdeaId $ideaId, \AulaSoftwareLibre\Gata\Domain\User\Model\UserId $userId, \AulaSoftwareLibre\Gata\Domain\Comment\Model\CommentText $text): AddComment
    {
        return new self([
            'commentId' => $commentId->toString(),
            'ideaId' => $ideaId->toString(),
            'userId' => $userId->toString(),
            'text' => $text->toString(),
        ]);
    }

    protected function setPayload(array $payload): void
    {
        if (!isset($payload['commentId']) || !\is_string($payload['commentId'])) {
            throw new \InvalidArgumentException("Key 'commentId' is missing in payload or is not a string");
        }

        if (!isset($payload['ideaId']) || !\is_string($payload['ideaId'])) {
            throw new \InvalidArgumentException("Key 'ideaId' is missing in payload or is not a string");
        }

        if (!isset($payload['userId']) || !\is_string($payload['userId'])) {
            throw new \InvalidArgumentException("Key 'userId' is missing in payload or is not a string");
        }

        if (!isset($payload['text']) || !\is_string($payload['text'])) {
            throw new \InvalidArgumentException("Key 'text' is missing in payload or is not a string");
        }

        $this->payload = $payload;
    }
}
