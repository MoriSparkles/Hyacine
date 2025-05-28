-- 重置管理员密码为 'admin'
UPDATE `user` 
SET `password_hash` = '$2y$13$hJ6V9xq3nz8K7mN2pQ5rR.9X1Y4Z6A8B0C2D4E6F8H0J2L4N6P8R0T2V4X6Z8',
    `auth_key` = 'new_auth_key',
    `status` = 10,
    `updated_at` = UNIX_TIMESTAMP()
WHERE `username` = 'admin';

-- 如果管理员用户不存在，则创建
INSERT INTO `user` (`username`, `auth_key`, `password_hash`, `email`, `status`, `created_at`, `updated_at`)
SELECT 'admin', 'new_auth_key', '$2y$13$hJ6V9xq3nz8K7mN2pQ5rR.9X1Y4Z6A8B0C2D4E6F8H0J2L4N6P8R0T2V4X6Z8', 'admin@example.com', 10, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()
WHERE NOT EXISTS (SELECT 1 FROM `user` WHERE `username` = 'admin'); 