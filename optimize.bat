@echo off
echo ===================================
echo PPID Dispora Jabar Portfolio Optimizer
echo ===================================
echo.
echo This script will optimize your Laravel application for production deployment.
echo.
echo Press any key to continue...
pause > nul

echo.
echo [1/7] Clearing all caches...
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
echo Done!

echo.
echo [2/7] Optimizing Composer autoloader...
composer install --optimize-autoloader --no-dev
echo Done!

echo.
echo [3/7] Optimizing configuration loading...
php artisan config:cache
echo Done!

echo.
echo [4/7] Optimizing route loading...
php artisan route:cache
echo Done!

echo.
echo [5/7] Optimizing view loading...
php artisan view:cache
echo Done!

echo.
echo [6/7] Generating storage link...
php artisan storage:link
echo Done!

echo.
echo [7/7] Checking for security vulnerabilities...
composer audit
echo Done!

echo.
echo ===================================
echo Optimization complete!
echo ===================================
echo.
echo Your Laravel application is now optimized for production deployment.
echo Please refer to DEPLOYMENT_GUIDE.md for deployment instructions.
echo.
echo Press any key to exit...
pause > nul
