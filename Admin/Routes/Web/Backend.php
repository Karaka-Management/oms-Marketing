<?php
/**
 * Jingga
 *
 * PHP Version 8.2
 *
 * @package   Modules
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.2
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

use Modules\Marketing\Controller\BackendController;
use Modules\Marketing\Models\PermissionCategory;
use phpOMS\Account\PermissionType;
use phpOMS\Router\RouteVerb;

return [
    '^/marketing/promotion/list(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Marketing\Controller\BackendController:viewMarketingPromotionList',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::NAME,
                'type'   => PermissionType::READ,
                'state'  => PermissionCategory::PROMOTION,
            ],
        ],
    ],
    '^/marketing/promotion/create(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Marketing\Controller\BackendController:viewMarketingPromotionCreate',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::NAME,
                'type'   => PermissionType::CREATE,
                'state'  => PermissionCategory::PROMOTION,
            ],
        ],
    ],
    '^/marketing/promotion/view(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Marketing\Controller\BackendController:viewMarketingPromotionView',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::NAME,
                'type'   => PermissionType::READ,
                'state'  => PermissionCategory::PROMOTION,
            ],
        ],
    ],
    '^/marketing/event/list(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Marketing\Controller\BackendController:viewMarketingEventList',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::NAME,
                'type'   => PermissionType::READ,
                'state'  => PermissionCategory::EVENT,
            ],
        ],
    ],
    '^/marketing/event/create(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Marketing\Controller\BackendController:viewMarketingEventCreate',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::NAME,
                'type'   => PermissionType::CREATE,
                'state'  => PermissionCategory::EVENT,
            ],
        ],
    ],
    '^/marketing/event/view(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Marketing\Controller\BackendController:viewMarketingEventView',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::NAME,
                'type'   => PermissionType::READ,
                'state'  => PermissionCategory::EVENT,
            ],
        ],
    ],
];
