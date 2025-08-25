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

namespace Scayle\Cloud\AdminApi\Models;

/**
 * @property int $id id of the redirect
 * @property string $source url of the source
 * @property string $target url of the target
 * @property int $statusCode status of the redirect
 * @property bool $isRegex
 * @property Redirect $parent
 * @property int $priority
 * @property RedirectError $error
 * @property string $createdAt Timestamp when the redirect is created
 * @property string $updatedAt Timestamp when the redirect is updated
 */
class Redirect extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
        'parent' => Redirect::class,
        'error' => RedirectError::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphic = [
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphicCollections = [
    ];
}
