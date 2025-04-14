```php
<?php

require __DIR__ . '/vendor/autoload.php';

use DuckLog\DuckLog;

// Optional: Set your custom pond (log file location)
DuckLog::pond(__DIR__ . '/logs/myapp_quacks.log');

// Start quacking!
DuckLog::quack('Application started!');
DuckLog::quack(['user' => 'Daffy', 'action' => 'login']);
DuckLog::quack(42.7);
```
