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

namespace spec\AulaSoftwareLibre\Gata\Application\Group\Command;

use AulaSoftwareLibre\Gata\Application\Group\Command\RenameGroup;
use AulaSoftwareLibre\Gata\Application\Group\Repository\Groups;
use AulaSoftwareLibre\Gata\Domain\Group\Model\Group;
use AulaSoftwareLibre\Gata\Domain\Group\Model\GroupId;
use AulaSoftwareLibre\Gata\Domain\Group\Model\GroupName;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

final class RenameGroupHandlerSpec extends ObjectBehavior
{
    const GROUP_ID = 'e8a68535-3e17-468f-acc3-8a3e0fa04a59';

    public function let(Groups $groups): void
    {
        $this->beConstructedWith($groups);
    }

    public function it_renames_a_group(Groups $groups, Group $group): void
    {
        $groups->get(Argument::exact(GroupId::fromString(self::GROUP_ID)))->willReturn($group);

        $group->rename(Argument::exact(new GroupName('Name')))->shouldBeCalled();

        $groups->save($group)->shouldBeCalled();

        $this(RenameGroup::with(
            GroupId::fromString(self::GROUP_ID),
            GroupName::fromString('Name')
        ));
    }
}
