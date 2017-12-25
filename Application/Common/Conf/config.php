<?php
return array(
    //'配置项'=>'配置值'
    // 加载扩展配置文件
    'LOAD_EXT_CONFIG' => 'db,session_redis',
    'SESSION_AUTO_START'    =>      false,//默认不开启session(APP接口需用url传递sid)
    'URL_CASE_INSENSITIVE'  =>  true,//url不区分大小写
    'DEFAULT_FILTER'        => 'strip_tags',//默认参数过滤方法
    'TMPL_L_DELIM' => '<{',
    'TMPL_R_DELIM' => '}>',
    "URL_MODEL" => 2,
    'SHOW_PAGE_TRACE' => false,
//    'URL_MODULE_MAP'    =>    array('enjoy'=>'admin'),//模块映射
    'DB_SQL_BUILD_CACHE' => true,//sql解析缓存
    'DB_SQL_BUILD_LENGTH' => 20, // SQL缓存的队列长度
    'TMPL_PARSE_STRING'  =>array(
        '__ADMIN_PUBLIC__' => __ROOT__.'/Public/Admin', // 更改默认的/Public 替换规则
        '__ADMIN_JS__'     => __ROOT__.'/Public/Admin/js', // 增加新的JS类库路径替换规则
        '__JS__'     => __ROOT__.'/Public/static/js', // 增加新的JS类库路径替换规则
        '__UPLOAD__' => __ROOT__.'/Upload', // 增加新的上传路径替换规则)
    ),
    // 设置禁止访问的模块列表
    'MODULE_DENY_LIST'      =>  array('Common',"Index"),
    'LOG_RECORD' => true, // 开启日志记录
    'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR,WARN,SQL,INFO,DEBUG', // 只记录EMERG ALERT

    //==============================缓存配置==============================================
//    'DATA_CACHE_TYPE'=>'Redis',//缓存类型
    'IS_CACHE'=>false,//是否缓存开关
    'CACHE_EXP'=>200,//默认缓存时长
    //==============================日志设置========================================
    'LOG_TABLE'=>'dy_log',//日志表
    'LOG_TYPE'=>'Db',//日志记录方式
);