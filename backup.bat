@echo off
echo ===================================
echo PPID Dispora Jabar Portfolio Backup Tool
echo ===================================
echo.
echo This script will create a backup of your database and important files.
echo.

set TIMESTAMP=%date:~10,4%%date:~4,2%%date:~7,2%_%time:~0,2%%time:~3,2%%time:~6,2%
set TIMESTAMP=%TIMESTAMP: =0%
set BACKUP_DIR=backups\%TIMESTAMP%

echo Creating backup directory...
if not exist backups mkdir backups
mkdir %BACKUP_DIR%
echo Created directory: %BACKUP_DIR%

echo.
echo [1/3] Exporting database...
php artisan db:backup %BACKUP_DIR%\database.sql
echo Database backup saved to %BACKUP_DIR%\database.sql

echo.
echo [2/3] Backing up .env file...
copy .env %BACKUP_DIR%\.env
echo .env file backed up to %BACKUP_DIR%\.env

echo.
echo [3/3] Backing up storage directory...
xcopy /E /I /Y storage\app\public %BACKUP_DIR%\storage
echo Storage directory backed up to %BACKUP_DIR%\storage

echo.
echo ===================================
echo Backup complete!
echo ===================================
echo.
echo Your backup has been saved to: %BACKUP_DIR%
echo.
echo Press any key to exit...
pause > nul
