SET @preparedStatement = (SELECT IF(
    (SELECT COUNT(*)
        FROM INFORMATION_SCHEMA.COLUMNS
        WHERE  table_name = 'portfolios'
        AND table_schema = DATABASE()
        AND column_name = 'original_value'
    ) > 0,
    "SELECT 1",
    "ALTER TABLE `portfolios` ADD `original_value` float DEFAULT NULL;"
));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;