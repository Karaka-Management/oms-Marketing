<?php
/**
 * Karaka
 *
 * PHP Version 8.1
 *
 * @package   Modules
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

use Modules\Marketing\Controller\BackendController;
use Modules\Marketing\Models\PermissionCategory;
use phpOMS\Account\PermissionType;
use phpOMS\Router\RouteVerb;

return [
    '^.*/marketing/promotion/list.*$' => [
        [
            'dest'       => '\Modules\Marketing\Controller\BackendController:viewMarketingPromotionList',
            'verb'       => RouteVerb::GET,
            'permission' => [
                'module' => BackendController::NAME,
                'type'   => PermissionType::READ,
                'state'  => PermissionCategory::PROMOTION,
            ],
        ],
    ],
    '^.*/marketing/promotion/create.*$' => [
        [
            'dest'       => '\Modules\Marketing\Controller\BackendController:viewMarketingPromotionCreate',
            'verb'       => RouteVerb::GET,
            'permission' => [
                'module' => BackendController::NAME,
                'type'   => PermissionType::CREATE,
                'state'  => PermissionCategory::PROMOTION,
            ],
        ],
    ],
    '^.*/marketing/promotion/profile.*$' => [
        [
            'dest'       => '\Modules\Marketing\Controller\BackendController:viewMarketingPromotionProfile',
            'verb'       => RouteVerb::GET,
            'permission' => [
                'module' => BackendController::NAME,
                'type'   => PermissionType::READ,
                'state'  => PermissionCategory::PROMOTION,
            ],
        ],
    ],
    '^.*/marketing/event/list.*$' => [
        [
            'dest'       => '\Modules\Marketing\Controller\BackendController:viewMarketingEventList',
            'verb'       => RouteVerb::GET,
            'permission' => [
                'module' => BackendController::NAME,
                'type'   => PermissionType::READ,
                'state'  => PermissionCategory::EVENT,
            ],
        ],
    ],
    '^.*/marketing/event/create.*$' => [
        [
            'dest'       => '\Modules\Marketing\Controller\BackendController:viewMarketingEventCreate',
            'verb'       => RouteVerb::GET,
            'permission' => [
                'module' => BackendController::NAME,
                'type'   => PermissionType::CREATE,
                'state'  => PermissionCategory::EVENT,
            ],
        ],
    ],
    '^.*/marketing/event/profile.*$' => [
        [
            'dest'       => '\Modules\Marketing\Controller\BackendController:viewMarketingEventProfile',
            'verb'       => RouteVerb::GET,
            'permission' => [
                'module' => BackendController::NAME,
                'type'   => PermissionType::READ,
                'state'  => PermissionCategory::EVENT,
            ],
        ],
    ],
];
