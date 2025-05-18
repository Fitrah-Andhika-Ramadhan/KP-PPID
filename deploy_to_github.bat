@echo off
echo ===================================
echo PPID Dispora Jabar Portfolio - GitHub Pages Deployment
echo ===================================
echo.
echo This script will generate a static version of your website and deploy it to GitHub Pages.
echo.
echo Prerequisites:
echo - Git installed and configured
echo - GitHub repository created
echo - GitHub CLI (gh) installed (optional, for easier authentication)
echo.
echo Press any key to continue...
pause > nul

echo.
echo [1/6] Generating static version of the website...
php static_export.php
if %errorlevel% neq 0 (
    echo Error generating static version of the website.
    echo Please check the error message above.
    goto :error
)

echo.
echo [2/6] Initializing Git repository in the static directory...
cd static
git init
if %errorlevel% neq 0 (
    echo Error initializing Git repository.
    goto :error
)

echo.
echo [3/6] Adding all files to Git...
git add .
if %errorlevel% neq 0 (
    echo Error adding files to Git.
    goto :error
)

echo.
echo [4/6] Committing changes...
git commit -m "Deploy to GitHub Pages"
if %errorlevel% neq 0 (
    echo Error committing changes.
    goto :error
)

echo.
echo [5/6] Please enter your GitHub repository URL (e.g., https://github.com/username/repository.git):
set /p repo_url="> "

echo.
echo [6/6] Pushing to GitHub Pages branch...
git push -f %repo_url% master:gh-pages
if %errorlevel% neq 0 (
    echo Error pushing to GitHub Pages.
    echo You may need to authenticate with GitHub.
    echo Try running: git push -f %repo_url% master:gh-pages
    goto :error
)

echo.
echo ===================================
echo Deployment successful!
echo ===================================
echo.
echo Your website has been deployed to GitHub Pages.
echo It will be available at: https://[username].github.io/[repository-name]/
echo.
echo Note: It may take a few minutes for the changes to appear.
echo.
echo Press any key to exit...
pause > nul
exit /b 0

:error
echo.
echo ===================================
echo Deployment failed!
echo ===================================
echo.
echo Please check the error message above and try again.
echo.
echo Press any key to exit...
pause > nul
exit /b 1
