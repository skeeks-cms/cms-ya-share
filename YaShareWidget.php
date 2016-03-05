<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 03.07.2015
 */
namespace skeeks\cms\yandex\share\widget;

use skeeks\cms\base\WidgetRenderable;
use skeeks\cms\components\Cms;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\widgets\ActiveForm;

/**
 * @property string $jsonOptions
 *
 * Class YaShareWidget
 * @package skeeks\cms\yandex\share\widget
 */
class YaShareWidget extends WidgetRenderable
{
    const SERVICE_VK            = 'vkontakte';
    const SERVICE_FB            = 'facebook';
    const SERVICE_TWITTER       = 'twitter';
    const SERVICE_OK            = 'odnoklassniki';
    const SERVICE_MOIMIR        = 'moimir';
    const SERVICE_LJ            = 'lj';
    const SERVICE_FRIENDFEED    = 'friendfeed';
    const SERVICE_MOIKRUG       = 'moikrug';
    const SERVICE_GPLUS         = 'gplus';
    const SERVICE_SURFINGBIRD   = 'surfingbird';

    const TYPE_BUTTON   = 'button';
    const TYPE_SMALL    = 'small';
    const TYPE_LINK     = 'link';
    const TYPE_ICON     = 'icon';
    const TYPE_NONE     = 'none';

    /**
     * @var array
     */
    static public $possibleTypes = [
        self::TYPE_BUTTON           => 'Кнопка',
        self::TYPE_SMALL            => 'Счетчики',
        self::TYPE_LINK             => 'Ссылка',
        self::TYPE_ICON             => 'Иконки и меню',
        self::TYPE_NONE             => 'Только иконки',
    ];

    /**
     * @var array
     */
    static public $possibleService = [
        self::SERVICE_VK            => 'Вконтакте',
        self::SERVICE_FB            => 'Facebook',
        self::SERVICE_TWITTER       => 'Twitter',
        self::SERVICE_OK            => 'Одноклассники',
        self::SERVICE_MOIMIR        => 'МойМир',
        self::SERVICE_LJ            => 'Livejournal',
        self::SERVICE_FRIENDFEED    => 'Friendfeed',
        self::SERVICE_MOIKRUG       => 'Мой круг',
        self::SERVICE_GPLUS         => 'Google+',
        self::SERVICE_SURFINGBIRD   => 'Surfingbird',
    ];





    /**
     * @var string
     */
    public $typeView = self::TYPE_BUTTON;

    /**
     * @var array
     */
    public $services = [
        self::SERVICE_VK,
        self::SERVICE_FB,
        self::SERVICE_TWITTER,
        self::SERVICE_OK,
    ];



    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name' => 'Виджет блока "Поделиться"'
        ]);
    }

    /**
     * Файл с формой настроек, по умолчанию
     *
     * @return string
     */
    public function getConfigFormFile()
    {
        $class = new \ReflectionClass($this->className());
        return dirname($class->getFileName()) . DIRECTORY_SEPARATOR . 'views/_settingsForm.php';
    }


    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(),
        [
            'services'        => 'Набор сервисов',
            'typeView'        => 'Внешний вид блока',
        ]);
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),
        [
            [['services'], 'safe'],
            [['services'], 'required'],
            [['typeView'], 'string'],
            [['typeView'], 'required']
        ]);
    }

    public function renderConfigForm(ActiveForm $form)
    {
        echo \Yii::$app->view->renderFile(__DIR__ . '/views/_settingsForm.php', [
            'form'  => $form,
            'model' => $this
        ], $this);
    }

    /**
     * @return string
     */
    protected function _run()
    {
        YaShAsset::register($this->view);
        return parent::_run();
    }
}