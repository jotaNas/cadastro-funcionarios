<?php

declare(strict_types=1);

use Yiisoft\Db\Pgsql\Dsn;

return [
    'yiisoft/db-pgsql' => [
        'dsn' => (new Dsn('pgsql', '127.0.0.1', 'yiitest', '5432'))->asString(),
        'username' => 'postgress',
        'password' => 'postgress',
    ],
];