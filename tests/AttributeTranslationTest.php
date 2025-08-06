<?php

declare(strict_types=1);

/*
 * This file is part of the AdminAPI PHP SDK provided by SCAYLE GmbH.
 *
 * (c) SCAYLE GmbH <https://www.scayle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scayle\Cloud\AdminApi;

use Scayle\Cloud\AdminApi\Models\ArrayCollection;

/**
 * @internal
 */
final class AttributeTranslationTest extends BaseApiTestCase
{
    public function testUpdateOrCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('AttributeTranslationUpdateOrCreateRequest.json');

        $requestEntity = $expectedRequestJson;

        $this->api->attributeTranslations->updateOrCreate('acme', $requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testPartialUpdateOrCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('AttributeTranslationPartialUpdateOrCreateRequest.json');

        $requestEntity = $expectedRequestJson;

        $this->api->attributeTranslations->partialUpdateOrCreate('acme', $requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testAll(): void
    {
        $responseEntity = $this->api->attributeTranslations->all('acme', []);

        $expectedResponseJson = $this->loadFixture('AttributeTranslationAllResponse.json');
        self::assertInstanceOf(ArrayCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



    }

    public function testUpdateOrCreateAdvanced(): void
    {
        $expectedRequestJson = $this->loadFixture('AttributeTranslationUpdateOrCreateAdvancedRequest.json');

        $requestEntity = $expectedRequestJson;

        $this->api->attributeTranslations->updateOrCreateAdvanced($requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}
