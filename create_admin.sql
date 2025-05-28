-- 删除已存在的管理员用户
DELETE FROM user WHERE username = 'admin';

-- 创建新的管理员用户
INSERT INTO user (
    username,
    auth_key,
    password_hash,
    email,
    status,
    created_at,
    updated_at
) VALUES (
    'admin',
    'admin_auth_key',
    '$2y$13$hYzXxXxXxXxXxXxXxXxXeXxXxXxXxXxXxXxXxXxXxXxXxXxXxXxXx',
    'admin@example.com',
    10,
    UNIX_TIMESTAMP(),
    UNIX_TIMESTAMP()
); 