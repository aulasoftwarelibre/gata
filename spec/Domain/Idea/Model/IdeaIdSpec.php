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

use App\Domain\Exception\InvalidUuidFormatException;
use App\Domain\Idea\Model\IdeaId;
use PhpSpec\ObjectBehavior;

final class IdeaIdSpec extends ObjectBehavior
{
    const UUID = 'e8a68535-3e17-468f-acc3-8a3e0fa04a59';
    const NOT_VALID_UUID = 'e8a68535-3e17-468f-acc3-8a3e0fa04a5';
    const OTHER_UUID = 'e8a68535-3e17-468f-acc3-8a3e0fa04a57';

    public function let(): void
    {
        $uuid = self::UUID;

        $this->beConstructedWith($uuid);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(IdeaId::class);
    }

    public function it_can_be_created_from_string(): void
    {
        $this->id()->shouldBe(self::UUID);
    }

    public function it_has_to_be_valid(): void
    {
        $this->shouldThrow(InvalidUuidFormatException::class)->during('__construct', [self::NOT_VALID_UUID]);
    }

    public function it_can_be_a_string(): void
    {
        $this->__toString()->shouldBe(self::UUID);
    }

    public function it_can_be_compared_with_other_user_id(
        IdeaId $sameIdeaId,
        IdeaId $notSameIdeaId
    ) {
        $sameIdeaId->id()->shouldBeCalled()->willReturn(self::UUID);
        $notSameIdeaId->id()->shouldBeCalled()->willReturn(self::OTHER_UUID);

        $this->equals($sameIdeaId)->shouldBe(true);
        $this->equals($notSameIdeaId)->shouldBe(false);
    }
}
