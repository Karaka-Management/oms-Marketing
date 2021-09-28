<?php
/**
 * Orange Management
 *
 * PHP Version 8.0
 *
 * @package   Modules
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://orange-management.org
 */
declare(strict_types=1);

use Modules\Marketing\Controller\BackendController;
use Modules\Marketing\Models\PermissionState;
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
                'state'  => PermissionState::PROMOTION,
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
                'state'  => PermissionState::PROMOTION,
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
                'state'  => PermissionState::PROMOTION,
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
                'state'  => PermissionState::EVENT,
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
                'state'  => PermissionState::EVENT,
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
                'state'  => PermissionState::EVENT,
            ],
        ],
    ],
];
