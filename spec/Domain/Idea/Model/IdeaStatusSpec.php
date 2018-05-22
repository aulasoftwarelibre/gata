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

namespace spec\App\Domain\Idea\Model;

use App\Domain\Idea\Exception\InvalidIdeaStatusException;
use App\Domain\Idea\Model\IdeaStatus;
use App\Domain\ValueObject;
use PhpSpec\ObjectBehavior;

final class IdeaStatusSpec extends ObjectBehavior
{
    const STATUS = IdeaStatus::PENDING;
    const INVALID_STATUS = 'Lorem ipsum';

    public function let(): void
    {
        $this->beConstructedWith(self::STATUS);
    }

    public function it_is_a_value_object(): void
    {
        $this->shouldHaveType(ValueObject::class);
    }

    public function it_has_to_be_valid(): void
    {
        $this->shouldThrow(InvalidIdeaStatusException::class)->during(
            '__construct',
            [self::INVALID_STATUS]
        );
    }

    public function it_can_be_a_string(): void
    {
        $this->__toString()->shouldBe(self::STATUS);
    }

    public function it_can_be_compared_with_other_idea_status()
    {
        $this->equals($this->getWrappedObject())->shouldBe(true);
    }
}
