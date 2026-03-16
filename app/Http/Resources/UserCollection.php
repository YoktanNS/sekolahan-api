<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'collection' => [
                'version' => '1.0',
                'href'    => route('users.index'),
                'items'   => $this->collection->map(function ($user) {
                    return [
                        'href' => route('users.show', $user->id),
                        'data' => [
                            ['name' => 'username', 'value' => $user->username, 'prompt' => 'Username Akun'],
                            ['name' => 'type', 'value' => $user->type, 'prompt' => 'Tipe Akun (admin/guru)'],
                        ],
                    ];
                }),
                'template' => [
                    'data' => [
                        ['name' => 'type', 'value' => '', 'prompt' => 'Tipe Akun (admin/guru)'],
                        ['name' => 'username', 'value' => '', 'prompt' => 'Username'],
                        ['name' => 'password', 'value' => '', 'prompt' => 'Password Akun'],
                    ]
                ]
            ]
        ];
    }
}