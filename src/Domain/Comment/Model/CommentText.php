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

namespace App\Domain\Comment\Model;

use App\Domain\Comment\Exception\EmptyCommentTextException;
use App\Domain\ValueObject;

final class CommentText extends ValueObject
{
    /**
     * @var string
     */
    private $text;

    public function __construct(string $text)
    {
        if ('' === $text) {
            throw new EmptyCommentTextException();
        }

        $this->text = $text;
    }

    public function __toString(): string
    {
        return $this->text();
    }

    public function text(): string
    {
        return $this->text;
    }

    protected function value(): array
    {
        return [
            'text' => $this->text(),
        ];
    }
}
