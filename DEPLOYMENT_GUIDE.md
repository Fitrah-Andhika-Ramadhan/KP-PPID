# PPID Dispora Jabar Portfolio - Deployment Guide

This guide will help you deploy your Laravel portfolio website to a traditional PHP hosting service.

## Prerequisites

- A hosting service that supports PHP 8.0+ and MySQL/MariaDB
- SSH access to your hosting server (recommended)
- A domain name (optional, but recommended)
- FTP client like FileZilla (if SSH is not available)

## Deployment Steps

### 1. Prepare Your Local Project

Before deploying, make sure your local project is ready:

```bash
# Generate a production-optimized autoload file
composer install --optimize-autoloader --no-dev

# Compile and minify assets (if using Laravel Mix)
npm install
npm run production

# Generate application key if not already set
php artisan key:generate

# Clear caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

### 2. Database Setup

1. Create a new database on your hosting server
2. Update your `.env` file with the production database credentials:

```
DB_CONNECTION=mysql
DB_HOST=your_host
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 3. File Upload

#### Option 1: Using Git (Recommended)

If your hosting provider supports Git deployment:

```bash
# Add your remote repository
git remote add production ssh://user@your-server/path/to/repository

# Push to production
git push production main
```

#### Option 2: Using FTP/SFTP

1. Connect to your server using an FTP client
2. Upload all files except:
   - `.git` directory
   - `node_modules` directory
   - Any other development-specific files

### 4. Server Configuration

#### Apache

Make sure your `.htaccess` file is properly configured. The default Laravel `.htaccess` should work in most cases.

#### Nginx

If using Nginx, use this configuration:

```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /path/to/your/project/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### 5. Final Server Setup

Connect to your server via SSH and run:

```bash
cd /path/to/your/project

# Set correct permissions
chmod -R 755 .
chmod -R 777 storage bootstrap/cache

# Run migrations and seed the database
php artisan migrate --force
php artisan db:seed --class=DummyDataSeeder

# Generate symbolic link for storage
php artisan storage:link
```

### 6. Test Your Deployment

Visit your domain or server IP to ensure everything is working correctly.

## Troubleshooting

### Common Issues

1. **500 Server Error**
   - Check storage and bootstrap/cache permissions
   - Verify .env file exists and is properly configured
   - Check server logs for specific errors

2. **Database Connection Issues**
   - Verify database credentials in .env
   - Check if database server is accessible from web server

3. **Missing Images/Assets**
   - Ensure storage:link command was run
   - Check file permissions

### Getting Help

If you encounter issues, check:
- Laravel logs in `storage/logs/laravel.log`
- Server error logs (location varies by hosting provider)

## Maintenance

After deployment, remember to:

1. Set up regular backups of your application and database
2. Keep your Laravel application updated
3. Monitor server resources and performance

## Security Considerations

1. Ensure your `.env` file is secure and not publicly accessible
2. Set up HTTPS for your domain
3. Regularly update Laravel and all dependencies
4. Consider using a Web Application Firewall (WAF)

---

This guide covers the basics of deploying your Laravel portfolio application. Specific steps may vary depending on your hosting provider.
