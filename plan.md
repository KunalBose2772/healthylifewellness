# HealthyLifeWellness.in - Elite Expansion Plan (2026)

## 🎯 Current Status & Cleanup
The project has successfully transitioned from a generic portal to a high-authority wellness platform focusing on "Pillar Guides" (Masterclasses). 
- **Core Cleanup**: Redundant root files (`diet-plans.php`, `weight-loss.php`) and seed scripts have been removed.
- **Architecture**: All assets are now centralized in `/assets/` and high-authority guides are housed in `/topics/`.
- **Global Config**: `SITE_URL` constant implemented to handle absolute pathing across all directory levels.

## 🚀 The "Elite Pillar" Strategy
Instead of thin blog posts, we are building 3,000-word "Masterclass" pages for each core keyword.
- **Location**: `/topics/[keyword].php`
- **Design**: Modular theme system (CSS variables) allowing unique color palettes per topic.
- **E-E-A-T Dominance**:
    - **Expert Review**: Every page is marked as reviewed by a professional (e.g., Dr. Sameer Verma).
    - **Scientific Co-citation**: Strategic external linking to high-authority journals (The Lancet, PubMed, WHO, Harvard Health).
    - **Rich Schema**: JSON-LD Article and FAQ schema embedded in every pillar page.

## 📈 Finalized Keyword Pillars (In Progress)

| Keyword | Topic File | Theme Color | Status |
| :--- | :--- | :--- | :--- |
| **Indian Diet Plans** | `topics/diet-plans.php` | Royal Blue | **COMPLETE (Master Template)** |
| **Weight Loss** | `topics/weight-loss.php` | Crimson Red | Ready to build |
| **Home Workouts** | `topics/home-workouts.php` | Emerald Green | Ready to build |
| **Yoga for Beginners**| `topics/yoga.php` | Deep Purple | Ready to build |
| **Mental Wellness** | `topics/mental-health.php`| Teal | Ready to build |

## 🛠️ Technical SEO Checklist (Per Page)
1.  **Full Viewport Hero**: First fold must fit in 100vh with high-impact CTA.
2.  **Floating TOC**: Interactive "Table of Contents" for long-form navigation.
3.  **JSON-LD Schema**: Validated Article + FAQ markup.
4.  **Internal Clusters**: At least 3 links to related blog posts/services.
5.  **External Authority**: At least 2 links to `.gov`, `.edu`, or `.org` medical sites.
6.  **Lead Generation**: Integrated modal trigger for "Consult an Expert."

## 📅 Roadmap: Week 1 Expansion
- [x] Create Master Template (`topics/diet-plans.php`)
- [x] Implement Global Lead Modal in `footer.php`
- [x] Seed **Weight Management Bundle** (3 Posts)
- [ ] Roll out **Nutrition & Diet Bundle** (3 Posts - Scientific Focus)
- [ ] Roll out **Fitness & Workouts Bundle** (3 Posts - Functional Focus)
- [ ] Roll out **Mental Wellness Bundle** (3 Posts - Vedic/Modern Focus)
- [ ] Roll out **Ayurveda Bundle** (3 Posts - Ritual/Science Focus)
- [ ] Roll out **Weight Loss Masterclass** (Crimson Theme)
- [ ] Roll out **Home Workout Blueprint** (Green Theme)
- [x] Dynamic `sitemap.xml` implementation.
- [ ] Connect Local SEO pages (`service-city.php`) to these pillars.

---
*Last Updated: April 25, 2026*