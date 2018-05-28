<?php

/*
 * This file is part of the `gata` project.
 *
 * (c) Aula de Software Libre de la UCO <aulasoftwarelibre@uco.es>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Application\Group\Command;

use App\Domain\Group\Model\GroupId;
use App\Domain\Group\Model\GroupName;
use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

final class AddGroup extends Command
{
    use PayloadTrait;

    public static function create(GroupId $id, GroupName $name): self
    {
        return new self([
            'id' => $id->id(),
            'name' => $name->name(),
        ]);
    }

    public function id(): GroupId
    {
        return new GroupId($this->payload()['id']);
    }

    public function name(): GroupName
    {
        return new GroupName($this->payload()['name']);
    }
}