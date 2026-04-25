# AGENTS.md — SoftyFact Public

## Architecture

- **Lean Blade marketing site** for a Tunisian invoicing SaaS. **Not an SPA** — no Vue/React components, no Inertia pages (despite `config/inertia.php` existing, it's unused).
- Stack: Laravel 11 · PHP 8.2 · Blade · Alpine.js 3.14 · Tailwind CSS 3 · Vite 5
- Database: SQLite (local/Docker), MySQL 8 (production)
- **Two-app system**: This site forwards orders/leads via API to the core ERP (`fetora-pro`) at `config('app.core_app_url')`, authenticated with `PUBLIC_SITE_API_KEY`
- **Bilingual**: French (default) + Arabic (RTL). All locale-aware via `__('key')` from `lang/fr.json` and `lang/ar.json`. Blog content uses per-locale model accessors (`getTitle()`, `getBody()`)
- **No auth**: All routes public, no users table

## Commands

```bash
docker compose up -d                              # Local dev on port 8083
docker compose exec app php artisan migrate --seed

npm run dev                                       # Vite dev server (assets)
npm run build                                     # Production bundle → public/build/

composer install
php artisan test                                  # PHPUnit 11 (no tests written yet)
./vendor/bin/pint                                 # Laravel Pint (PSR-12)

# Production deploy
bash deploy/deploy-public.sh                      # Rsync → composer install → npm build → migrate → cache
```

## Conventions

- **Blade-only rendering**: All pages extend `resources/views/app.blade.php`. Interactivity via Alpine.js (`x-data`, `x-show`, `@click`)
- **Translation keys**: CamelCase (`heroTitle`, `blogSubtitle`). Must add both `fr.json` and `ar.json` entries for new text
- **Controller pattern**: Validate input → forward to core API via `Http::withToken()` → return view. Controllers hold no business logic
- **A/B testing**: Homepage only. Middleware sets 30-day cookie `ab_variant` (A/B). Override via `?variant=A`. Translation keys for variant B suffixed with `B` (e.g. `heroTitleB`)
- **Rate limits**: Orders 10/min, leads 5/min (defined in `routes/web.php`)
- **SEO**: Every page has `@section('meta')` with title, description, OG tags, canonical. Blog posts include JSON-LD structured data
- **Colors**: Tailwind config uses a Material Design 3 palette (`cm-*` tokens like `cm-primary`, `cm-surface`, `cm-on-surface`)
- **Pricing**: Cloud-only. Price read from `config('app.order_amount_online')` with default 119 TND/year. Never hardcode
- **A/B testing variant pages**: Variant B's homepage CTA links to `/product/buyonepay` (`product-offline-2.blade.php`) — a standalone landing page (does NOT extend `app.blade.php` — it has its own `<head>` and CDN-loaded assets).

## Gotchas

- **No tests directory** exists yet (no `phpunit.xml` either). Test infrastructure needs bootstrapping before running `php artisan test`
- **Inertia config is a red herring** — `config/inertia.php` exists but SSR is disabled and no Inertia pages are used
- **Bilingual blog model**: `BlogPost` exposes `getTitleAttribute()`, `getBodyAttribute()`, etc. that auto-select locale-aware columns (`title_fr` vs `title_ar`). Always use accessors, never raw column access
- **Cover images**: Blog cover defaults are SVG gradients defined in `BlogPost::getCoverMeta()`. Real photos can be downloaded via `php artisan blog:generate-covers` (needs `PEXELS_API_KEY`)
- **OG images**: Generated via `php artisan blog:generate-og-images` (GD-based, no ImageMagick)
- **Docker port**: App runs on 8083 in docker compose (not default 80/8080)
- **No CI, no pre-commit hooks**, no Makefile
- **RTL**: Arabic pages need RTL CSS. Tailwind RTL utilities are in `resources/css/app.css`
