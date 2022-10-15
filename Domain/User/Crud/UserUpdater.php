<?php

namespace Domain\User\Crud;

use Domain\User\Model\User;
use GuardsmanPanda\Larabear\Infrastructure\Database\Service\BearDBService;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;
use RuntimeException;

class UserUpdater {
    public function __construct(private readonly User $model) {
        BearDBService::mustBeInTransaction();
        if (!Req::isWriteRequest()) {
            throw new RuntimeException(message: 'Database write operations should not be performed in read-only [GET, HEAD, OPTIONS] requests.');
        }
    }

    public static function fromId(string $id): UserUpdater {
        return new UserUpdater(model: User::where(column: 'id', operator:'=', value: $id)->sole());
    }


    public function setDisplayName(string $display_name): void {
        $this->model->display_name = $display_name;
    }

    public function setEmail(string $email): void {
        $this->model->email = $email;
    }

    public function setTwitchId(int|null $twitch_id): void {
        $this->model->twitch_id = $twitch_id;
    }

    public function save(): User {
        $this->model->save();
        return $this->model;
    }
}
