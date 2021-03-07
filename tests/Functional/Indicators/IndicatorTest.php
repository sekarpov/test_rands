<?php

namespace Test\Functional\Indicators;

use Test\Functional\Json;
use Test\Functional\WebTestCase;

class IndicatorTest extends WebTestCase
{
    public const STRING = 'string';
    public const NUMERIC = 'number';
    public const GUID = 'guid';
    public const ALPHANUMERIC = 'alphanumeric';

    public const ID_CREATED = '00000000-0000-0000-0000-000000000001';
    public const ID_NOT_FOUND = '20000000-0000-0000-0000-000000000002';

    public const VALUE_CREATED = '123456789';

    public function setUp(): void
    {
        parent::setUp();

        $this->loadFixtures([
            ConfirmFixture::class
        ]);
    }

    public function testCreateSuccess(): void
    {
        $data = [
            'type' => self::NUMERIC,
            'length' => 10
        ];

        $response = $this->app()->handle(self::json('POST', '/api/indicators', $data));

        self::assertEquals(201, $response->getStatusCode());
        self::assertJson($body = (string)$response->getBody());
    }

    public function testCreateFail(): void
    {
        $data = [
            'type' => 'not_type',
            'length' => 10
        ];

        $response = $this->app()->handle(self::json('POST', '/api/indicators', $data));
        self::assertEquals(409, $response->getStatusCode());
    }

    public function testEmpty(): void
    {
        $data = [];

        $response = $this->app()->handle(self::json('POST', '/api/indicators', $data));
        self::assertEquals(422, $response->getStatusCode());
        self::assertJson($body = (string)$response->getBody());
        self::assertEquals([
            'errors' => [
                'type' => 'This value should not be blank.'
            ],
        ], Json::decode($body));
    }

    public function testGetSuccess(): void
    {
        $response = $this->app()->handle(self::json('GET', '/api/indicators/' . self::ID_CREATED));
        self::assertEquals(200, $response->getStatusCode());
        self::assertJson($body = (string)$response->getBody());
        self::assertEquals([
            'value' => self::VALUE_CREATED
        ], Json::decode($body));
    }

    public function testNotFound(): void
    {
        $response = $this->app()->handle(self::json('GET', '/api/indicators/' . self::ID_NOT_FOUND));

        self::assertEquals(409, $response->getStatusCode());
    }
}
