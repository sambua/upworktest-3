<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'upjob',
    'name' => 'UpWork Test Job',
    'language' => 'en',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'app\components\Aliases'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'NfAFNDkDfj2H8o4352nf-D4kVnFwMyQL',
        ],
        // you can set your theme here - template comes with: 'light' and 'dark'
        'view' => [
            'theme' => [
                'pathMap' => ['@app/views' => '@webroot/themes/uptest/views'],
                'baseUrl' => '@web/themes/uptest',
            ],
        ],
        'assetManager' => [
          'bundles' => [
            // we will use bootstrap css from our theme
            'yii\bootstrap\BootstrapAsset' => [
              'css' => [], // do not use yii default one
            ],
          ],
        ],
        'cache' => [
          'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
          'class' => 'yii\web\UrlManager',
          'enablePrettyUrl' => true,
          'showScriptName' => false,
          'rules' => [
            'manager' => 'manager/index',
            '<alias:\w+>' => 'site/<alias>',
          ],
        ],
        'user' => [
          'identityClass' => 'app\models\UserIdentity',
          'enableAutoLogin' => true,
        ],
        'session' => [
          'class' => 'yii\web\Session',
          'savePath' => '@app/runtime/session'
        ],
        'authManager' => [
          'class' => 'yii\rbac\DbManager',
          'cache' => 'cache',
        ],
        'errorHandler' => [
          'errorAction' => 'site/error',
        ],
        'mailer' => [
          'class' => 'yii\swiftmailer\Mailer',
          // send all mails to a file by default.
          // You have to set 'useFileTransport' to false and configure a transport for the mailer to send real emails.
          'useFileTransport' => false,
          'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'smtp.gmail.com',
            'username' => 'example@gmail.com',
            'password' => '1223423',
            'port' => '587',
            'encryption' => 'tls',
          ],
          'messageConfig' => [
            'from' => [ 'test@upworkjob.com' => 'Test project e-mail'], // this is needed for sending emails
            'charset' => 'UTF-8',
          ],
          //
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/translations',
                    'sourceLanguage' => 'en',
                ],
                'yii' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/translations',
                    'sourceLanguage' => 'en'
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
    'aliases' => [
      '@appRootPath' => realpath(dirname(__FILE__).'/../../'),
      '@uploads' => '@appRootPath/uploads',
      '@uploadsUrl' => 'http://uptest.dev/uploads',
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = ['class' => 'yii\debug\Module'];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = ['class' => 'yii\gii\Module'];
}

return $config;
