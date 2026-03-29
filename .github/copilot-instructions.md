# Project Guidelines — SoftyFact Public Site

## Architecture

**Lean Blade marketing site** for a Tunisian invoicing SaaS. Not an SPA — no Inertia pages despite the config being present.

- **Stack**: Laravel 11 · PHP 8.2 · Blade templates · Alpine.js · Tailwind CSS 3 · Vite 5
- **Database**: SQLite (local/Docker), MySQL 8 (production VPS)
- **Two apps**: This public site forwards orders/leads via API to the core app (`fetora-pro`) at `config('app.core_app_url')`, authenticated with `PUBLIC_SITE_API_KEY`
- **Bilingual**: French (default) + Arabic with RTL support. All user-facing text uses `__('key')` from `lang/fr.json` and `lang/ar.json`. Blog content uses per-locale model accessors (`getTitle()`, `getBody()`, etc.)
- **No auth**: All routes are public. No users table, no login on this site

### Key directories

| Path | Purpose |
|------|---------|
| `resources/views/pages/` | Full-page Blade templates (homepage, product, blog, legal) |
| `resources/views/partials/` | Shared UI fragments (navbars, footers, modals, lang switcher) |
| `app/Http/Controllers/` | Thin controllers — validate then forward to core API or query models |
| `deploy/` | VPS deployment scripts, Nginx/PHP-FPM configs. See `deploy/DEPLOY.md` |
| `lang/` | JSON translation files (fr.json, ar.json) |

## Build and Test

```bash
# Local development (Docker)
docker compose up -d            # App on port 8081
docker compose exec app php artisan migrate --seed

# Assets
npm run dev                     # Vite dev server
npm run build                   # Production bundle → public/build/

# PHP
composer install
php artisan test                # PHPUnit 11
./vendor/bin/pint               # Laravel Pint code style (PSR-12)

# Production deploy
bash deploy/deploy-public.sh    # Syncs to VPS, builds, clears cache
```

## Conventions

- **Blade-only rendering**: All pages extend `resources/views/app.blade.php`. No Vue/React components. Interactivity via Alpine.js (`x-data`, `x-show`, `@click`)
- **Translation keys**: Use descriptive camelCase keys (`heroTitle`, `blogSubtitle`). Always add both `fr.json` and `ar.json` entries when introducing new text
- **Controller pattern**: Validate input → forward to core API via `Http::withToken()` → return Blade view. Controllers don't hold business logic
- **Rate limiting**: Orders throttled 10/min, leads 5/min (defined in routes)
- **SEO**: Every page template defines `@section('meta')` with title, description, OG tags, and canonical URL. Blog posts include JSON-LD structured data
- **A/B testing**: Homepage only. Variant stored in cookie (30 days). Translation keys suffixed with `B` for variant B (`heroTitleB`, `heroHighlightB`)
- **Cover images**: Blog covers generated via `php artisan blog:generate-covers` (GD-based SVG/gradient). Fallback metadata in `BlogPost::getCoverMeta()`
- **Pricing**: Offline = 149 TND one-time, Online = 99 TND/month. Values from `config('app.order_amount')` / `config('app.order_amount_online')`
