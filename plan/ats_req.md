# 📄 ATS Project & Ultimate Dynamic CMS - Architecture Blueprint

## 1. Project Overview & Core Stack
* **Framework:** Laravel 11 (MVC Architecture).
* **Admin Panel:** Filament v4.
* **Localization:** `spatie/laravel-translatable` (Arabic/English with dynamic RTL/LTR support).
* **Key Packages:**
    * `spatie/laravel-permission` (Roles & Permissions management).
    * `spatie/laravel-medialibrary` (Professional Media/Image handling).
    * `spatie/laravel-activitylog` (Audit trails - Tracking admin actions).
    * `spatie/laravel-seo` or custom JSON SEO fields.
    * `pxlrbt/filament-excel` (For Bulk Export/Import of data to/from Excel).
    * `flowframe/laravel-trend` (For generating analytics charts and reports).

---

## 2. Global Rules & Technical Standards

> **⚠️ RULE #1 (Visibility Control):** Every single table in the database MUST include an `is_active` (Boolean, default: true) column. This allows the Admin to toggle visibility for any record (Pages, Products, Menu Items, etc.) without deletion.

> **⚠️ RULE #2 (Translation):** All translatable text/rich-text fields MUST use `JSON` columns in the database to support multi-language content (AR/EN) via Spatie Translatable.

---

## 3. Database Architecture & Entities

### A. Core CMS & Navigation (إدارة النظام والواجهات)

**1. `settings` Table** (Global configuration)
* `id`, `key` (Unique string), `value` (JSON - Translatable), `type` (text, image, url), `is_active`.

**2. `menus` Table** (Navigation areas)
* `id`, `name`, `location` (e.g., 'header', 'footer'), `is_active`.

**3. `menu_items` Table** (The Dynamic Tabs system)
* `id`, `menu_id`, `title` (JSON - Translatable), `url` (Nullable), `page_id` (Link to internal page), `order` (Integer), `target`, `is_active`.

**4. `pages` Table** (Dynamic Page Builder)
* `id`, `title` (JSON), `slug` (JSON), `content` (JSON - Rich Text), `meta_description` (JSON), `is_active`.

**5. `sliders` Table** (Hero section & Home banners)
* `id`, `title` (JSON), `subtitle` (JSON), `image_path`, `button_text` (JSON), `link`, `order`, `is_active`.

### B. Products & IT Services (المنتجات والخدمات)

**6. `categories` Table**
* `id`, `name` (JSON), `slug` (JSON), `is_active`.

**7. `products` Table** (Hardware/Software products)
* `id`, `category_id`, `name` (JSON), `description` (JSON - Rich Text), `price`, `views_count` (BigInteger, default: 0), `orders_count` (Integer, default: 0), `is_active`.
* *Note: Images managed via Spatie Media Library. Admin can track views_count to see the most visited products.*

**8. `services` Table** (Solutions, Network Design, Repair, etc.)
* `id`, `title` (JSON), `description` (JSON), `icon_class`, `is_active`.

### C. Advanced Management (الإدارة المتقدمة)

**9. `seo_metadata` (Optional or as JSON fields in tables)**
* Fields: `seo_title` (JSON), `seo_keywords` (JSON), `seo_description` (JSON).

**10. `contact_messages` Table**
* `id`, `name`, `email`, `phone`, `subject`, `message`, `status` (pending, read, resolved), `is_active`.

---

## 4. Filament v4 Dashboard Configuration

The Admin Panel must be structured into the following Navigation Groups for better UX:

* **📊 Analytics & Insights:**
    * **Dashboard Widgets:** Show visual charts for Traffic Overview and System Activity.
    * **Top Products:** Display a widget for the most visited and most requested products based on `views_count` and `orders_count`.
* **🛠 Site Infrastructure:**
    * **General Settings:** Control site-wide data (Logo, Contact Info).
    * **Navigation Builder:** Drag & Drop management for `menus` and `menu_items`.
    * **Sliders:** Manage homepage banners.
* **📄 Content:**
    * **Pages:** Create and edit dynamic content pages.
* **🛍 Catalog & Services:**
    * **Categories:** Manage groupings.
    * **Products:** Full control over products and their media. MUST include Excel Bulk Export/Import actions.
    * **Services:** Manage IT solutions and repair services. MUST include Excel Bulk Export/Import actions.
* **👤 User Management:**
    * **Roles & Permissions:** Define what each admin can see/do.
    * **Admins:** Manage dashboard users.
* **📈 Logs & Support:**
    * **Contact Messages:** Handle user inquiries.
    * **Activity Logs:** View history of changes made by admins.

---

## 5. Development Guidelines (Antigravity Team)

1. **RTL Support:** The Filament dashboard and Frontend must automatically switch to RTL when Arabic is selected.
2. **Media Library:** Use Spatie Media Library components in Filament for all image uploads to ensure proper resizing and optimization.
3. **View Composers:** Inject `Settings` and `ActiveMenuItems` globally into the `master.blade.php`.
4. **Caching:** Ensure that navigation menus and global settings are cached and cleared only upon update to optimize performance.
5. **Data Export/Import:** Utilize `pxlrbt/filament-excel` to enable Bulk Export and Import capabilities across all primary resources (Products, Services, Contact Messages) to allow the Admin to download reports easily.
