<?php
use app\model\User;

// require_once './system/api/trg.php';

try {
print_r(User::create(['name'=>'ddd']));
} catch (Throwable $e) {
    echo (string) $e;
}