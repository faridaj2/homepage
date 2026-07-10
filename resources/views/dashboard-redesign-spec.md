# Dashboard Redesign Specification

## Overview

Redesign the admin dashboard of Pondok Pesantren Darussalam Blokagung Dua's website to be modern, intuitive, and responsive for both desktop and mobile. The redesign will use the same Apple-inspired design language as the public-facing homepage.

---

## 1. Design Philosophy

- **Modern & Clean** — Apple-inspired minimalism with generous whitespace
- **Productive** — Data at a glance, quick actions, clear navigation
- **Responsive** — Fully functional on both desktop and mobile
- **Consistent** — Design language matches the public-facing Apple-inspired redesign

---

## 2. Tech Stack (Unchanged)

| Library | Usage |
|---------|-------|
| Alpine.js | Interactivity, sidebar toggle, modals, dropdowns |
| IonIcons | Icons for sidebar menu items and UI elements |
| Tailwind CSS | Styling (with custom `apple` tokens and `ease-apple` easing) |
| Axios | AJAX for CRUD operations |
| TinyMCE | Rich text editor for content creation/editing |
| Lucide Icons | Additional clean icons (already loaded via head.blade.php) |

---

## 3. Color Palette

### Sidebar (Dark)
| Token | Hex | Usage |
|-------|-----|-------|
| Sidebar bg | `#1d1d1f` | Main sidebar background |
| Sidebar hover | `rgba(255,255,255,0.08)` | Hover state for menu items |
| Sidebar active | `rgba(16, 185, 129, 0.15)` | Active menu item background |
| Sidebar text | `#86868b` | Default menu text |
| Sidebar text active | `#10b981` | Active menu item text (emerald) |
| Sidebar text hover | `#f5f5f7` | Hover menu item text |
| Sidebar divider | `rgba(255,255,255,0.06)` | Section dividers |
| Sidebar logo text | `#ffffff` | Dashboard title |

### Content Area (Light)
| Token | Hex | Usage |
|-------|-----|-------|
| Content bg | `#ffffff` | Main content background |
| Card bg | `#ffffff` | Card backgrounds |
| Card border | `#e5e7eb` / `rgba(0,0,0,0.06)` | Subtle card borders |
| Heading text | `#1d1d1f` | Page titles and headings |
| Body text | `#1d1d1f` | Regular text |
| Secondary text | `#86868b` | Labels, descriptions |
| Accent | `#10b981` | Primary actions, active states (emerald) |
| Accent hover | `#059669` | Hover states |
| Accent light | `#d1fae5` | Subtle highlights, badges |

### Status Colors
| Token | Hex | Usage |
|-------|-----|-------|
| Success | `#10b981` | Published/active status |
| Warning | `#f59e0b` | Pending/draft status |
| Error | `#ef4444` | Delete actions, errors |
| Info | `#3b82f6` | Information badges |

---

## 4. Layout Structure

```
┌──────────────────────────────────────────────────┐
│  SIDEBAR (dark, fixed, w-64)  │  TOP BAR (white) │
│                               │                  │
│  ┌─────────────────┐         │  ┌────────────┐  │
│  │ Logo + Title    │         │  │ Search   👤 │  │
│  └─────────────────┘         │  └────────────┘  │
│                               │                  │
│  ● Dashboard                  │  ┌──────────────┐│
│                               │  │              ││
│  ▼ KONTEN (collapsible)      │  │   MAIN       ││
│    Pemimpin                   │  │   CONTENT    ││
│    Pendidikan                 │  │   AREA       ││
│    Sejarah                    │  │              ││
│    Berita                     │  │              ││
│                               │  │              ││
│  ▼ PENGATURAN (collapsible)  │  │              ││
│    File Upload                │  │              ││
│    Info Pendaftaran           │  │              ││
│    Kontak & Alamat            │  │              ││
│    PSPDB                      │  │              ││
│                               │  │              ││
│  ───────────────────────      │  └──────────────┘│
│  ⏻ Logout                    │                  │
└──────────────────────────────────────────────────┘

Mobile: Sidebar → overlay drawer, full-width content
```

### Breakpoints
| Device | Width | Sidebar | Content |
|--------|-------|---------|---------|
| Mobile | < 768px | Overlay drawer (toggle via hamburger) | Full width |
| Desktop | ≥ 768px | Fixed, always visible (w-64) | Remaining width |

---

## 5. Sidebar Component (`components/dashboard/apple-sidebar.blade.php`)

### Structure
- **Top**: Logo + "Dashboard" title with separator line
- **Menu Groups** (with collapsible sections):
  1. **Dashboard** — Single item, always visible, no expand
  2. **Konten** — Collapsible group header with chevron icon
     - Pemimpin (icon: people-outline)
     - Pendidikan (icon: business-outline)
     - Sejarah (icon: flag-outline)
     - Berita (icon: newspaper-outline)
  3. **Pengaturan** — Collapsible group header
     - File Upload (icon: cloud-upload)
     - Info Pendaftaran (icon: help-circle-outline)
     - Kontak & Alamat (icon: help-circle-outline)
     - PSPDB (icon: help-circle-outline)
  4. **Divider + Logout** — At the bottom
- **Active state**: Highlight current page with green accent

### Desktop Behavior
- Fixed position (`fixed left-0 top-0 h-screen w-64`)
- Dark background (`bg-[#1d1d1f]`)
- Menu groups collapse/expand on click via Alpine.js
- Active menu item highlighted with green text + subtle bg
- Logout at the bottom with subtle separator

### Mobile Behavior
- Initially hidden (off-screen)
- Toggle via hamburger icon in top bar
- Slide-in overlay with backdrop blur
- Same layout as desktop but full-width (`w-72`)

---

## 6. Top Bar Component (`components/dashboard/apple-topbar.blade.php`)

### Structure
| Left | Center | Right |
|------|--------|-------|
| Hamburger (mobile only) | Page title (dynamic) | Search (optional) + User avatar/dropdown |

### Style
- White background with subtle bottom border
- Sticky at top (`sticky top-0 z-40`)
- Height: `h-14` (56px)
- User avatar with dropdown for profile/logout

---

## 7. Dashboard Main Page (`dashboard.blade.php`)

### Layout
- **Title**: "Dashboard" with page subtitle
- **Stat Cards Row**: 4-5 statistic cards in a responsive grid
  - Total Pemimpin
  - Total Pendidikan
  - Total Sejarah (or combined)
  - Total Berita
  - Total Pendaftaran
- **Quick Actions**: Shortcuts to create content
- **Recent Activity**: List of latest content changes

### Stat Card Design (Apple-style)
```html
<div class="group rounded-2xl bg-white p-6 shadow-apple-sm transition-all duration-300 hover:shadow-apple-lg border border-gray-100/50">
  <div class="flex items-center justify-between">
    <div>
      <p class="text-sm font-medium text-[#86868b]">Total Berita</p>
      <p class="mt-1 text-3xl font-semibold text-[#1d1d1f]">12</p>
    </div>
    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
      <ion-icon name="newspaper-outline" class="text-2xl"></ion-icon>
    </div>
  </div>
  <div class="mt-4 flex items-center gap-1 text-xs text-emerald-600">
    <span>+2 bulan ini</span>
  </div>
</div>
```

---

## 8. CRUD Pages — Index View

### Table View (for data-heavy pages: Berita, Pendaftaran, PSPDB)
- Clean, minimal table with subtle borders
- Columns: Title, Status, Updated At, Actions
- Row hover effect (light gray bg)
- Actions: View (eye), Edit (pencil), Delete (trash) — icon buttons
- Sorting and search at the top
- Pagination at bottom (Apple-style pill pagination)

### Grid View (for visual pages: Pemimpin, Pendidikan, Sejarah)
- Card grid (3 columns desktop, 2 tablet, 1 mobile)
- Card with image, title, excerpt, date
- Hover: slight scale + shadow increase
- Action buttons: absolute positioned on hover
- Same delete confirmation modal

### Create/Edit Page
- Full-width centered form
- Title input with auto-slug generation
- Image URL input with preview
- TinyMCE editor for content (full width)
- Save button: Emerald rounded-full, with loading state
- Cancel/back link

---

## 9. Confirmation Modal (Reusable)

```html
<div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center">
  <!-- Backdrop -->
  <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
  <!-- Modal -->
  <div class="relative w-full max-w-sm rounded-2xl bg-white p-6 shadow-2xl">
    <h3 class="text-lg font-semibold text-[#1d1d1f]">Konfirmasi Hapus</h3>
    <p class="mt-2 text-sm text-[#86868b]">Apakah Anda yakin ingin menghapus <span class="font-medium" x-html="data.title"></span>?</p>
    <div class="mt-6 flex justify-end gap-3">
      <button @click="open=false" class="rounded-full border border-gray-200 px-5 py-2 text-sm font-medium text-[#86868b] transition-all hover:bg-gray-50">Batal</button>
      <button @click="hapus()" class="rounded-full bg-red-500 px-5 py-2 text-sm font-medium text-white transition-all hover:bg-red-600">Hapus</button>
    </div>
  </div>
</div>
```

---

## 10. Toast Notification (Reuse & Restyle)

Current toast component at `components/toast.blade.php` — keep but restyle to match Apple design:
- Dark background, rounded-2xl, subtle shadow
- Icon (success/error) + message
- Auto-dismiss after 3 seconds
- Slide-in from top-right

---

## 11. Pages to Create/Modify

### New Files
| File | Description |
|------|-------------|
| `resources/views/components/layout/apple-dashboard-sidebar.blade.php` | New dark sidebar with collapsible groups |
| `resources/views/components/layout/apple-dashboard-topbar.blade.php` | New top bar with user area |

### Existing Files to Modify
| File | Changes |
|------|---------|
| `resources/views/layout/dashboard.blade.php` | Full restructure: new sidebar, topbar, layout |
| `resources/views/dashboard.blade.php` | Replace welcome page with stat cards + recent activity |
| `resources/views/admin/berita/index.blade.php` | Table/list view with Apple styling |
| `resources/views/admin/pendidikan/index.blade.php` | Grid view with Apple cards |
| `resources/views/admin/sejarah/index.blade.php` | Grid view with Apple cards |
| `resources/views/admin/leader/index.blade.php` (articleLeader.blade.php) | Grid view with Apple cards |
| `resources/views/admin/pendaftaran/index.blade.php` | Table view |
| `resources/views/admin/kontak/index.blade.php` | Table or detail view |
| `resources/views/admin/file/index.blade.php` | Table view |
| `resources/views/admin/pspdb/index.blade.php` | Table view |
| `resources/views/components/dashboard/grid/grid.blade.php` | Updated card design |
| `resources/views/components/dashboard/form/create.blade.php` | Updated form layout |
| `resources/views/components/dashboard/form/edit.blade.php` | Updated form layout |

---

## 12. Animation & Transitions

All animations use `ease-apple` (`cubic-bezier(0.25, 0.1, 0.25, 1)`):

| Element | Trigger | Animation | Duration |
|---------|---------|-----------|----------|
| Sidebar menu groups | Click | Expand/collapse with max-height | 300ms |
| Sidebar items | Hover | Background + text color | 200ms |
| Stat cards | Hover | Scale 1.02, shadow increase | 300ms |
| Grid cards | Hover | Scale 1.02, shadow increase | 400ms |
| Table rows | Hover | Background color | 150ms |
| Mobile sidebar | Toggle | Slide-in from left | 400ms |
| Modal | Open | Fade + scale | 300ms |
| Toast | Show | Slide-in from top-right | 400ms |

---

## 13. Mobile Considerations

- **Sidebar**: Hidden by default, open as overlay drawer with backdrop
- **Top bar**: Always visible with hamburger toggle
- **Content**: Full width, no sidebar offset
- **Tables**: Horizontally scrollable on small screens
- **Grid cards**: Single column on mobile
- **Buttons**: Minimum 44x44pt touch targets
- **Forms**: Full-width inputs, stacked layout

---

## 14. Accessibility

- Focus rings on all interactive elements (`focus-visible:ring-2 ring-emerald-500`)
- Proper heading hierarchy (h1 → h2 → h3)
- ARIA labels on icon buttons
- Keyboard navigation for sidebar
- `prefers-reduced-motion` support

---

## 15. Files to Keep Unchanged

The following admin view files that are part of the PSPDB (student registration) flow should **only receive layout updates** via `layout.dashboard`:
- `resources/views/pspdb/` (all files in this directory)
- These already extend `layout.dashboard` and will be restyled automatically

---

## 16. Implementation Order

1. **Sidebar component** — Create new dark sidebar with collapsible groups
2. **Top bar component** — Create clean top bar with user area
3. **Dashboard layout** — Update `layout/dashboard.blade.php` with new components
4. **Dashboard main page** — Replace content with stat cards + recent activity
5. **Grid component** — Update card design for CRUD pages
6. **Admin index pages** — Update all index pages with new styling (table/grid)
7. **Form components** — Update create/edit form styling
8. **Modals & notifications** — Update delete modal and toast styling
9. **Build & verify** — Ensure Vite build passes
