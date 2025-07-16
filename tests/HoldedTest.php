<?php

use src\Holded;

it('can instantiate the Holded class', function () {
    $holded = new Holded();
    expect($holded)->toBeInstanceOf(Holded::class);
});

it('can list contacts (mocked)', function () {
    $mockClient = Mockery::mock(GuzzleHttp\Client::class);
    $mockClient->shouldReceive('request')
        ->once()
        ->andReturn(new class {
            public function getBody() {
                return new class {
                    public function getContents() {
                        return json_encode(['success' => true]);
                    }
                };
            }
        });

    $holded = new Holded($mockClient);
    $result = $holded->listContacts();

    expect($result)->toBeArray()->toHaveKey('success');
});