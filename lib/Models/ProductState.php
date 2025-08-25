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
 * @property string $state The state of the product determined by the state evaluation process. The only possible values to request are `live`, `draft` and `blocked`. The `problem` state can only be the result of the state evaluation process. If product is in problem state, the reasons are listed in read-only 'problems' field. The `new` and `inApproval` states can be set in the SCAYLE Panel. If a product belongs to multiple merchants, the state is returned based on the hierarchical order live, inApproval, problem, blocked, draft
 * @property string[] $merchantReferenceKeys A list of merchant reference keys the merchant product belongs to.
 * @property MerchantProductState[] $merchantProductStates A list of merchant keys to which the merchant product belongs to and the state of the merchant product.
 */
class ProductState extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
        'state' => 'live',
    ];

    /** @var array<string, string> */
    protected array $classMap = [
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
