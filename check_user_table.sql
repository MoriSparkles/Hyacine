-- 检查用户表是否存在
SHOW TABLES LIKE 'user';

-- 检查用户表结构
DESCRIBE user;

-- 检查用户数据
SELECT id, username, email, status, created_at, updated_at FROM user;

-- 检查管理员用户
SELECT id, username, email, status, created_at, updated_at 
FROM user 
WHERE username = 'admin'; 