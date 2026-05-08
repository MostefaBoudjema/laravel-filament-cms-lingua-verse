Translation Company CMS — Laravel 13 + Filament v5
A professional, luxury-grade translation company website with a powerful Filament-based admin panel, bilingual (Arabic/English) support, and Awwwards-quality frontend design.

Environment
Requirement	Available
PHP	8.3.3 ✅
Composer	2.7.1 ✅
Node.js	22.17.0 ✅
npm	11.4.2 ✅
Laravel	13.x (latest)
Filament	5.x (latest)
Database	MySQL
User Review Required
IMPORTANT

Company Branding: The plan uses a placeholder name "LinguaVerse" for the translation company. Please provide the real company name, logo, brand colors, and any branding guidelines you'd like applied.

IMPORTANT

Database: This plan assumes MySQL. Confirm your preferred database (MySQL / PostgreSQL / SQLite for dev).

WARNING

PHP Version: Your system has PHP 8.3.3. Laravel 13 requires PHP 8.3+, so you're good. However, Filament v5 docs mention PHP 8.2+, so full compatibility is confirmed.

Open Questions
Company name & branding — Do you have a specific company name, logo, and color palette, or should I use a modern default design system?
Email delivery — Should the Contact/Quote forms send emails (via SMTP/Mailgun), or just store submissions in the database for now?
Blog functionality — Should blog posts support categories, tags, featured images, and author attribution, or a simpler flat structure?
User roles — Should there be multiple admin roles (Super Admin, Editor, Content Manager), or a single admin role?
Translation request form — Should this be a simple contact form or a full quote calculator (with file upload, word count, language pair selection, urgency level)?
Architecture Overview
Database
Admin Panel /admin
Public Frontend
Homepage
About Us
Services
Languages
Quote Request
Blog
Contact Us
Dashboard
Services CRUD
Languages CRUD
Blog Posts CRUD
Quote Requests
Contact Messages
Pages/Settings
Testimonials CRUD
services
languages
posts
quote_requests
contacts
testimonials
settings
Proposed Changes
Phase 1: Project Scaffolding & Configuration
[NEW] Laravel 13 Project
bash
composer create-project laravel/laravel . 
composer require filament/filament:"^5.0" -W
php artisan filament:install --panels
composer require spatie/laravel-translatable
composer require bezhansalleh/filament-language-switch:"^4.3"
npm install
npm install gsap
npm install @tailwindcss/vite tailwindcss --save-dev
[MODIFY] .env
Configure APP_NAME, APP_URL, DB_*, MAIL_*
Set APP_LOCALE=en, APP_FALLBACK_LOCALE=ar
[MODIFY] config/app.php
Add locale configuration and available locales ['en', 'ar']
[MODIFY] vite.config.js
Add Tailwind CSS v4 Vite plugin
Configure asset paths
[MODIFY] resources/css/app.css
Import Tailwind CSS v4
Import Google Fonts (Inter, Tajawal for Arabic)
Define design system CSS custom properties (colors, spacing, typography)
Premium animation utilities
Phase 2: Database Models & Migrations
[NEW] database/migrations/xxxx_create_services_table.php
Column	Type	Description
id	bigInt (PK)	Auto increment
title	json	Translatable {en, ar}
slug	string	URL-friendly
description	json	Translatable
icon	string	Icon class/SVG
image	string (nullable)	Featured image
features	json	List of features (translatable)
is_active	boolean	Visibility toggle
sort_order	integer	Display order
timestamps		
[NEW] database/migrations/xxxx_create_languages_table.php
Column	Type	Description
id	bigInt (PK)	
name	json	Translatable
code	string	ISO 639-1 code (e.g., en)
flag	string	Flag emoji or image path
description	json	Translatable
is_active	boolean	
sort_order	integer	
timestamps		
[NEW] database/migrations/xxxx_create_posts_table.php
Column	Type	Description
id	bigInt (PK)	
title	json	Translatable
slug	string	Unique
excerpt	json	Translatable
body	json	Translatable (rich text)
featured_image	string (nullable)	
category	string (nullable)	
tags	json (nullable)	
author_id	foreignId	→ users
is_published	boolean	
published_at	datetime (nullable)	
meta_title	json (nullable)	Translatable SEO
meta_description	json (nullable)	Translatable SEO
timestamps		
[NEW] database/migrations/xxxx_create_quote_requests_table.php
Column	Type	Description
id	bigInt (PK)	
name	string	Client name
email	string	Client email
phone	string (nullable)	
company	string (nullable)	
source_language	string	From language
target_language	string	To language
service_type	string	Type of service
message	text	Details
attachment	string (nullable)	File upload
status	enum	new, in_progress, quoted, completed
admin_notes	text (nullable)	Internal notes
timestamps		
[NEW] database/migrations/xxxx_create_contacts_table.php
Column	Type	Description
id	bigInt (PK)	
name	string	
email	string	
phone	string (nullable)	
subject	string	
message	text	
is_read	boolean	Default false
timestamps		
[NEW] database/migrations/xxxx_create_testimonials_table.php
Column	Type	Description
id	bigInt (PK)	
client_name	json	Translatable
client_title	json (nullable)	Translatable
client_company	string (nullable)	
avatar	string (nullable)	
content	json	Translatable
rating	integer	1-5
is_active	boolean	
sort_order	integer	
timestamps		
[NEW] database/migrations/xxxx_create_settings_table.php
Column	Type	Description
id	bigInt (PK)	
key	string (unique)	Setting key
value	json (nullable)	Translatable setting value
group	string	Group name (general, contact, social, seo)
timestamps		
[NEW] Models (7 files in app/Models/)
Service.php — uses HasTranslations trait
Language.php — uses HasTranslations trait
Post.php — uses HasTranslations trait, belongs to User
QuoteRequest.php
Contact.php
Testimonial.php — uses HasTranslations trait
Setting.php
Phase 3: Filament Admin Panel
[MODIFY] app/Providers/Filament/AdminPanelProvider.php
Brand name & logo
Custom color scheme (deep navy/gold luxury theme)
Enable dark mode
Navigation groups: Content, Requests, Settings
Language switch plugin integration
Dashboard widgets
[NEW] Filament Resources (7 files in app/Filament/Resources/)
Resource	Features
ServiceResource	CRUD with translatable fields, image upload, reorderable, icon picker
LanguageResource	CRUD with translatable fields, flag upload, sortable
PostResource	CRUD with rich editor, translatable, SEO fields, publish toggle, category/tags
QuoteRequestResource	List/View only (no create from admin), status management, filters, export
ContactResource	List/View only, mark as read, filters by read status
TestimonialResource	CRUD with translatable, star rating, avatar upload, sortable
SettingResource	Singular resource for site-wide settings (grouped: General, Contact, Social, SEO)
[NEW] Dashboard Widgets
StatsOverview.php — Total services, posts, pending quotes, unread contacts
LatestQuoteRequests.php — Table widget showing recent requests
LatestContacts.php — Table widget showing recent messages
Phase 4: Public Frontend (Luxury Design)
The frontend will be built with Blade templates + Vanilla CSS + GSAP animations, delivering an Awwwards-quality experience.

Design Language:

Dark navy (#0a0e27) + Gold accent (#c9a84c) + Pure white
Glassmorphism cards with backdrop-blur
Smooth scroll-triggered animations (GSAP ScrollTrigger)
Custom cursor effects
Parallax hero sections
Magnetic hover effects on buttons
Text reveal animations on scroll
Animated counters for statistics
Staggered card entrance animations
[NEW] resources/views/layouts/public.blade.php
Base layout with responsive navigation
Language switcher (AR/EN)
Animated hamburger menu for mobile
Sticky header with scroll-based transparency
Footer with contact info, quick links, social media, newsletter
SEO meta tags (dynamic)
GSAP + ScrollTrigger initialization
Custom cursor element
Page transition overlay
[NEW] resources/views/pages/home.blade.php
Hero Section: Full-screen with animated globe/language particles, headline with typewriter effect, CTA buttons with magnetic hover
Stats Counter: Animated numbers (years of experience, projects completed, languages supported, expert translators)
Services Carousel: Glassmorphism cards with staggered entrance, hover lift effect
About Preview: Split layout with parallax image, text reveal animation
Languages Grid: Animated flag icons with hover details
Testimonials Slider: Auto-playing carousel with smooth transitions
CTA Section: Gradient background with floating elements
Latest Blog Posts: 3-column grid with hover image zoom
[NEW] resources/views/pages/about.blade.php
Company story with timeline animation
Mission & Vision cards with glassmorphism
Team/expertise section
Certifications & partnerships logos marquee
Why choose us — icon grid with staggered reveal
[NEW] resources/views/pages/services.blade.php
Service cards with hover flip/expand animation
Detailed service descriptions
Process timeline (How we work: 4 steps)
FAQ accordion with smooth expand
[NEW] resources/views/pages/languages.blade.php
Interactive language grid/map
Language pair combinations
Filter by region/alphabet
Each language card with flag, name, description
[NEW] resources/views/pages/quote.blade.php
Multi-step form with progress indicator
Language pair selectors
Service type selection
File upload with drag & drop
Contact details
Animated form transitions between steps
Success animation on submission
[NEW] resources/views/pages/blog/index.blade.php
Blog listing with featured post hero
Category/tag filters
Pagination with smooth transitions
Card grid with hover effects
[NEW] resources/views/pages/blog/show.blade.php
Full article with reading progress bar
Table of contents sidebar
Social share buttons
Related posts section
Author bio card
[NEW] resources/views/pages/contact.blade.php
Contact form with floating labels, validation
Google Maps embed (or stylized map)
Company info cards (address, phone, email, hours)
Social media links with hover effects
[NEW] resources/css/app.css
Premium design system with:

CSS custom properties for theming
Responsive typography scale
Animation keyframes
Glassmorphism utility classes
Custom scrollbar styles
Page transition effects
RTL support for Arabic
[NEW] resources/js/app.js
GSAP ScrollTrigger initialization
Custom cursor logic
Smooth scroll behavior
Navbar scroll effects
Counter animations
Form step navigation
Language switcher logic
Mobile menu toggle
Page transition animations
Phase 5: Routes, Controllers & Localization
[NEW] app/Http/Controllers/PageController.php
home() — Fetch services, testimonials, latest posts, stats
about() — Static + dynamic content
services() / service($slug) — List / detail
languages() — All active languages
quote() — Show form
submitQuote() — Validate & store request
blog() / blogPost($slug) — List / detail
contact() — Show form
submitContact() — Validate & store
[MODIFY] routes/web.php
php
// Language switcher
Route::get('locale/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');
// Public pages
Route::middleware('locale')->group(function () {
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/services', [PageController::class, 'services'])->name('services');
    Route::get('/services/{slug}', [PageController::class, 'service'])->name('service.show');
    Route::get('/languages', [PageController::class, 'languages'])->name('languages');
    Route::get('/quote', [PageController::class, 'quote'])->name('quote');
    Route::post('/quote', [PageController::class, 'submitQuote'])->name('quote.submit');
    Route::get('/blog', [PageController::class, 'blog'])->name('blog');
    Route::get('/blog/{slug}', [PageController::class, 'blogPost'])->name('blog.show');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');
});
[NEW] app/Http/Middleware/SetLocale.php
Read locale from session/cookie/URL
Set app()->setLocale() and Carbon locale
Handle RTL direction for Arabic
[NEW] lang/en.json & lang/ar.json
Full UI string translations for both languages
Navigation labels, form labels, button texts, error messages, page content
Phase 6: Seeder & Polish
[NEW] database/seeders/DemoDataSeeder.php
Create admin user
Seed 6-8 services with EN/AR content
Seed 15-20 languages with flags
Seed 5-6 sample blog posts
Seed 8-10 testimonials
Seed default site settings
[NEW] database/seeders/SettingsSeeder.php
Default settings: site name, tagline, contact email, phone, address, social links, SEO defaults
File Summary
Category	Count
Migrations	7
Models	7
Filament Resources	7 (+ pages)
Filament Widgets	3
Controllers	2 (Page + Locale)
Middleware	1
Blade Views	12+
CSS	1 (comprehensive)
JS	1 (comprehensive)
Language Files	2 (en, ar)
Seeders	2
Total New Files	~45+
Verification Plan
Automated Tests
bash
php artisan migrate:fresh --seed   # Verify migrations & seeders
php artisan serve                  # Start dev server
npm run dev                        # Compile assets
Manual Verification
Admin Panel (/admin): Login, create/edit/delete all resource types, verify translatable fields switch between EN/AR
Homepage: Verify all animations, responsive on mobile/tablet/desktop, language switcher works
All Pages: Navigate through every page, verify content loads, forms submit correctly
RTL: Switch to Arabic, verify layout flips correctly, text renders properly
Performance: Check Lighthouse score targets (90+ Performance, 90+ SEO, 90+ Accessibility)
Browser Recording: Record browser walkthroughs of key flows for visual verification
Browser Tests
Navigate to homepage, verify hero animation loads
Submit quote request form, verify it appears in admin
Submit contact form, verify it appears in admin
Switch language to Arabic, verify RTL layout
Navigate through all pages, verify no broken links