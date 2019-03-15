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
 * @see https://tech.yandex.ru/share/doc/dg/add-docpage/
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
    const SERVICE_WHATSAPP      = 'whatsapp';
    const SERVICE_TELEGRAM      = 'telegram';
    const SERVICE_SKYPE         = 'skype';

    const SIZE_SMALL        = 's';
    const SIZE_BIG          = 'm';

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
        self::SERVICE_WHATSAPP      => 'Whatsapp',
        self::SERVICE_TELEGRAM      => 'Telegram',
        self::SERVICE_SKYPE         => 'Skype',
    ];


    /**
     * @var string
     */
    public $size = self::SIZE_BIG;

    /**
     * @var bool
     */
    public $is_counter = false;

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
            'size'            => 'Размер',
            'is_counter'            => 'Показывать счетчик',
        ]);
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),
        [
            [['services'], 'safe'],
            [['services'], 'required'],
            [['size'], 'string'],
            [['is_counter'], 'boolean'],
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
    public function run()
    {
        YaShAsset::register($this->view);
        return parent::run();
    }
}