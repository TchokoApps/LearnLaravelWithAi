# FAQ System - Quick Reference

## 🎯 Quick Links

| Item | Path |
|------|------|
| Model | `app/Models/Faq.php` |
| Controller | `app/Http/Controllers/FaqController.php` |
| Admin Index | `resources/views/admin/faqs/index.blade.php` |
| Admin Create | `resources/views/admin/faqs/create.blade.php` |
| Admin Edit | `resources/views/admin/faqs/edit.blade.php` |
| Routes | `routes/web.php` |
| Migration | `database/migrations/2026_03_17_000000_create_faqs_table.php` |
| Seeder | `database/seeders/FaqSeeder.php` |

## 🔗 API Endpoints

```
GET    /faqs              → List all FAQs (admin)
POST   /faqs              → Create new FAQ
GET    /faqs/create       → Show create form
GET    /faqs/{id}         → Show single FAQ
GET    /faqs/{id}/edit    → Show edit form
PUT    /faqs/{id}         → Update FAQ
DELETE /faqs/{id}         → Delete FAQ
GET    /api/faqs          → Get all FAQs as JSON
```

## 📋 Database Schema

```sql
faqs (
  id: BIGINT PRIMARY KEY,
  title: VARCHAR(255),
  description: LONGTEXT,
  order: INT (default: 0),
  is_active: BOOLEAN (default: true),
  timestamps
)
```

## 🔍 Model Scopes

```php
$activeFaqs = Faq::active()->ordered()->get();    // Get active FAQs, ordered
$allFaqs = Faq::ordered()->get();                  // Get all FAQs, ordered
$inactiveFaqs = Faq::whereActive(false)->get();   // Get inactive only
```

## 📝 Validation Rules

| Field | Rule |
|-------|------|
| title | required, string, max:255 |
| description | required, string |
| order | integer, min:0 (optional) |
| is_active | boolean (optional) |

## 🚀 Commands

```bash
# Build/seed database
php artisan migrate:fresh --seed

# Check route list
php artisan route:list | grep faq

# Check migration status
php artisan migrate:status

# Run seeder only
php artisan db:seed --class=FaqSeeder
```

## 📊 Sample API Response

```json
[
  {
    "id": 1,
    "title": "Real-Time Expense Tracking:",
    "description": "Automatically and syncs with bank...",
    "order": 1,
    "is_active": true,
    "created_at": "2026-03-18T00:00:00Z",
    "updated_at": "2026-03-18T00:00:00Z"
  }
]
```

## ✅ Checklist

- ✅ Database migration created and run
- ✅ Faq model with scopes
- ✅ StoreFaqRequest validation
- ✅ UpdateFaqRequest validation
- ✅ FaqController with all CRUD methods
- ✅ JSON API endpoint (getFaqs)
- ✅ Admin views (index, create, edit)
- ✅ Routes configured
- ✅ Seeder with sample data
- ✅ Database populated
- ✅ All tests passing

## 🎨 Frontend Integration Example

```javascript
// Fetch and display FAQs
async function loadFaqs() {
  const response = await fetch('/api/faqs');
  const faqs = await response.json();
  
  faqs.forEach(faq => {
    console.log(`${faq.title} - ${faq.description}`);
  });
}

loadFaqs();
```

## 🔧 Common Tasks

### Create a new FAQ
1. Navigate to `/faqs/create`
2. Fill in title, description, order, active status
3. Submit form

### Edit an FAQ
1. Go to `/faqs`
2. Click edit on desired FAQ
3. Modify fields
4. Submit form

### Delete an FAQ
1. Go to `/faqs`
2. Click delete on desired FAQ
3. Confirm in dialog

### Get active FAQs only (Backend)
```php
$faqs = Faq::active()->ordered()->get();
```

### Get FAQs with custom order (Frontend)
```javascript
fetch('/api/faqs')
  .then(r => r.json())
  .then(faqs => {
    const sorted = faqs.sort((a, b) => a.order - b.order);
    // Display sorted FAQs
  });
```

## ⚠️ Important Notes

- All FAQs are ordered by the 'order' column
- Only active FAQs are shown if using the active() scope
- Delete is permanent (no soft delete)
- All routes protected by auth middleware
- CSRF protection enabled on all forms
- Input validation required on all requests

## 🎓 File Purposes

| File | Purpose |
|------|---------|
| Faq.php | Database model, relationships, scopes |
| FaqController.php | Business logic, CRUD operations |
| StoreFaqRequest.php | Validate new FAQ creation |
| UpdateFaqRequest.php | Validate FAQ updates |
| create.blade.php | HTML form for new FAQ |
| edit.blade.php | HTML form for FAQ updates |
| index.blade.php | Table view of all FAQs |
| Migration | Create database table structure |
| Seeder | Populate database with sample data |
| Routes | Define URL endpoints |

---

**Status: ✅ PRODUCTION READY**

For detailed documentation, see `FAQ_IMPLEMENTATION_GUIDE.md`
