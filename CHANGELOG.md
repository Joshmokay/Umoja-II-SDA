# Changelog

All notable changes to the Umoja II SDA Church website project will be documented in this file.

## [Unreleased]

### Removed
- **SDA Sidebar**: Completely removed the vertical SDA sidebar from all layouts (`front.blade.php`), views, and responsive behaviors. The associated `sidebar.blade.php` component was deleted.
- **Sidebar Offset**: Removed the `lg:mr-[80px]` right margin offset from the main layout wrapper to allow the application to properly utilize the full available viewport width seamlessly.

### Changed
- **SDA Branding Structure**: Official SDA branding (the Adventist logo and typography) has been permanently migrated into the unified top navbar, preserving the organizational identity while accommodating a modern, full-width cinematic hero design.
