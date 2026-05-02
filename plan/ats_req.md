<<<<<<< Updated upstream
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
=======
ATS Enterprise CMS - FINAL MASTER ARCHITECTURE BLUEPRINT
1. Project Overview & Core Stack
Framework: Laravel 11 (MVC Architecture).

Admin Panel: Filament v4.

Localization: spatie/laravel-translatable (Arabic/English with dynamic RTL/LTR support).

Key Packages: spatie/laravel-permission, spatie/laravel-medialibrary, spatie/laravel-activitylog, pxlrbt/filament-excel, flowframe/laravel-trend, bezhansalleh/filament-language-switch.

2. Global Rules & Technical Standards
⚠️ RULE #1 (Zero-Static Policy): The frontend MUST be 100% dynamic. No hardcoded text, labels, or images.
⚠️ RULE #2 (Visibility Control): Every single table MUST include an is_active (boolean, default: true) column.
⚠️ RULE #3 (Translation Enforcement): All translatable text/rich-text fields MUST use JSON columns in the DB.
⚠️ RULE #4 (UI Switcher): The Filament Dashboard MUST have a UI Language Switcher (AR/EN) that dynamically flips the layout to RTL when Arabic is selected.
⚠️ RULE #5 (Language Syncing): Data entered in the English dashboard appears in the English frontend, and Arabic data in the Arabic frontend.

3. Database Architecture & Entities
A. Site Infrastructure & CMS
settings: id, key (Unique), value (JSON), type (text, image, json_array), is_active.

content_blocks: id, key (Unique string), content (JSON translatable). Uses MediaLibrary.

menus: id, name, location (header_main, footer_products, mobile_bottom_nav), is_active.

menu_items: id, menu_id, title (JSON), url (nullable), page_id (nullable), icon_svg (text, nullable - for raw SVG code), order, target, is_active.

sliders: id, title (JSON), subtitle (JSON), button_text (JSON), link, order, is_active. (Uses MediaLibrary).

pages: id, slug (unique), title (JSON), content (JSON Rich Text), seo_title (JSON), seo_description (JSON), is_active.

B. E-Commerce (Catalog & Products)
categories: id, name (JSON), slug (JSON), is_active. (Uses MediaLibrary).

products: id, category_id, sku, name (JSON), description (JSON Rich Text), price (decimal), sale_price (decimal, nullable), brand (string, nullable), stock (integer), stock_status (JSON), features_list (JSON array), specifications (JSON Key-Value), seo_title (JSON), seo_description (JSON), views_count, is_active. (Uses MediaLibrary for 'gallery').

product_variants: id, product_id, attribute_name (JSON), attribute_value (JSON), price_adjustment, stock, is_active.

product_reviews: id, product_id, user_id (nullable), reviewer_name, rating, comment, is_active.

C. E-Commerce (Users, Orders & Tracking)
users (Extend default): first_name, last_name, phone, last_login_at (timestamp), last_login_ip (string), is_active.

addresses: id, user_id, address_line_1, apartment, city, country, is_default, is_active.

orders: id, user_id, order_number (unique), status (pending, processing, shipped, delivered, cancelled), subtotal, shipping_fee, tax, total_amount, address_id, is_active.

order_items: id, order_id, product_id, quantity, unit_price, attributes (JSON).

order_tracking_events: id, order_id, status (key), location, description (JSON), event_date, is_active.

D. Corporate & HR
services: id, title (JSON), description (JSON Rich Text), seo_title (JSON), seo_description (JSON), is_active. (Uses MediaLibrary).

features: id, title (JSON), description (JSON), icon_class, is_active.

timeline_events: id, year, title (JSON), description (JSON), is_active.

certifications, partners, team_members: All with JSON support, MediaLibrary, and is_active toggle.

careers: id, title (JSON), location, type, salary, description (JSON Rich Text), requirements (JSON), is_active.

faqs, contact_messages, testimonials: All standard CMS models.

4. Multilanguage & Auth Logic
🌐 Language Synchronization
Dashboard: Switcher in Top-bar. Switching to Arabic applies RTL direction to UI.

Data Entry: Tabs/Toggles for AR/EN in all translatable fields.

Frontend: Automatic locale detection from URL/Session. Master layout switches dir="rtl" or dir="ltr".

🛡️ User Management & RBAC
Permissions: Managed via Checkbox List for each Role/User.

Audit Trail: Every Create, Update, Delete is logged with Old vs New JSON comparison. Causer tracking enabled.

Session Tracking: last_login_at and last_login_ip updated on every admin login.

5. Filament v4 Structure (Navigation Groups)
📊 Analytics & Insights (Dashboard).

🛍 E-Commerce (Products, Reviews, Orders, Order Tracking). Excel Export Enabled.

🏢 Corporate (Services, Features, Partners, Team Members, Careers).

📄 Content & Legal (Pages, FAQs, Sliders, Timeline).

🛠 Site Infrastructure (Settings, Content Blocks, Menus).

👤 Users & Auditing (Users, Roles, Activity Logs).

6. Final Optimization & UX Directives
SEO Suite: Custom Meta fields for all products, services, and pages.

Image Optimization: Automated conversion of all uploads to WebP format.

Smart Redirects: Post-login/register redirect back to the previous context (Cart/Checkout).

7. Execution Directives for Developer (Antigravity)
Migrations: Ensure all translatable columns are JSON and is_active defaults to true.

Models: Implement HasTranslations and InteractsWithMedia where specified.

Filament: Build resources strictly matching the navigation groups. Use Repeaters for JSON arrays.
>>>>>>> Stashed changes
