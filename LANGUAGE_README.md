# Multi-Language Support for Shongjukto

This application now supports both **English** and **Bengali** languages for better user accessibility.

## Features

- **Dual Language Support**: English and Bengali
- **Easy Language Switching**: Users can switch languages using the language switcher
- **Automatic Language Detection**: System remembers user's language preference
- **Comprehensive Translations**: All major UI elements are translated
- **User-Friendly Interface**: Language switcher is available on all user-facing pages

## How to Use

### For Users

1. **Language Switcher**: Look for the language dropdown (🌐 Language) in the top navigation bar
2. **Switch Languages**: Click on the dropdown and select either "English" or "বাংলা"
3. **Automatic Saving**: Your language preference is automatically saved and will be remembered

### Language Switcher Location

The language switcher appears in the top navigation bar on:
- Home page
- Login page
- Signup page
- All other user-facing pages

## Supported Languages

### English (en)
- Default language
- Full application interface
- All forms, buttons, and messages

### Bengali (বাংলা)
- Complete Bengali translation
- All user interface elements
- Form labels and validation messages
- Navigation and buttons

## Translation Coverage

The following areas are fully translated:

- **Navigation**: Home, Login, Logout, Profile, etc.
- **Forms**: All input labels, placeholders, and buttons
- **Messages**: Success, error, and information messages
- **Status**: Pending, Accepted, Completed, etc.
- **Actions**: Create, Edit, Delete, Save, etc.
- **User Roles**: Donor, Volunteer, Beneficiary
- **Features**: Help Requests, Donations, Appointments, Sponsorships

## Technical Implementation

### Files Created
- `resources/lang/en/messages.php` - English translations
- `resources/lang/bn/messages.php` - Bengali translations
- `app/Http/Controllers/LanguageController.php` - Language switching logic
- `app/Http/Middleware/LanguageMiddleware.php` - Automatic language detection
- `resources/views/components/language-switcher.blade.php` - Language switcher component

### Routes
- `GET /language/{locale}` - Language switching endpoint

### Middleware
- `LanguageMiddleware` - Automatically sets user's preferred language

## Adding New Translations

To add new text to the translation system:

1. **Add to English file** (`resources/lang/en/messages.php`):
```php
'new_key' => 'New English Text',
```

2. **Add to Bengali file** (`resources/lang/bn/messages.php`):
```php
'new_key' => 'নতুন বাংলা টেক্সট',
```

3. **Use in views**:
```php
{{ __('messages.new_key') }}
```

## Browser Compatibility

- Modern browsers with JavaScript enabled
- Bootstrap 5.3.0+ for styling
- Font Awesome 6.0.0+ for icons

## Notes

- **Admin Interface**: Admin pages are not translated (as requested)
- **Default Language**: English is the default fallback language
- **Session Storage**: Language preference is stored in user session
- **Performance**: Minimal impact on application performance

## Support

For any issues with the language system or to add new languages, please contact the development team.
