# Filament Navigation Group Guide

## Overview

This guide explains how the Filament admin panel sidebar navigation is organized with the "Blogs" menu group.

## Navigation Structure

The Filament sidebar now has a **"Blogs"** navigation group containing three submenus:

1. **Posts** (icon: document-text) - Manage blog posts
2. **Categories** (icon: folder) - Manage blog categories
3. **Tags** (icon: tag) - Manage blog tags

## Implementation Details

### Method Override Approach

Due to Filament v4's strict type checking, we use **method overrides** instead of property declarations:

```php
// ✅ CORRECT: Method override approach
public static function getNavigationIcon(): ?string
{
    return 'heroicon-o-document-text';
}

public static function getNavigationGroup(): ?string
{
    return 'Blogs';
}

// ❌ INCORRECT: Property declaration causes type mismatch error
protected static ?string $navigationIcon = 'heroicon-o-document-text';
protected static ?string $navigationGroup = 'Blogs';
```

### Navigation Sort Order

Resources are ordered using the `$navigationSort` property:

```php
protected static ?int $navigationSort = 1; // Posts appear first
protected static ?int $navigationSort = 2; // Categories appear second
protected static ?int $navigationSort = 3; // Tags appear third
```

## File Locations

-   **PostResource.php**: `app/Filament/Resources/Posts/PostResource.php`
-   **CategoryResource.php**: `app/Filament/Resources/Categories/CategoryResource.php`
-   **TagResource.php**: `app/Filament/Resources/Tags/TagResource.php`

## Available Heroicons

Common icons used in Filament navigation:

-   `heroicon-o-document-text` - Documents, posts, articles
-   `heroicon-o-folder` - Categories, collections, groups
-   `heroicon-o-tag` - Tags, labels, keywords
-   `heroicon-o-newspaper` - News, blog
-   `heroicon-o-photo` - Images, media
-   `heroicon-o-user-group` - Users, teams
-   `heroicon-o-cog-6-tooth` - Settings, configuration

Find more icons at: https://heroicons.com/

## Troubleshooting

### Type Mismatch Errors

If you see errors like:

```
Type of App\Filament\Resources\...\Resource::$navigationIcon must be BackedEnum|string|null
```

**Solution**: Use method overrides instead of property declarations.

### Cache Issues

After making changes, always clear caches:

```powershell
php artisan optimize:clear
```

This clears:

-   Application cache
-   Configuration cache
-   Route cache
-   View cache
-   Filament cache
-   Blade Icons cache

## Customization Options

### Change Group Name

```php
public static function getNavigationGroup(): ?string
{
    return 'Content Management'; // Change to your preferred name
}
```

### Change Icon

```php
public static function getNavigationIcon(): ?string
{
    return 'heroicon-o-newspaper'; // Use any Heroicon
}
```

### Change Sort Order

```php
protected static ?int $navigationSort = 10; // Higher numbers appear later
```

### Add Navigation Badge

```php
public static function getNavigationBadge(): ?string
{
    return static::getModel()::count(); // Shows count of records
}
```

## Related Documentation

-   [Filament Resources Documentation](https://filamentphp.com/docs/4.x/panels/resources)
-   [Filament Navigation Documentation](https://filamentphp.com/docs/4.x/panels/navigation)
-   [Heroicons](https://heroicons.com/)
