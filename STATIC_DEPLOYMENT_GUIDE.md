# PPID Dispora Jabar Portfolio - Static Deployment Guide

This guide explains how to deploy the static version of your portfolio website to various hosting platforms.

## What is a Static Website?

A static website consists of HTML, CSS, and JavaScript files that are delivered to the user's browser exactly as they are stored. Unlike your Laravel application, a static website doesn't require a PHP server or database, making it easier and cheaper to host.

## Deployment Options

### 1. GitHub Pages (Free)

GitHub Pages is a free hosting service that takes HTML, CSS, and JavaScript files straight from a repository on GitHub.

#### Steps:

1. Create a GitHub account if you don't have one: https://github.com/join
2. Create a new repository on GitHub
3. Run the `deploy_to_github.bat` script and follow the prompts
4. Enter your repository URL when prompted
5. Wait a few minutes for GitHub to process your files
6. Your site will be available at `https://[username].github.io/[repository-name]/`

### 2. Netlify (Free)

Netlify offers free hosting for static websites with additional features like forms and serverless functions.

#### Steps:

1. Create a Netlify account: https://app.netlify.com/signup
2. Click "New site from Git" or go to the "Sites" tab and click "Add new site" > "Import an existing project"
3. Connect your GitHub account and select your repository
4. Set the publish directory to `static`
5. Click "Deploy site"
6. Your site will be available at a Netlify subdomain (e.g., `https://your-site-name.netlify.app`)

### 3. Vercel (Free)

Vercel is another platform that offers free static site hosting with a global CDN.

#### Steps:

1. Create a Vercel account: https://vercel.com/signup
2. Click "Import Project" and select your GitHub repository
3. Set the output directory to `static`
4. Click "Deploy"
5. Your site will be available at a Vercel subdomain (e.g., `https://your-site-name.vercel.app`)

### 4. Traditional Web Hosting

You can also upload the static files to any traditional web hosting service.

#### Steps:

1. Log in to your web hosting control panel
2. Navigate to the file manager or FTP client
3. Upload all files from the `static` directory to your web hosting's public directory (usually `public_html` or `www`)
4. Your site will be available at your domain

## Limitations of the Static Version

The static version of your portfolio website has some limitations:

1. **No Database**: Dynamic content from the database is captured at the time of generation
2. **No Form Processing**: Forms will not actually submit data (they show an alert instead)
3. **No Admin Panel**: The admin functionality is not available
4. **No Server-Side Processing**: Any PHP code will not execute

## Updating Your Static Site

To update your static site after making changes to your Laravel application:

1. Make your changes in the Laravel application
2. Run `php static_export.php` to generate a new static version
3. Deploy the updated static files using one of the methods above

## Custom Domain

All the platforms mentioned above support custom domains. After deploying your site, you can configure your custom domain in the platform's settings.

## Need Full Functionality?

If you need the full functionality of your Laravel application, refer to the `DEPLOYMENT_GUIDE.md` for instructions on deploying the complete application to a PHP-enabled hosting service.
