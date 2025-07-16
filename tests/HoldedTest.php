<?php

use XaviCabot\Laravel\Holded\Holded;

it('can resolve the Holded facade', function () {
    $this->assertTrue(class_exists(Holded::class));
});

//it('can list contacts (mocked)', function () {
//    $mockClient = Mockery::mock(GuzzleHttp\Client::class);
//    $mockClient->shouldReceive('request')
//        ->once()
//        ->andReturn(new class {
//            public function getBody() {
//                return new class {
//                    public function getContents() {
//                        return json_encode(['success' => true]);
//                    }
//                };
//            }
//        });
//
//    $holded = new Holded($mockClient);
//    $result = $holded->listContacts();
//
//    expect($result)->toBeArray()->toHaveKey('success');
//});