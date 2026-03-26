<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class JWT extends BaseConfig
{
    public string $secret = 'your-super-secret-key-2026-change-in-production-!@#';
    public int $expiration = 3600; // seconds
}