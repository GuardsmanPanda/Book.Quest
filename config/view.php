<?php

return [
    'paths' => [realpath(path: base_path(path: 'Web/Shared/blade'))],
    'compiled' => realpath(path: storage_path(path: 'framework/views')),
];
