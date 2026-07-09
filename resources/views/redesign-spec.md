# Apple-Inspired Redesign Specification

## Overview

Redesign the public-facing pages of Pondok Pesantren Darussalam Blokagung 2's website to emulate the premium, minimalist aesthetic of apple.com. The admin/dashboard area is **excluded** from this redesign.

---

## 1. Design Philosophy

- **Minimalist luxury** — Clean, uncluttered layouts with generous whitespace
- **Content deference** — UI recedes; imagery and typography do the talking
- **Purposeful motion** — Subtle, physics-based animations that feel natural
- **Premium touch** — Rounded corners, glassmorphism, refined interactions

---

## 2. Color Palette

### Primary (Monochrome)
| Token | Hex | Usage |
|-------|-----|-------|
| `--bg-primary` | `#ffffff` | Page backgrounds |
| `--bg-secondary` | `#f5f5f7` | Section alternation (Apple's light gray) |
| `--bg-dark` | `#1d1d1f` | Dark hero/product sections |
| `--text-primary` | `#1d1d1f` | Body text |
| `--text-secondary` | `#86868b` | Secondary/subtle text (Apple's gray) |
| `--text-inverse` | `#ffffff` | Text on dark backgrounds |
| `--border-light` | `#d2d2d7` | Subtle borders |

### Accent (Islamic Green)
| Token | Hex | Usage |
|-------|-----|-------|
| `--accent-green` | `#10b981` | CTA buttons, links, active states |
| `--accent-green-dark` | `#059669` | Hover states |
| `--accent-green-light` | `#d1fae5` | Subtle highlights |

### Glass/Surface Effects
| Token | Value | Usage |
|-------|-------|-------|
| `--nav-bg` | `rgba(255, 255, 255, 0.8)` | Sticky nav background |
| `--nav-blur` | `20px` | Nav backdrop-filter |
| `--glass-bg` | `rgba(255, 255, 255, 0.15)` | Glassmorphism cards |
| `--glass-blur` | `12px` | Glassmorphism blur |

---

## 3. Typography

### Font Stack
- **Body**: `Inter` (Apple-like geometric sans-serif) — `font-sans`
- **Headings**: `Playfair Display` (elegant serif for impact headlines) — `font-serif`
- **Fallback**: System fonts via `-apple-system, BlinkMacSystemFont`

### Scale
| Element | Mobile | Desktop | Weight | Tracking |
|---------|--------|---------|--------|----------|
| Hero headline | `clamp(2.5rem, 6vw, 4.5rem)` | 4.5rem | 700 (bold) | `-0.03em` |
| Section title | `clamp(1.75rem, 4vw, 3rem)` | 3rem | 600 (semibold) | `-0.02em` |
| Card title | 1.25rem | 1.5rem | 600 | `-0.01em` |
| Body text | 1rem | 1.125rem | 400 | normal |
| Small/caption | 0.75rem | 0.875rem | 400 | `0.02em` |
| Button text | 0.875rem | 1rem | 500 | `0.02em` |

---

## 4. Navigation

### Sticky Nav Bar
- **Position**: `sticky top-0 z-50`
- **Background**: `bg-white/80 backdrop-blur-xl`
- **Border**: `border-b border-gray-100/50` (very subtle)
- **Layout**: Centered, minimal items with generous spacing
- **Items**: Only **4 items** in the nav:
  1. Logo (left)
  2. Beranda, Warta, Pendaftaran, Kontak (center/right)
  3. Login/Dashboard button (right)
- **Sub-pages** (Tentang, Sejarah, Pendidikan, Profil Pimpinan): Move to footer as secondary navigation
- **Mobile**: Slide-in drawer from right, clean list with smooth animation
- **Hover**: Subtle underline or opacity change — no background color change

### Nav Transitions
- On scroll: Background opacity smoothly increases from transparent to `0.8`
- Backdrop blur always active

---

## 5. Hero Section (Homepage)

### Layout
- **Full viewport height**: `min-h-screen`
- **Background**: Auto-advancing image carousel (Swiper.js)
  - Images of campus, student activities, architecture
  - Crossfade transition (`effect: 'fade'`)
  - 5-second autoplay
- **Overlay**: Dark gradient from bottom (`bg-gradient-to-t from-black/60 via-black/20 to-transparent`)

### Content Overlay
- **Position**: Centered or bottom-aligned
- **Headline**: Serif (Playfair Display), white, large
- **Subheadline**: Sans-serif (Inter), white/light gray
- **CTA**: "Jelajahi" button — outlined or filled green
- **Scroll indicator**: Subtle animated arrow at bottom (Apple-style bounce)

---

## 6. Section Patterns

Each section should alternate between `bg-white` and `bg-[#f5f5f7]` as Apple does.

### Section: Berita (News Grid)
- 3-column grid, 2 on tablet, 1 on mobile
- Cards with `rounded-2xl` and subtle shadow
- Image at top, content below
- Hover: slight scale-up (`scale-[1.02]`) with smooth transition
- Date and category badges

### Section: Visi & Misi
- Two-column layout on desktop
- Left: Icon + headline
- Right: Descriptive text
- Scroll-triggered fade-in animation
- Apple-style numbered or icon-based list

### Section: Semboyan (Motto)
- Full-width dark section (`bg-[#1d1d1f]`)
- Large centered typography with typewriter/rotation effect
- White text with green accent

### Section: Kontak / CTA
- Minimal two-column: text left, buttons right
- Buttons: outlined with rounded-full shape
- Apple-style "Pendaftaran" and "Kontak" CTAs

---

## 7. Cards & Components

### News Card
```html
<!-- Structure -->
<div class="group relative overflow-hidden rounded-2xl bg-white shadow-sm transition-all duration-500 ease-apple hover:shadow-xl hover:scale-[1.02]">
  <div class="aspect-[4/3] overflow-hidden">
    <img class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" ...>
  </div>
  <div class="p-6">
    <span class="text-xs font-medium uppercase tracking-widest text-emerald-600">Berita</span>
    <h3 class="mt-2 font-serif text-xl font-semibold leading-tight">...</h3>
    <p class="mt-2 text-sm text-[#86868b]">...</p>
    <a class="mt-4 inline-flex items-center text-sm font-medium text-emerald-600 hover:text-emerald-700" ...>
      Baca selengkapnya →
    </a>
  </div>
</div>
```

### CTA Button
```html
<a class="inline-flex items-center rounded-full border border-emerald-600 px-6 py-3 text-sm font-medium text-emerald-600 transition-all duration-300 ease-apple hover:bg-emerald-600 hover:text-white">
  {{ $label }}
</a>
```

### Solid CTA Button
```html
<a class="inline-flex items-center rounded-full bg-emerald-600 px-6 py-3 text-sm font-medium text-white transition-all duration-300 ease-apple hover:bg-emerald-700 hover:shadow-lg">
  {{ $label }}
</a>
```

---

## 8. Animations & Transitions

### Custom Easing (Apple-style)
```css
--ease-apple: cubic-bezier(0.25, 0.1, 0.25, 1);
```

### Applied to
| Element | Trigger | Animation | Duration |
|---------|---------|-----------|----------|
| Cards | Hover | Scale 1.02, shadow increase | 500ms |
| Images | Hover (within card) | Scale 1.05 | 700ms |
| Page sections | Scroll into view | Fade up + translateY(20px→0) | 800ms |
| Nav items | Hover | Opacity change | 300ms |
| Hero carousel | Auto | Crossfade | 1000ms |
| Scroll indicator | Always | Bounce up/down | 2s infinite |
| CTA buttons | Hover | Background fill, shadow | 300ms |

### Intersection Observer Setup
- Use a lightweight observer to add `opacity-0 translate-y-10` initially
- On intersection: remove classes with `transition-all duration-800 ease-apple`
- Stagger children by 100ms each

---

## 9. Footer

### Layout
- **Top**: Logo + brief description
- **Middle**: 
  - Column 1: Navigasi (simple links to all public pages)
  - Column 2: Kontak (address, phone, email)
  - Column 3: Sosial Media (icon row)
- **Bottom**: Copyright line with subtle border separator

### Style
- Background: `bg-[#f5f5f7]` or `bg-white` with top border
- Text: `text-[#86868b]`
- Links: Clean, no underlines, hover color to green
- Social icons: Circular borders with hover fill effect

---

## 10. Page-by-Page Breakdown

### Home (`/`) — `resources/views/page/index.blade.php`
1. **Hero**: Full-screen carousel with overlay text + CTA
2. **Berita Section**: 3-card grid of latest news (Apple-style)
3. **Visi & Misi Section**: Alternating layout, icon-driven
4. **Semboyan/Motto Section**: Dark background, animated text
5. **CTA Section**: Dual buttons (Pendaftaran, Kontak)
6. **Footer**: As specified above

### Warta (News Listing) — `resources/views/page/warta.blade.php`
1. Clean search bar with icon
2. Grid of news cards (same component as homepage)
3. Pagination (Apple-style pill/page buttons)
4. Sidebar: "Artikel Populer" list (removed or restyled)

### Article Detail — `resources/views/page/page.blade.php`
1. Hero image with overlay title
2. Breadcrumb in Apple style
3. Content with `prose` typography refinements
4. Social share buttons restyled as Apple icons
5. Related articles at bottom

### Login / Register — `resources/views/page/login.blade.php`, `resources/views/page/register.blade.php`
1. Centered card with min-width constraint
2. Clean input fields with focus ring (green)
3. Social login with Apple-style icon buttons
4. Minimal, no clutter

### Others / Subpages — `resources/views/page/others.blade.php`
1. Clean breadcrumb navigation
2. Full-width content area with refined prose

### 404 — `resources/views/404.blade.php`
1. Minimal Apple-style error page
2. Large number, simple message, "Kembali" link

---

## 11. Layout Wrapper (`resources/views/layout/home.blade.php`)

### Structure
```html
<!DOCTYPE html>
<html>
<head>
  <!-- Meta, SEO, fonts -->
  <!-- Inter + Playfair Display from Google Fonts -->
  <!-- Alpine.js for interactivity -->
</head>
<body class="font-sans antialiased text-[#1d1d1f] bg-white">
  <!-- Navbar Component (sticky) -->
  <x-layout.apple-navbar />

  <!-- Page Content (no max-width constraint — full bleed!) -->
  <main>
    @yield('content')
  </main>

  <!-- Footer Component -->
  <x-layout.apple-footer />
</body>
</html>
```

**Key change**: Remove the `max-w-7xl mx-auto` wrapper from the layout so sections can be full-bleed. Individual sections control their own padding.

---

## 12. Color Scheme Variants

| Variant | bg | text | accent |
|---------|----|------|--------|
| Light section | `bg-white` | `text-[#1d1d1f]` | Emerald 600 |
| Alt section | `bg-[#f5f5f7]` | `text-[#1d1d1f]` | Emerald 600 |
| Dark section | `bg-[#1d1d1f]` | `text-white` | Emerald 400 |
| Glass card | `bg-white/20 backdrop-blur-xl` | `text-white` | Emerald 400 |

---

## 13. Dependencies to Install/Use

- **Alpine.js** — already in use, keep for interactivity
- **Swiper.js** — already in use, use for hero carousel with `effect: 'fade'`
- **Google Fonts**: Inter (weights 300–900) + Playfair Display (weights 400–700)
- **Lucide Icons** — already loaded, Apple-like clean icons
- No new heavy dependencies needed

---

## 14. Implementation Order

1. **Tailwind config** — Update with Apple-style fonts, colors, custom easing
2. **CSS updates** — Remove Bootstrap imports, add global Apple styles (easing, scroll, selection)
3. **Layout (home.blade.php)** — Full-bleed structure, new fonts, Alpine.js setup
4. **Navigation component** — New `apple-navbar` component (sticky, minimal, backdrop blur)
5. **Footer component** — New `apple-footer` component
6. **Homepage (index.blade.php)** — Hero carousel, news grid, visi-misi, motto, CTA
7. **Warta page** — Updated news listing with Apple cards
8. **Article detail page** — Updated with hero
9. **Subpages (others, privacy, login, register, 404)** — Apple-styled
10. **Animation setup** — Intersection Observer in layout for scroll reveals

---

## 15. Responsive Breakpoints

| Breakpoint | Width | Behavior |
|-----------|-------|----------|
| Mobile | < 640px | Single column, stacked cards, slide-in nav |
| Tablet | 640px–1024px | 2-column grids, hamburger menu |
| Desktop | > 1024px | Full Apple layout, multi-column, full nav |

---

## 16. Files to Create

| File | Description |
|------|-------------|
| `resources/views/components/layout/apple-navbar.blade.php` | New minimal sticky navbar |
| `resources/views/components/layout/apple-footer.blade.php` | New premium footer |

## 17. Files to Modify

| File | Changes |
|------|---------|
| `tailwind.config.js` | New colors, fonts, custom easing, screens |
| `resources/css/app.css` | Remove Bootstrap, add Apple globals |
| `resources/views/layout/home.blade.php` | Full restructure with new components |
| `resources/views/page/index.blade.php` | Full redesign with Apple sections |
| `resources/views/page/warta.blade.php` | Apple-style card grid |
| `resources/views/page/page.blade.php` | Hero image, refined content |
| `resources/views/page/others.blade.php` | Clean prose layout |
| `resources/views/page/login.blade.php` | Centered card, clean form |
| `resources/views/page/register.blade.php` | Centered card, clean form |
| `resources/views/404.blade.php` | Minimal error page |

---

## 18. Accessibility

- All interactive elements must have visible focus rings (`focus-visible:ring-2 ring-emerald-500`)
- Minimum touch target 44x44pt for mobile
- Sufficient color contrast ratios (minimum 4.5:1 for body text)
- Semantic HTML structure (proper heading hierarchy)
- Alt text on all images
- Reduced motion media query support (`prefers-reduced-motion: reduce`)

---

## 19. Edge Cases

- **Long content pages**: Prose max-width constrained to `65ch` for readability
- **Missing images**: Graceful fallback with gradient placeholder
- **No news items**: Empty state with friendly message
- **Mobile nav**: Body scroll lock when nav is open
- **Browser support**: Backdrop-filter fallback for older browsers (solid background)
- **Font loading**: Use `font-display: swap` to prevent invisible text during load
