<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContentBlock;

class ContentBlockSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            // Header
            ['key' => 'header_location', 'group' => 'header', 'type' => 'text', 'content' => ['en' => 'Alexandria, EG', 'ar' => 'الإسكندرية، مصر']],
            ['key' => 'header_email', 'group' => 'header', 'type' => 'text', 'content' => ['en' => 'sales@ats.com', 'ar' => 'sales@ats.com']],
            ['key' => 'header_my_account', 'group' => 'header', 'type' => 'text', 'content' => ['en' => 'My Account', 'ar' => 'حسابي']],
            ['key' => 'header_my_orders', 'group' => 'header', 'type' => 'text', 'content' => ['en' => 'My Orders', 'ar' => 'طلباتي']],
            ['key' => 'header_cart', 'group' => 'header', 'type' => 'text', 'content' => ['en' => 'Cart', 'ar' => 'السلة']],
            ['key' => 'header_items', 'group' => 'header', 'type' => 'text', 'content' => ['en' => 'Items', 'ar' => 'عناصر']],
            ['key' => 'header_subtotal', 'group' => 'header', 'type' => 'text', 'content' => ['en' => 'Subtotal', 'ar' => 'الإجمالي الفرعي']],
            ['key' => 'header_view_cart', 'group' => 'header', 'type' => 'text', 'content' => ['en' => 'View Cart', 'ar' => 'عرض السلة']],
            ['key' => 'header_checkout', 'group' => 'header', 'type' => 'text', 'content' => ['en' => 'Checkout', 'ar' => 'الدفع']],
            ['key' => 'header_support', 'group' => 'header', 'type' => 'text', 'content' => ['en' => 'Support', 'ar' => 'الارتقاء بأعمالك']],
            
            // Footer
            ['key' => 'footer_products_col', 'group' => 'footer', 'type' => 'text', 'content' => ['en' => 'Products', 'ar' => 'المنتجات']],
            ['key' => 'footer_company_col', 'group' => 'footer', 'type' => 'text', 'content' => ['en' => 'Company', 'ar' => 'الشركة']],
            ['key' => 'footer_contact_col', 'group' => 'footer', 'type' => 'text', 'content' => ['en' => 'Contact Info', 'ar' => 'معلومات الاتصال']],
            ['key' => 'footer_rights', 'group' => 'footer', 'type' => 'text', 'content' => ['en' => 'Alex Technology Systems. All rights reserved.', 'ar' => 'أنظمة أليكس تكنولوجي. جميع الحقوق محفوظة.']],
            ['key' => 'footer_privacy', 'group' => 'footer', 'type' => 'text', 'content' => ['en' => 'Privacy Policy', 'ar' => 'سياسة الخصوصية']],
            ['key' => 'footer_terms', 'group' => 'footer', 'type' => 'text', 'content' => ['en' => 'Terms of Service', 'ar' => 'شروط الخدمة']],

            // Home Page
            ['key' => 'home_hero_subtitle', 'group' => 'home', 'type' => 'text', 'content' => ['en' => 'Enterprise IT Solutions', 'ar' => 'حلول تكنولوجيا المعلومات للمؤسسات']],
            ['key' => 'home_hero_title', 'group' => 'home', 'type' => 'text', 'content' => ['en' => 'Architecting the Future of Enterprise IT.', 'ar' => 'تصميم مستقبل تكنولوجيا المعلومات للمؤسسات.']],
            ['key' => 'home_hero_description', 'group' => 'home', 'type' => 'text', 'content' => ['en' => 'We deliver scalable, secure, and high-performance technology infrastructure tailored to your business needs.', 'ar' => 'نحن نقدم بنية تحتية تكنولوجية قابلة للتطوير وآمنة وعالية الأداء مصممة لتلبية احتياجات عملك.']],
            ['key' => 'home_services_subtitle', 'group' => 'home', 'type' => 'text', 'content' => ['en' => 'Professional Services', 'ar' => 'خدمات احترافية']],
            ['key' => 'home_services_title', 'group' => 'home', 'type' => 'text', 'content' => ['en' => 'Beyond Hardware. We Deliver Solutions.', 'ar' => 'أكثر من مجرد أجهزة. نحن نقدم حلولاً.']],
            ['key' => 'home_cta_title', 'group' => 'home', 'type' => 'text', 'content' => ['en' => 'Ready to Upgrade Your Infrastructure?', 'ar' => 'هل أنت مستعد لترقية بنيتك التحتية؟']],
            ['key' => 'home_cta_desc', 'group' => 'home', 'type' => 'text', 'content' => ['en' => 'Speak directly with one of our senior solutions architects to discuss your specific requirements.', 'ar' => 'تحدث مباشرة مع أحد كبار مهندسي الحلول لدينا لمناقشة متطلباتك المحددة.']],

            // About Page
            ['key' => 'about_hero_title', 'group' => 'about', 'type' => 'text', 'content' => ['en' => 'Architecting the Future of Enterprise IT.', 'ar' => 'تصميم مستقبل تكنولوجيا المعلومات للمؤسسات.']],
            ['key' => 'about_hero_desc', 'group' => 'about', 'type' => 'text', 'content' => ['en' => 'Since 2008, ATS has been the trusted technology partner for hundreds of organizations across Egypt and the MENA region.', 'ar' => 'منذ عام 2008، كانت ATS الشريك التكنولوجي الموثوق لمئات المؤسسات في مصر ومنطقة الشرق الأوسط وشمال أفريقيا.']],
            ['key' => 'about_stat_1_val', 'group' => 'about', 'type' => 'text', 'content' => ['en' => '15+', 'ar' => '+15']],
            ['key' => 'about_stat_1_lbl', 'group' => 'about', 'type' => 'text', 'content' => ['en' => 'Years Experience', 'ar' => 'سنوات الخبرة']],
            ['key' => 'about_stat_2_val', 'group' => 'about', 'type' => 'text', 'content' => ['en' => '450+', 'ar' => '+450']],
            ['key' => 'about_stat_2_lbl', 'group' => 'about', 'type' => 'text', 'content' => ['en' => 'Enterprise Clients', 'ar' => 'عملاء الشركات']],
            ['key' => 'about_stat_3_val', 'group' => 'about', 'type' => 'text', 'content' => ['en' => '99.9%', 'ar' => '99.9%']],
            ['key' => 'about_stat_3_lbl', 'group' => 'about', 'type' => 'text', 'content' => ['en' => 'Uptime Guarantee', 'ar' => 'ضمان وقت التشغيل']],
            ['key' => 'about_stat_4_val', 'group' => 'about', 'type' => 'text', 'content' => ['en' => '24/7', 'ar' => '24/7']],
            ['key' => 'about_stat_4_lbl', 'group' => 'about', 'type' => 'text', 'content' => ['en' => 'Technical Support', 'ar' => 'الدعم الفني']],
            ['key' => 'about_journey_title', 'group' => 'about', 'type' => 'text', 'content' => ['en' => 'Our Journey', 'ar' => 'رحلتنا']],
            ['key' => 'about_journey_content', 'group' => 'about', 'type' => 'rich_text', 'content' => ['en' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', 'ar' => '<p>لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا .</p>']],
            
            // Solutions Page
            ['key' => 'solutions_hero_subtitle', 'group' => 'solutions', 'type' => 'text', 'content' => ['en' => 'Enterprise IT Solutions', 'ar' => 'حلول تكنولوجيا المعلومات للمؤسسات']],
            ['key' => 'solutions_hero_title', 'group' => 'solutions', 'type' => 'text', 'content' => ['en' => 'Build a robust digital foundation.', 'ar' => 'بناء أساس رقمي قوي.']],
            ['key' => 'solutions_hero_desc', 'group' => 'solutions', 'type' => 'text', 'content' => ['en' => 'ATS provides end-to-end technology infrastructure solutions designed to scale with your business.', 'ar' => 'توفر ATS حلول البنية التحتية التكنولوجية الشاملة المصممة لتتوسع مع عملك.']],
            ['key' => 'solutions_capabilities_title', 'group' => 'solutions', 'type' => 'text', 'content' => ['en' => 'Core Capability Areas', 'ar' => 'مجالات القدرة الأساسية']],
            ['key' => 'solutions_capabilities_desc', 'group' => 'solutions', 'type' => 'text', 'content' => ['en' => 'We deliver tailored solutions across four primary domains.', 'ar' => 'نحن نقدم حلولاً مخصصة عبر أربعة مجالات أساسية.']],
            ['key' => 'solutions_blueprint_subtitle', 'group' => 'solutions', 'type' => 'text', 'content' => ['en' => 'Solution Blueprint', 'ar' => 'مخطط الحل']],
            ['key' => 'solutions_blueprint_title', 'group' => 'solutions', 'type' => 'text', 'content' => ['en' => 'Enterprise Network Architecture', 'ar' => 'بنية شبكة المؤسسة']],
            ['key' => 'solutions_blueprint_desc', 'group' => 'solutions', 'type' => 'text', 'content' => ['en' => 'A comprehensive approach to building a resilient, high-capacity corporate network.', 'ar' => 'نهج شامل لبناء شبكة شركات مرنة وعالية السعة.']],

            // Services Page
            ['key' => 'services_hero_subtitle', 'group' => 'services', 'type' => 'text', 'content' => ['en' => 'Enterprise Solutions', 'ar' => 'حلول المؤسسات']],
            ['key' => 'services_hero_title', 'group' => 'services', 'type' => 'text', 'content' => ['en' => 'Transform Your IT Infrastructure.', 'ar' => 'قم بتحويل بنيتك التحتية لتكنولوجيا المعلومات.']],
            ['key' => 'services_hero_desc', 'group' => 'services', 'type' => 'text', 'content' => ['en' => 'From robust network installations to proactive 24/7 managed support, ATS delivers premium technology services.', 'ar' => 'من تركيبات الشبكات القوية إلى الدعم المدار الاستباقي على مدار الساعة طوال أيام الأسبوع ، تقدم ATS خدمات تقنية متميزة.']],
            ['key' => 'services_catalog_title', 'group' => 'services', 'type' => 'text', 'content' => ['en' => 'Comprehensive Service Catalog', 'ar' => 'كتالوج خدمات شامل']],
            ['key' => 'services_catalog_desc', 'group' => 'services', 'type' => 'text', 'content' => ['en' => 'Explore our core service offerings.', 'ar' => 'استكشف عروض خدماتنا الأساسية.']],
            ['key' => 'services_methodology_title', 'group' => 'services', 'type' => 'text', 'content' => ['en' => 'The ATS Methodology', 'ar' => 'منهجية ATS']],
            ['key' => 'services_methodology_desc', 'group' => 'services', 'type' => 'text', 'content' => ['en' => 'We do not just fix problems; we engineer solutions.', 'ar' => 'نحن لا نصلح المشاكل فحسب ؛ بل نبتكر الحلول.']],
            ['key' => 'services_step_1_title', 'group' => 'services', 'type' => 'text', 'content' => ['en' => '1. Discovery & Audit', 'ar' => '1. الاكتشاف والمراجعة']],
            ['key' => 'services_step_1_desc', 'group' => 'services', 'type' => 'text', 'content' => ['en' => 'We analyze your current infrastructure.', 'ar' => 'نقوم بتحليل بنيتك التحتية الحالية.']],
            ['key' => 'services_step_2_title', 'group' => 'services', 'type' => 'text', 'content' => ['en' => '2. Strategy & Design', 'ar' => '2. الاستراتيجية والتصميم']],
            ['key' => 'services_step_2_desc', 'group' => 'services', 'type' => 'text', 'content' => ['en' => 'Our architects draft a tailored solution.', 'ar' => 'يقوم مهندسونا بصياغة حل مخصص.']],
            ['key' => 'services_step_3_title', 'group' => 'services', 'type' => 'text', 'content' => ['en' => '3. Deployment & Support', 'ar' => '3. النشر والدعم']],
            ['key' => 'services_step_3_desc', 'group' => 'services', 'type' => 'text', 'content' => ['en' => 'Seamless implementation.', 'ar' => 'تنفيذ سلس.']],
            ['key' => 'services_cta_title', 'group' => 'services', 'type' => 'text', 'content' => ['en' => 'Ready to upgrade your infrastructure?', 'ar' => 'هل أنت مستعد لترقية بنيتك التحتية؟']],
            ['key' => 'services_cta_desc', 'group' => 'services', 'type' => 'text', 'content' => ['en' => 'Speak directly with one of our senior solutions architects.', 'ar' => 'تحدث مباشرة مع أحد كبار مهندسي الحلول لدينا.']],

            // Contact Page
            ['key' => 'contact_hero_title', 'group' => 'contact', 'type' => 'text', 'content' => ['en' => 'Get in Touch', 'ar' => 'ابقى على تواصل']],
            ['key' => 'contact_hero_desc', 'group' => 'contact', 'type' => 'text', 'content' => ['en' => 'Whether you need a hardware quote, technical support, or a complete infrastructure consultation, our team is ready to assist.', 'ar' => 'سواء كنت بحاجة إلى عرض أسعار للأجهزة ، أو دعم فني ، أو استشارة كاملة حول البنية التحتية ، فإن فريقنا مستعد للمساعدة.']],
            ['key' => 'contact_sales_title', 'group' => 'contact', 'type' => 'text', 'content' => ['en' => 'Sales & General Inquiries', 'ar' => 'المبيعات والاستفسارات العامة']],
            ['key' => 'contact_sales_desc', 'group' => 'contact', 'type' => 'text', 'content' => ['en' => 'Mon-Thu: 9:00 AM - 5:00 PM', 'ar' => 'من الاثنين إلى الخميس: 9:00 صباحًا - 5:00 مساءً']],
            ['key' => 'contact_email_title', 'group' => 'contact', 'type' => 'text', 'content' => ['en' => 'Email Support', 'ar' => 'دعم البريد الإلكتروني']],
            ['key' => 'contact_email_desc', 'group' => 'contact', 'type' => 'text', 'content' => ['en' => 'Guaranteed 2-hour response during business hours.', 'ar' => 'استجابة مضمونة خلال ساعتين في ساعات العمل.']],
            ['key' => 'contact_hq_title', 'group' => 'contact', 'type' => 'text', 'content' => ['en' => 'Headquarters', 'ar' => 'المقر الرئيسي']],
            ['key' => 'contact_form_title', 'group' => 'contact', 'type' => 'text', 'content' => ['en' => 'Send a Message', 'ar' => 'إرسال رسالة']],
            ['key' => 'contact_form_desc', 'group' => 'contact', 'type' => 'text', 'content' => ['en' => 'Fill out the form below and an ATS representative will contact you shortly.', 'ar' => 'املأ النموذج أدناه وسيقوم ممثل ATS بالاتصال بك قريبا.']],
            ['key' => 'contact_form_name', 'group' => 'contact', 'type' => 'text', 'content' => ['en' => 'Full Name', 'ar' => 'الاسم الكامل']],
            ['key' => 'contact_form_email', 'group' => 'contact', 'type' => 'text', 'content' => ['en' => 'Email Address', 'ar' => 'البريد الإلكتروني']],
            ['key' => 'contact_form_phone', 'group' => 'contact', 'type' => 'text', 'content' => ['en' => 'Phone Number', 'ar' => 'رقم الهاتف']],
            ['key' => 'contact_form_type', 'group' => 'contact', 'type' => 'text', 'content' => ['en' => 'Inquiry Type', 'ar' => 'نوع الاستفسار']],
            ['key' => 'contact_form_message', 'group' => 'contact', 'type' => 'text', 'content' => ['en' => 'Your Message', 'ar' => 'رسالتك']],
            ['key' => 'contact_form_submit', 'group' => 'contact', 'type' => 'text', 'content' => ['en' => 'Send Message', 'ar' => 'إرسال الرسالة']],

            // Careers Page
            ['key' => 'careers_hero_title', 'group' => 'careers', 'type' => 'text', 'content' => ['en' => 'Join Our Team', 'ar' => 'انضم لفريقنا']],
            ['key' => 'careers_hero_desc', 'group' => 'careers', 'type' => 'text', 'content' => ['en' => 'Discover your next career opportunity and help us build the future of Enterprise IT.', 'ar' => 'اكتشف فرصة عملك القادمة وساعدنا في بناء مستقبل تكنولوجيا المعلومات للمؤسسات.']],
            ['key' => 'careers_apply_btn', 'group' => 'careers', 'type' => 'text', 'content' => ['en' => 'Apply Now', 'ar' => 'قدم الان']],
            ['key' => 'careers_no_jobs_title', 'group' => 'careers', 'type' => 'text', 'content' => ['en' => 'No Open Positions', 'ar' => 'لا توجد وظائف شاغرة']],
            ['key' => 'careers_no_jobs_desc', 'group' => 'careers', 'type' => 'text', 'content' => ['en' => 'We are not actively hiring right now, but we are always looking for great talent.', 'ar' => 'نحن لا نقوم بالتوظيف بنشاط في الوقت الحالي، ولكننا نبحث دائمًا عن المواهب الرائعة.']],

            // Shop Catalog
            ['key' => 'catalog_breadcrumbs_home', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Home', 'ar' => 'الرئيسية']],
            ['key' => 'catalog_breadcrumbs_current', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'All Products', 'ar' => 'جميع المنتجات']],
            ['key' => 'catalog_filters_title', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Filters', 'ar' => 'التصنيفات']],
            ['key' => 'catalog_clear_all', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Clear All', 'ar' => 'مسح الكل']],
            ['key' => 'catalog_categories_title', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Categories', 'ar' => 'الفئات']],
            ['key' => 'catalog_price_title', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Price (EGP)', 'ar' => 'السعر (ج.م)']],
            ['key' => 'catalog_brands_title', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Brands', 'ar' => 'العلامات التجارية']],
            ['key' => 'catalog_sort_title', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Sort By', 'ar' => 'ترتيب حسب']],
            ['key' => 'catalog_apply_filters', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Apply Filters', 'ar' => 'تطبيق']],
            ['key' => 'catalog_no_products', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'No products found matching your criteria.', 'ar' => 'لم يتم العثور على منتجات مطابقة لمعاييرك.']],

            // Shop Product
            ['key' => 'product_sale_badge', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Sale', 'ar' => 'تخفيض']],
            ['key' => 'product_share_btn', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Share', 'ar' => 'مشاركة']],
            ['key' => 'product_price_lbl', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Price', 'ar' => 'السعر']],
            ['key' => 'product_currency', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'EGP', 'ar' => 'ج.م']],
            ['key' => 'product_qty_lbl', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Quantity', 'ar' => 'الكمية']],
            ['key' => 'product_add_cart', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Add to Cart', 'ar' => 'أضف للسلة']],
            ['key' => 'product_checkout', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Checkout', 'ar' => 'الدفع']],
            ['key' => 'product_warranty', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => '2 Year Warranty', 'ar' => 'ضمان سنتين']],
            ['key' => 'product_delivery', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Free Delivery', 'ar' => 'توصيل مجاني']],
            ['key' => 'product_returns', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => '14-Day Returns', 'ar' => 'استرجاع خلال 14 يوم']],
            ['key' => 'product_tab_overview', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Overview', 'ar' => 'نظرة عامة']],
            ['key' => 'product_tab_specs', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Tech Specs', 'ar' => 'المواصفات التقنية']],
            ['key' => 'product_tab_reviews', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Reviews', 'ar' => 'المراجعات']],
            ['key' => 'product_no_specs', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'No specifications available.', 'ar' => 'لا توجد مواصفات متاحة.']],
            ['key' => 'product_freq_bought', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Frequently Bought Together', 'ar' => 'غالبا ما تشترى معا']],
            ['key' => 'product_view_all', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'View All', 'ar' => 'عرض الكل']],

            // Shop Cart
            ['key' => 'cart_title', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Your Cart', 'ar' => 'سلة التسوق']],
            ['key' => 'cart_empty', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Your cart is empty', 'ar' => 'عربة التسوق فارغة']],
            ['key' => 'cart_subtotal', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Subtotal', 'ar' => 'الإجمالي الفرعي']],
            ['key' => 'cart_taxes', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Taxes', 'ar' => 'الضرائب']],
            ['key' => 'cart_total', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Total', 'ar' => 'الإجمالي']],
            ['key' => 'cart_checkout_btn', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Proceed to Checkout', 'ar' => 'متابعة الدفع']],

            // Shop Checkout
            ['key' => 'checkout_title', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Checkout', 'ar' => 'الدفع']],
            ['key' => 'checkout_billing', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Billing Details', 'ar' => 'تفاصيل الفاتورة']],
            ['key' => 'checkout_place_order', 'group' => 'shop', 'type' => 'text', 'content' => ['en' => 'Place Order', 'ar' => 'إتمام الطلب']],

            // User Auth (Login/Signup)
            ['key' => 'auth_login_title', 'group' => 'user', 'type' => 'text', 'content' => ['en' => 'Welcome Back', 'ar' => 'مرحبا بعودتك']],
            ['key' => 'auth_login_desc', 'group' => 'user', 'type' => 'text', 'content' => ['en' => 'Log in to your account', 'ar' => 'تسجيل الدخول لحسابك']],
            ['key' => 'auth_signup_title', 'group' => 'user', 'type' => 'text', 'content' => ['en' => 'Create Account', 'ar' => 'إنشاء حساب']],
            ['key' => 'auth_signup_desc', 'group' => 'user', 'type' => 'text', 'content' => ['en' => 'Join ATS today', 'ar' => 'انضم إلى ATS اليوم']],

            // User Account
            ['key' => 'account_title', 'group' => 'user', 'type' => 'text', 'content' => ['en' => 'My Account', 'ar' => 'حسابي']],
            ['key' => 'account_desc', 'group' => 'user', 'type' => 'text', 'content' => ['en' => 'Manage your profile, addresses, and preferences.', 'ar' => 'إدارة ملفك الشخصي وعناوينك وتفضيلاتك.']],
            ['key' => 'account_logout', 'group' => 'user', 'type' => 'text', 'content' => ['en' => 'Log Out', 'ar' => 'تسجيل الخروج']],
            ['key' => 'account_orders_title', 'group' => 'user', 'type' => 'text', 'content' => ['en' => 'My Orders', 'ar' => 'طلباتي']],
            ['key' => 'account_view_all_orders', 'group' => 'user', 'type' => 'text', 'content' => ['en' => 'View All Orders', 'ar' => 'عرض جميع الطلبات']],
            ['key' => 'account_track_order', 'group' => 'user', 'type' => 'text', 'content' => ['en' => 'Track Order', 'ar' => 'تتبع الطلب']],
            ['key' => 'account_tab_profile', 'group' => 'user', 'type' => 'text', 'content' => ['en' => 'Profile', 'ar' => 'الملف الشخصي']],
            ['key' => 'account_tab_addresses', 'group' => 'user', 'type' => 'text', 'content' => ['en' => 'Addresses', 'ar' => 'العناوين']],
            ['key' => 'account_tab_preferences', 'group' => 'user', 'type' => 'text', 'content' => ['en' => 'Preferences', 'ar' => 'التفضيلات']],
            ['key' => 'account_save_btn', 'group' => 'user', 'type' => 'text', 'content' => ['en' => 'Save Changes', 'ar' => 'حفظ التغييرات']],

            // Error Pages
            ['key' => 'error_404_badge', 'group' => 'system', 'type' => 'text', 'content' => ['en' => 'Error 404', 'ar' => 'خطأ 404']],
            ['key' => 'error_404_title', 'group' => 'system', 'type' => 'text', 'content' => ['en' => 'Page Not Found', 'ar' => 'الصفحة غير موجودة']],
            ['key' => 'error_404_desc', 'group' => 'system', 'type' => 'text', 'content' => ['en' => 'The page you are looking for does not exist or may have been moved.', 'ar' => 'الصفحة التي تبحث عنها غير موجودة أو ربما تم نقلها.']],
            ['key' => 'error_btn_home', 'group' => 'system', 'type' => 'text', 'content' => ['en' => 'Back to Home', 'ar' => 'العودة للرئيسية']],
            ['key' => 'error_btn_catalog', 'group' => 'system', 'type' => 'text', 'content' => ['en' => 'Browse Catalog', 'ar' => 'تصفح الكتالوج']],

            // Coming Soon
            ['key' => 'coming_soon_title', 'group' => 'system', 'type' => 'text', 'content' => ['en' => 'Something Big is Coming', 'ar' => 'شيء كبير قادم']],
            ['key' => 'coming_soon_desc', 'group' => 'system', 'type' => 'text', 'content' => ['en' => 'We are working hard to bring you a new experience.', 'ar' => 'نحن نعمل بجد لنقدم لك تجربة جديدة.']],
        ];

        foreach ($blocks as $block) {
            ContentBlock::updateOrCreate(['key' => $block['key']], $block);
        }
    }
}
