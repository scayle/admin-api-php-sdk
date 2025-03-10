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
 * @property int $id
 * @property string $code
 * @property VoucherConstraints $constraints
 * @property VoucherCriterion[] $criteria
 * @property bool $isApplicableToPromotions
 * @property string $name
 * @property string $status
 * @property string $summary
 * @property string $type
 * @property float $value
 */
class Voucher extends ApiObject
{
    /** @var array<string, string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
        'constraints' => VoucherConstraints::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'criteria' => VoucherCriterion::class,
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
