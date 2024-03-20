<?php
/**
 * Jingga
 *
 * PHP Version 8.2
 *
 * @package   Modules\Marketing
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.0
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

namespace Modules\Marketing\Controller;

use Modules\Marketing\Models\PromotionMapper;
use phpOMS\Asset\AssetType;
use phpOMS\Contract\RenderableInterface;
use phpOMS\Message\RequestAbstract;
use phpOMS\Message\ResponseAbstract;
use phpOMS\Views\View;

/**
 * Marketing controller class.
 *
 * @package Modules\Marketing
 * @license OMS License 2.0
 * @link    https://jingga.app
 * @since   1.0.0
 */
final class BackendController extends Controller
{
    /**
     * Routing end-point for application behavior.
     *
     * @param RequestAbstract  $request  Request
     * @param ResponseAbstract $response Response
     * @param array            $data     Generic data
     *
     * @return RenderableInterface
     *
     * @since 1.0.0
     * @codeCoverageIgnore
     */
    public function viewMarketingPromotionList(RequestAbstract $request, ResponseAbstract $response, array $data = []) : RenderableInterface
    {
        $view = new View($this->app->l11nManager, $request, $response);
        $view->setTemplate('/Modules/Marketing/Theme/Backend/promotion-list');
        $view->data['nav'] = $this->app->moduleManager->get('Navigation')->createNavigationMid(1001902001, $request, $response);

        $promotions               = PromotionMapper::getAll()->limit(25)->execute();
        $view->data['promotions'] = $promotions;

        return $view;
    }

    /**
     * Routing end-point for application behavior.
     *
     * @param RequestAbstract  $request  Request
     * @param ResponseAbstract $response Response
     * @param array            $data     Generic data
     *
     * @return RenderableInterface
     *
     * @since 1.0.0
     * @codeCoverageIgnore
     */
    public function viewMarketingPromotionView(RequestAbstract $request, ResponseAbstract $response, array $data = []) : RenderableInterface
    {
        /** @var \phpOMS\Model\Html\Head $head */
        $head = $response->data['Content']->head;
        $head->addAsset(AssetType::CSS, '/Modules/Calendar/Theme/Backend/css/styles.css?v=' . self::VERSION);

        $view = new View($this->app->l11nManager, $request, $response);
        $view->setTemplate('/Modules/Marketing/Theme/Backend/promotion-view');
        $view->data['nav'] = $this->app->moduleManager->get('Navigation')->createNavigationMid(1001902001, $request, $response);

        $taskListView = new \Modules\Tasks\Theme\Backend\Components\Tasks\ListView($this->app->l11nManager, $request, $response);
        $taskListView->setTemplate('/Modules/Tasks/Theme/Backend/Components/Tasks/list');
        $view->data['tasklist'] = $taskListView;

        $calendarView = new \Modules\Calendar\Theme\Backend\Components\Calendar\BaseView($this->app->l11nManager, $request, $response);
        $calendarView->setTemplate('/Modules/Calendar/Theme/Backend/Components/Calendar/mini');
        $view->data['calendar'] = $calendarView;

        $mediaListView = new \Modules\Media\Views\MediaView($this->app->l11nManager, $request, $response);
        $mediaListView->setTemplate('/Modules/Media/Theme/Backend/Components/Media/list');
        $view->data['medialist'] = $mediaListView;

        $promotion               = PromotionMapper::get()->where('id', (int) $request->getData('id'))->execute();
        $view->data['promotion'] = $promotion;

        return $view;
    }

    /**
     * Routing end-point for application behavior.
     *
     * @param RequestAbstract  $request  Request
     * @param ResponseAbstract $response Response
     * @param array            $data     Generic data
     *
     * @return RenderableInterface
     *
     * @since 1.0.0
     * @codeCoverageIgnore
     */
    public function viewMarketingEventView(RequestAbstract $request, ResponseAbstract $response, array $data = []) : RenderableInterface
    {
        /** @var \phpOMS\Model\Html\Head $head */
        $head = $response->data['Content']->head;
        $head->addAsset(AssetType::CSS, '/Modules/Calendar/Theme/Backend/css/styles.css?v=' . self::VERSION);

        $view = new View($this->app->l11nManager, $request, $response);
        $view->setTemplate('/Modules/Marketing/Theme/Backend/promotion-view');
        $view->data['nav'] = $this->app->moduleManager->get('Navigation')->createNavigationMid(1001902001, $request, $response);

        $taskListView = new \Modules\Tasks\Theme\Backend\Components\Tasks\ListView($this->app->l11nManager, $request, $response);
        $taskListView->setTemplate('/Modules/Tasks/Theme/Backend/Components/Tasks/list');
        $view->data['tasklist'] = $taskListView;

        $calendarView = new \Modules\Calendar\Theme\Backend\Components\Calendar\BaseView($this->app->l11nManager, $request, $response);
        $calendarView->setTemplate('/Modules/Calendar/Theme/Backend/Components/Calendar/mini');
        $view->data['calendar'] = $calendarView;

        $mediaListView = new \Modules\Media\Views\MediaView($this->app->l11nManager, $request, $response);
        $mediaListView->setTemplate('/Modules/Media/Theme/Backend/Components/Media/list');
        $view->data['medialist'] = $mediaListView;

        $promotion               = PromotionMapper::get()->where('id', (int) $request->getData('id'))->execute();
        $view->data['promotion'] = $promotion;

        return $view;
    }

    /**
     * Routing end-point for application behavior.
     *
     * @param RequestAbstract  $request  Request
     * @param ResponseAbstract $response Response
     * @param array            $data     Generic data
     *
     * @return RenderableInterface
     *
     * @since 1.0.0
     * @codeCoverageIgnore
     */
    public function viewMarketingPromotionCreate(RequestAbstract $request, ResponseAbstract $response, array $data = []) : RenderableInterface
    {
        $view = new View($this->app->l11nManager, $request, $response);
        $view->setTemplate('/Modules/Marketing/Theme/Backend/promotion-view');
        $view->data['nav'] = $this->app->moduleManager->get('Navigation')->createNavigationMid(1001902001, $request, $response);

        return $view;
    }

    /**
     * Routing end-point for application behavior.
     *
     * @param RequestAbstract  $request  Request
     * @param ResponseAbstract $response Response
     * @param array            $data     Generic data
     *
     * @return RenderableInterface
     *
     * @since 1.0.0
     * @codeCoverageIgnore
     */
    public function viewMarketingEventList(RequestAbstract $request, ResponseAbstract $response, array $data = []) : RenderableInterface
    {
        $view = new View($this->app->l11nManager, $request, $response);
        $view->setTemplate('/Modules/Marketing/Theme/Backend/event-list');
        $view->data['nav'] = $this->app->moduleManager->get('Navigation')->createNavigationMid(1001903001, $request, $response);

        return $view;
    }

    /**
     * Routing end-point for application behavior.
     *
     * @param RequestAbstract  $request  Request
     * @param ResponseAbstract $response Response
     * @param array            $data     Generic data
     *
     * @return RenderableInterface
     *
     * @since 1.0.0
     * @codeCoverageIgnore
     */
    public function viewMarketingEventCreate(RequestAbstract $request, ResponseAbstract $response, array $data = []) : RenderableInterface
    {
        $view = new View($this->app->l11nManager, $request, $response);
        $view->setTemplate('/Modules/Marketing/Theme/Backend/event-view');
        $view->data['nav'] = $this->app->moduleManager->get('Navigation')->createNavigationMid(1001903001, $request, $response);

        return $view;
    }
}
