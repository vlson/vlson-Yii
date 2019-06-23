<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'name'  =>  '微醺的结果集',
    'modules'    =>  [
        /* other modules */
        'markdown' => [
            // the module class
            'class' => 'kartik\markdown\Module',
            // the controller action route used for markdown editor preview
            'previewAction' => '/markdown/parse/preview',
            // the list of custom conversion patterns for post processing
            'customConversion' => [
                '<table>' => '<table class="table table-bordered table-striped">'
            ],
            // whether to use PHP SmartyPantsTypographer to process Markdown output
            'smartyPants' => true
        ]
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
