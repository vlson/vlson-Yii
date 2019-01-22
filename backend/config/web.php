<?php
return [
    'components' => [
        'db'    =>  require(__DIR__ . '/../../common/config/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,//开启美化url配置,默认关闭
            'enableStrictParsing' => false, //不启用严格解析，默认不启用.如果设置为true,则必须建立rules规则，且路径必须符合一条以上规则才允许访问
            'showScriptName' => false, //指定续接在URL后面的一个后缀，如 .html 之类的。仅在 enablePrettyUrl 启用时有效
            'rules' => [
                "<module:[-\w]+>/<controller:[-\w]+>/<action:[-\w]+>/<id:\d+>"  =>  "<module>/<controller>/<action>",
                "<controller:[-\w]+>/<action:[-\w]+>/<id:\d+>"  =>  "<controller>/<action>",
                "<controller:[-\w]+>/<action:[-\w]+>"   =>  "<controller>/<action>",
                // http://frontend.com/site/index 重写为  http://frontend.com/site
                //'<controller:\w+>/'=>'<controller>/index',
                // http://frontend.com/site/view?id=1 重写为 http://frontend.com/site/1
                //'<controller:\w+>/<id:\d+>' => '<controller>/view',
                // http://frontend.com/site/ceshi?id=123 重写为  http://frontend.com/site/ceshi/123
                //'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
            ],
        ],

    ]
];