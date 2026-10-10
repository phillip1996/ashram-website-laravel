<template>
  <div class="page-wrapper font-montserrat" v-cloak>

    <Head>
      <title>The Lekki Ashram </title>
      <meta name="description" content="An apolitical civil society group dedicated to resolving the mysteries of life through nature conservation, Advaita philosophy, and human evolution." />
      
      <!-- Open Graph Tags -->
      <meta property="og:title" content="The Lekki Ashram" />
      <meta property="og:description" content="An apolitical civil society group dedicated to resolving the mysteries of life through nature conservation, Advaita philosophy, and human evolution." />
      <meta property="og:type" content="website" />
      <meta property="og:url" content="{{ url()->current() }}" />
      <meta property="og:image" content="{{ asset('img/og-image.jpg') }}" />
      <meta property="og:image:width" content="1200" />
      <meta property="og:image:height" content="630" />
      <meta property="og:site_name" content="The Lekki Ashram" />
      
      <!-- Twitter Card -->
      <meta name="twitter:card" content="summary_large_image" />
      <meta name="twitter:title" content="The Lekki Ashram - Art of Living Center" />
      <meta name="twitter:description" content="An apolitical civil society group dedicated to resolving the mysteries of life through nature conservation, Advaita philosophy, and human evolution." />
      <meta name="twitter:image" content="{{ asset('img/og-image.jpg') }}" />
      
      <!-- Canonical URL -->
      <link rel="canonical" href="{{ url()->current() }}" />
    </Head>

    <HeroSlider :slides="heroSlides" />

    <!-- =========================================================
         SECTION 1 — WHAT WE OFFER (static)
    ========================================================= -->
    <section class="py-16 md:py-24 bg-[#f8f7f4]">
      <div class="max-w-6xl mx-auto px-6 md:px-12">
        <div class="text-center mb-14">
          <div class="flex items-center justify-center gap-3 mb-4">
            <div class="w-8 h-0.5 bg-[#E1B137]"></div>
            <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em]">Our Offerings</span>
            <div class="w-8 h-0.5 bg-[#E1B137]"></div>
          </div>
          <h2 class="text-4xl md:text-5xl font-serif font-medium text-[#2b4b58] leading-tight">
            Six Pillars of <em class="not-italic text-[#E1B137]">Transformation</em>
          </h2>
          <p class="text-slate-500 mt-4 max-w-xl mx-auto text-sm leading-relaxed">
            Each pillar is a doorway into stillness, into nature, into the self.
          </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">
          <div v-for="(pillar, i) in pillars" :key="i"
            class="group relative flex flex-col h-full bg-white border border-slate-100 p-8 hover:shadow-xl hover:-translate-y-1 transition-all duration-400 overflow-hidden">
            <div class="absolute bottom-0 left-0 h-0.5 w-0 bg-[#E1B137] group-hover:w-full transition-all duration-500"></div>
            <div class="w-14 h-14 rounded-full flex items-center justify-center mb-6 transition-colors duration-300 relative shrink-0"
              :class="i % 2 === 0 ? 'bg-[#E1B137]/20 group-hover:bg-[#E1B137]' : 'bg-[#2b4b58]/20 group-hover:bg-[#2b4b58]'">
              
              <!-- ✅ Custom Image Icon (for Advaita) -->
              <img 
                v-if="pillar.icon === 'custom-image' && pillar.icon_image"
                :src="'/' + pillar.icon_image" 
                :alt="pillar.title"
                class="w-8 h-8 object-contain transition-colors duration-300 relative z-10"
              />
              
              <!-- Custom SVG Swan - with better contrast -->
              <svg v-else-if="pillar.icon === 'custom-swan'"
                class="w-6 h-6 transition-colors duration-300 relative z-10"
                :class="i % 2 === 0 ? 'text-[#1a1a1a] group-hover:text-white' : 'text-[#1a1a1a] group-hover:text-white'"
                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="10.5" cy="16.5" rx="7.5" ry="4.2" fill="currentColor"/>
                <path d="M15.5 18C13.8 18 12.5 16.8 12.5 15.2C12.5 13.9 13.3 12.8 14.4 12.3C13 11.9 12 10.6 12 9.1C12 7.9 12.7 6.8 13.7 6.2C13 5.7 12.6 4.9 12.6 4C12.6 3.3 12.9 2.7 13.3 2.2C14.2 2.6 14.8 3.5 14.8 4.5C14.8 4.9 14.7 5.3 14.5 5.6C15.9 5.9 17 7.2 17 8.7C17 9.9 16.3 11 15.3 11.5C16.6 11.8 17.6 12.9 17.7 14.3C17.8 15 17.6 15.6 17.2 16.1C18.1 16.3 18.8 17 19 17.9C17.9 18.3 16.6 18.3 15.5 18Z" fill="currentColor"/>
                <circle cx="14" cy="4.6" r="0.55" fill="#f8f7f4"/>
                <path d="M13.4 3.3L11.6 3.7L13.1 4.6Z" fill="currentColor"/>
              </svg>
              
              <!-- Font Awesome Icons (all other pillars) -->
              <i v-else :class="[pillar.icon, 'text-xl transition-colors duration-300 relative z-10',
                i % 2 === 0 ? 'text-[#E1B137] group-hover:text-white' : 'text-[#2b4b58] group-hover:text-white']">
              </i>
            </div>
            <h3 class="text-[#2b4b58] font-serif text-xl font-medium mb-3 group-hover:text-[#E1B137] transition-colors">
              {{ pillar.title }}
            </h3>
            <p class="text-slate-400 text-sm leading-relaxed">{{ pillar.description }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- =========================================================
         SECTION 2 — EXPERIENCE TIMELINE (static)
    ========================================================= -->
    <section class="py-16 md:py-24 bg-[#2b4b58] relative overflow-hidden">
      <div class="absolute inset-0 opacity-[0.04]"
        style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 28px 28px;"></div>
      <div class="relative max-w-6xl mx-auto px-6 md:px-12">
        <div class="text-center mb-14">
          <div class="flex items-center justify-center gap-3 mb-4">
            <div class="w-8 h-0.5 bg-[#E1B137]"></div>
            <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em]">Our Journey</span>
            <div class="w-8 h-0.5 bg-[#E1B137]"></div>
          </div>
          <h2 class="text-4xl md:text-5xl font-serif font-medium text-white leading-tight">
            Experience that <em class="not-italic text-[#E1B137]">Shaped Us</em>
          </h2>
          <p class="text-white/50 mt-4 max-w-xl mx-auto text-sm leading-relaxed">
            Our journey reflects deliberate growth, defined by ecological stewardship, philosophical clarity, and institutional responsibility.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
          <div v-for="(item, i) in experiences" :key="i"
            class="group relative flex flex-col h-full bg-white/5 border border-white/10 p-8 hover:border-[#E1B137]/40 hover:bg-white/10 hover:-translate-y-1 transition-all duration-400">
            <div class="flex items-start gap-4 mb-5">
              <div class="w-12 h-12 bg-[#E1B137] flex items-center justify-center shrink-0">
                <span class="text-white font-bold font-serif text-base">{{ item.year.slice(2) }}</span>
              </div>
              <div>
                <p class="text-[#E1B137] text-[10px] font-bold uppercase tracking-widest">{{ item.year }}</p>
                <h3 class="text-white font-serif text-xl font-medium mt-0.5">{{ item.title }}</h3>
              </div>
            </div>
            <p class="text-white/50 text-sm leading-relaxed">{{ item.description }}</p>
            <div class="absolute bottom-0 left-0 h-0.5 w-0 bg-[#E1B137] group-hover:w-full transition-all duration-500"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- =========================================================
         SECTION 3 — PODCASTS (DYNAMIC) 
    ========================================================= -->
    <section id="wisdom-series" class="py-16 md:py-24 bg-white">
      <div class="max-w-6xl mx-auto px-6 md:px-12">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
          <div>
            <div class="flex items-center gap-3 mb-4">
              <div class="w-8 h-0.5 bg-[#E1B137]"></div>
              <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em]">Wisdom Series</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-serif font-medium text-[#2b4b58] leading-tight">
              The Ashram <em class="not-italic text-[#E1B137]">Dialogues</em>
            </h2>
            <p class="text-slate-400 max-w-xs text-sm leading-relaxed">
              Deep conversations on consciousness, ecology, and the architecture of inner peace.
            </p>
          </div>
        </div>

        <div v-if="podcasts && podcasts.length > 0">
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">
            <div v-for="podcast in visiblePodcasts" :key="podcast.id"
              class="group relative flex flex-col h-full bg-white border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-400 overflow-hidden">
              <div class="absolute bottom-0 left-0 h-0.5 w-0 bg-[#E1B137] group-hover:w-full transition-all duration-500 z-10"></div>
              <div class="relative h-48 overflow-hidden shrink-0">
                <img :src="podcast.thumbnail" :alt="podcast.title"
                  loading="lazy"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#2b4b58]/70 to-transparent"></div>
                <button @click="playPodcast(podcast)"
                  :aria-label="currentPlaying === podcast.id && isPlaying ? 'Pause episode' : 'Play episode'"
                  class="absolute bottom-3 right-3 w-11 h-11 flex items-center justify-center shadow-lg transition-all duration-200"
                  :class="currentPlaying === podcast.id ? 'bg-[#E1B137]' : 'bg-white hover:bg-[#E1B137] group-hover:scale-105'">
                  <i :class="[
                    'text-sm',
                    currentPlaying === podcast.id && isPlaying ? 'fa-solid fa-pause' : 'fa-solid fa-play ml-0.5',
                    currentPlaying === podcast.id ? 'text-white' : 'text-[#2b4b58] group-hover:text-white'
                  ]"></i>
                </button>
                <div class="absolute top-3 left-3">
                  <span class="bg-[#E1B137] text-white text-[9px] font-bold px-2.5 py-1 uppercase tracking-widest">Ep. {{ podcast.episode }}</span>
                </div>
                <div class="absolute top-3 right-3 bg-black/50 text-white text-[10px] px-2 py-1 backdrop-blur-sm">
                  {{ podcast.duration }}
                </div>
              </div>
              <div class="p-6 flex flex-col flex-1">
                <div class="flex justify-between items-center gap-2 mb-2">
                  <span class="text-[#E1B137] text-[9px] font-bold uppercase tracking-[0.25em]">{{ podcast.category }}</span>
                  <span class="text-slate-400 text-xs text-nowrap">{{ formatDate(podcast.date) }}</span>
                </div>
                <h3 class="font-serif text-[#2b4b58] text-lg font-medium mb-2 leading-snug group-hover:text-[#E1B137] transition-colors">
                  {{ podcast.title }}
                </h3>
                <div class="text-slate-400 text-sm leading-relaxed mb-5 line-clamp-2 min-h-[2.5rem] sm:min-h-[2.75rem]">{{ stripHtml(podcast.description) }}</div>
                <div class="flex items-center justify-between gap-3 pt-4 border-t border-slate-100 mt-auto">
                  <div class="flex items-center gap-2.5 min-w-0">
                    <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-white shadow-sm shrink-0">
                      <img :src="podcast.speaker_avatar" :alt="podcast.speaker_name" loading="lazy" class="w-full h-full object-cover" />
                    </div>
                    <div class="min-w-0">
                      <p class="text-[#2b4b58] text-xs font-semibold truncate">{{ podcast.speaker_name }}</p>
                      <p class="text-slate-400 text-[10px] truncate">{{ podcast.speaker_role }}</p>
                    </div>
                  </div>
                  <div class="flex items-center gap-3 text-slate-400 shrink-0">
                    <span class="text-xs flex items-center gap-1">
                      <i class="fa-solid fa-headphones text-[10px]"></i> {{ podcast.listens }}
                    </span>
                    <button @click="toggleBookmark(podcast)" 
                      :aria-label="podcast.bookmarked ? 'Remove bookmark' : 'Add bookmark'"
                      class="hover:text-[#E1B137] transition-colors p-1">
                      <i class="fa-solid fa-bookmark text-sm" :class="podcast.bookmarked ? 'text-[#E1B137]' : ''"></i>
                    </button>
                  </div>
                </div>
                <!-- ✅ Read More link to the full episode page -->
                <Link :href="'/podcasts/' + podcast.id"
                  class="mt-4 pt-3 border-t border-slate-100 text-[#2b4b58] text-xs font-bold uppercase tracking-wider hover:text-[#E1B137] transition-colors inline-flex items-center gap-1.5">
                  Read More <i class="fa-solid fa-chevron-right text-[9px]"></i>
                </Link>
              </div>
            </div>
          </div>
          <div class="text-center mt-10 space-y-3">
            <p class="text-slate-400 text-xs">Showing {{ visiblePodcasts.length }} of {{ podcasts.length }} episodes</p>
            <button @click="toggleAllEpisodes"
              class="inline-flex items-center gap-2 border border-slate-300 text-slate-600 px-8 py-4 text-[11px] font-bold uppercase tracking-[0.2em] hover:bg-[#2b4b58] hover:text-white hover:border-[#2b4b58] transition-all group">
              {{ showAllEpisodes ? 'Show Less' : 'Browse All Episodes' }}
              <i class="fa-solid transition-all" :class="showAllEpisodes ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
            </button>
          </div>
        </div>
        <div v-else class="text-center py-10">
          <p class="text-slate-400 text-sm">No episodes available yet. Stay tuned!</p>
        </div>
      </div>
    </section>

    <!-- =========================================================
         SECTION 4 — LATEST INSIGHTS 
    ========================================================= -->
    <section id="recent-articles" class="py-16 md:py-24 bg-[#f8f7f4]">
      <div class="max-w-6xl mx-auto px-6 md:px-12">

        <div class="text-center mb-14">
          <div class="flex items-center justify-center gap-3 mb-4">
            <div class="w-8 h-0.5 bg-[#E1B137]"></div>
            <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em]">Knowledge Base</span>
            <div class="w-8 h-0.5 bg-[#E1B137]"></div>
          </div>
          <h2 class="text-4xl md:text-5xl font-serif font-medium text-[#2b4b58]">
            Latest <em class="not-italic text-[#E1B137]">Insights</em>
          </h2>
          <p class="text-slate-400 mt-4 max-w-xl mx-auto text-sm leading-relaxed">
            Reflections on the intersection of nature, consciousness, and social order.
          </p>
        </div>

        <!-- Featured Articles Carousel -->
        <FeaturedCarousel :articles="featuredArticles" />

        <!-- Regular Articles Grid -->
        <div v-if="recentArticles && recentArticles.length > 0" class="mt-10">
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">
            <div v-for="article in visibleArticles" :key="article.id"
              class="group flex flex-col h-full bg-white border border-slate-100 overflow-hidden hover:shadow-lg transition-all duration-400">
              <div class="h-44 overflow-hidden relative shrink-0">
                <img :src="article.image" :alt="article.title"
                  loading="lazy"
                  class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#2b4b58]/20 to-transparent"></div>
              </div>
              <div class="p-6 flex flex-col flex-1">
                <div class="flex justify-between items-start gap-2 mb-2">
                  <span class="text-[#E1B137] text-[9px] font-bold uppercase tracking-[0.25em]">{{ article.category }}</span>
                  <span class="text-slate-400 text-xs text-nowrap">{{ formatDate(article.date) }}</span>
                </div>
                <h4 class="font-serif text-[#2b4b58] text-lg font-medium mb-2 group-hover:text-[#E1B137] transition-colors">
                  {{ article.title }}
                </h4>
                <div class="text-slate-400 text-sm mb-4 line-clamp-2 min-h-[2.5rem] sm:min-h-[2.75rem]">{{ stripHtml(article.description) }}</div>
                <div class="flex items-center justify-between gap-3 pt-3 border-t border-slate-100 mt-auto">
                  <Link :href="'/article/' + article.id"
                    class="text-[#2b4b58] text-xs font-bold uppercase tracking-wider hover:text-[#E1B137] transition-colors inline-flex items-center gap-1.5">
                    Read More <i class="fa-solid fa-chevron-right text-[9px]"></i>
                  </Link>
                  <span class="text-slate-400 text-xs text-nowrap">{{ article.read_time }}</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Toggle button -->
          <div class="text-center mt-10 space-y-3">
            <p class="text-slate-400 text-xs">Showing {{ visibleArticles.length }} of {{ recentArticles.length }} articles</p>
            <button
              v-if="recentArticles.length > 3"
              @click="toggleAllArticles"
              class="inline-flex items-center gap-2 border border-slate-300 text-slate-600 px-8 py-4 text-[11px] font-bold uppercase tracking-[0.2em] hover:bg-[#2b4b58] hover:text-white hover:border-[#2b4b58] transition-all group">
              {{ showAllArticles ? 'Show Less' : 'View All Articles' }}
              <i class="fa-solid transition-all" :class="showAllArticles ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
            </button>
          </div>
        </div>

        <div v-if="(!featuredArticles || featuredArticles.length === 0) && (!recentArticles || recentArticles.length === 0)" class="text-center py-10">
          <p class="text-slate-400 text-sm">No articles available yet. Check back soon!</p>
        </div>

      </div>
    </section>

    <!-- =========================================================
         SECTION — AYURVEDIC RECIPES
    ========================================================= -->
    <section id="ayurvedic-recipes" class="py-16 md:py-24 bg-white">
      <div class="max-w-6xl mx-auto px-6 md:px-12">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-12">
          <div>
            <div class="flex items-center gap-3 mb-4">
              <div class="w-8 h-0.5 bg-[#E1B137]"></div>
              <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em]">Ayurveda</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-serif font-medium text-[#2b4b58]">
              Ayurvedic <em class="not-italic text-[#E1B137]">Living</em>
            </h2>
            <p class="text-slate-400 text-sm max-w-sm mt-2">Ancient wisdom for modern wellness — the sister science of yoga.</p>
          </div>
          <Link
            v-if="totalRecipesCount > 3"
            href="/ayurvedic-recipes"
            class="hidden sm:inline-flex items-center gap-2 text-[#2b4b58] hover:text-[#E1B137] font-bold text-xs uppercase tracking-wider transition-colors shrink-0"
          >
            View All <i class="fa-solid fa-arrow-right"></i>
          </Link>
        </div>

        <div v-if="recipes && recipes.length > 0" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">
          <div v-for="recipe in recipes" :key="recipe.id"
            class="group flex flex-col h-full bg-[#f8f7f4] border border-slate-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-400 relative">

            <!-- Featured Badge -->
            <div v-if="recipe.is_featured" class="absolute top-3 left-3 z-10">
              <span class="bg-[#E1B137] text-[#0d1e26] text-[9px] font-bold px-2.5 py-1 rounded-md shadow-lg flex items-center gap-1">
                <i class="fa-solid fa-star text-[10px]"></i>
                Featured
              </span>
            </div>

            <div class="relative h-48 overflow-hidden bg-slate-200 shrink-0">
              <img 
                :src="getRecipeImage(recipe)" 
                :alt="recipe.title"
                loading="lazy"
                width="400"
                height="300"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                @error="handleImageError"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
              <div class="absolute bottom-3 left-3">
                <span class="bg-[#E1B137] text-[#0d1e26] text-[9px] font-bold px-3 py-1 uppercase tracking-widest">
                  {{ recipe.category || 'Ayurvedic' }}
                </span>
              </div>
              <div v-if="recipe.has_video" class="absolute top-3 right-3 bg-black/60 backdrop-blur-sm text-white text-xs px-2 py-1 rounded flex items-center gap-1">
                <i class="fa-solid fa-play"></i> Video
              </div>
            </div>
            <div class="p-6 flex flex-col flex-1">
              <h3 class="font-serif text-xl text-[#2b4b58] mb-2 group-hover:text-[#E1B137] transition-colors line-clamp-1">
                {{ recipe.title }}
              </h3>
              <p class="text-slate-500 text-sm line-clamp-2 min-h-[2.5rem] sm:min-h-[2.75rem]">{{ recipe.description }}</p>
              <Link :href="'/ayurvedic-recipes/' + recipe.slug"
                class="mt-auto pt-4 inline-flex items-center gap-2 text-[#2b4b58] hover:text-[#E1B137] text-xs font-bold uppercase tracking-wider transition-colors">
                View<i class="fa-solid fa-arrow-right text-[10px]"></i>
              </Link>
            </div>
          </div>
        </div>

        <div v-else class="text-center py-12">
          <div class="w-16 h-16 bg-[#E1B137]/10 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fa-solid fa-mortar-pestle text-2xl text-[#E1B137]"></i>
          </div>
          <p class="text-slate-400 text-sm">No recipes available yet. Check back soon!</p>
        </div>
      </div>
    </section>

    <!-- =========================================================
         SECTION 5 — PARTNERS (DYNAMIC)
    ========================================================= -->
    <section class="py-16 md:py-24 bg-[#20404c] relative overflow-hidden">
      <div class="absolute inset-0 opacity-[0.04]"
        style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 28px 28px;"></div>
      <div class="relative max-w-6xl mx-auto px-6 md:px-12">
        <div class="text-center mb-14">
          <div class="flex items-center justify-center gap-3 mb-4">
            <div class="w-8 h-0.5 bg-[#E1B137]"></div>
            <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em]">Global Network</span>
            <div class="w-8 h-0.5 bg-[#E1B137]"></div>
          </div>
          <h2 class="text-4xl md:text-5xl font-serif font-medium text-white leading-tight">
            Partners & <em class="not-italic text-[#E1B137]">Affiliations</em>
          </h2>
          <p class="text-white/50 mt-4 max-w-md mx-auto text-sm leading-relaxed">
            Collaborating with world-class organizations to foster ecological and social order.
          </p>
        </div>

        <div v-if="partners && partners.length > 0" class="relative">
          <div class="absolute left-0 top-0 bottom-0 w-16 md:w-28 bg-gradient-to-r from-[#20404c] to-transparent z-10 pointer-events-none"></div>
          <div class="absolute right-0 top-0 bottom-0 w-16 md:w-28 bg-gradient-to-l from-[#20404c] to-transparent z-10 pointer-events-none"></div>
          <div class="marquee-viewport">
            <div class="marquee-track">
              <!-- ✅ Partner card: clickable if website exists, no icon -->
              <component
                :is="partner.website ? 'a' : 'div'"
                v-for="(partner, index) in marqueePartners"
                :key="index"
                :href="partner.website || undefined"
                :target="partner.website ? '_blank' : undefined"
                :rel="partner.website ? 'noopener noreferrer' : undefined"
                class="group relative bg-white/[0.04] border border-[#E1B137]/30 px-8 py-9 flex flex-col items-center justify-center gap-4 shrink-0 w-[220px] transition-all duration-400"
                :class="partner.website
                  ? 'hover:border-[#E1B137] hover:bg-white/[0.06] hover:scale-[1.02] cursor-pointer'
                  : 'hover:border-[#E1B137]/50'"
              >
                <div class="h-14 flex items-center justify-center">
                  <img v-if="partner.logo" :src="partner.logo" :alt="partner.name"
                    loading="lazy"
                    class="max-h-14 w-auto object-contain brightness-100 transition-all duration-300 group-hover:scale-105" />
                  <span v-else class="font-serif text-white/70 text-lg tracking-wide">
                    {{ partner.name }}
                  </span>
                </div>
                <div class="text-center">
                  <p class="text-white font-semibold text-sm tracking-wide">{{ partner.name }}</p>
                  <p class="text-[#E1B137] text-[9px] uppercase tracking-[0.2em] mt-0.5">{{ partner.location }}</p>
                </div>
              </component>
            </div>
          </div>
        </div>
        <div v-else class="text-center py-10">
          <p class="text-white/40 text-sm">Partner organizations will be listed here soon.</p>
        </div>
      </div>
    </section>

    <!-- =========================================================
         SECTION 6 — NEWS & UPDATES (DYNAMIC) 
    ========================================================= -->
    <section id="news-updates" class="py-16 md:py-24 bg-[#f8f7f4] overflow-hidden">
      <div class="max-w-6xl mx-auto px-6 md:px-12">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-6 mb-12">
          <div>
            <div class="flex items-center gap-3 mb-4">
              <div class="w-8 h-0.5 bg-[#E1B137]"></div>
              <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em]">Latest Information</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-serif font-medium text-[#2b4b58]">
              News & <em class="not-italic text-[#E1B137]">Updates</em>
            </h2>
          </div>

          <div v-if="newsPages.length > 1" class="flex items-center gap-3">
            <button @click="prevNewsPage" :disabled="currentNewsPage === 0"
              :aria-label="'Previous page'"
              class="w-11 h-11 flex items-center justify-center border border-slate-300 text-slate-600 hover:bg-[#2b4b58] hover:text-white hover:border-[#2b4b58] transition-all disabled:opacity-30 disabled:pointer-events-none">
              <i class="fa-solid fa-chevron-left text-xs"></i>
            </button>
            <span class="text-slate-400 text-xs font-semibold tabular-nums">{{ currentNewsPage + 1 }} / {{ newsPages.length }}</span>
            <button @click="nextNewsPage" :disabled="currentNewsPage === newsPages.length - 1"
              :aria-label="'Next page'"
              class="inline-flex items-center gap-2 bg-[#2b4b58] text-white px-7 py-3.5 text-[11px] font-bold uppercase tracking-[0.2em] hover:bg-[#E1B137] transition-all duration-300 group disabled:opacity-40 disabled:pointer-events-none">
              View More <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
            </button>
          </div>
        </div>

        <div v-if="newsItems && newsItems.length > 0" class="overflow-hidden">
          <div class="flex transition-transform duration-500 ease-out"
            :style="{ transform: `translateX(-${currentNewsPage * 100}%)` }">
            <div v-for="(page, pIndex) in newsPages" :key="pIndex"
              class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 shrink-0 w-full items-stretch">
              <div v-for="news in page" :key="news.id"
                class="group relative flex flex-col h-full bg-white border border-slate-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-400">
                <div class="absolute bottom-0 left-0 h-0.5 w-0 bg-[#E1B137] group-hover:w-full transition-all duration-500 z-10"></div>
                <div class="relative h-48 overflow-hidden shrink-0">
                  <img :src="news.image" :alt="news.title"
                    loading="lazy"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                  <div class="absolute top-3 left-3">
                    <span class="bg-white/90 text-[#2b4b58] text-[9px] font-bold px-2.5 py-1 uppercase tracking-widest shadow-sm">
                      {{ news.category }}
                    </span>
                  </div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                  <div class="flex flex-nowrap items-center gap-2 text-slate-400 text-xs mb-3">
                    <span class="whitespace-nowrap">{{ formatDate(news.date) }}</span>
                    <span class="text-slate-300">·</span>
                    <span class="whitespace-nowrap">{{ news.read_time || news.readTime }}</span>
                  </div>
                  <h3 class="font-serif text-[#2b4b58] text-lg font-medium mb-2 group-hover:text-[#E1B137] transition-colors">
                    {{ news.title }}
                  </h3>
                  <p class="text-slate-400 text-sm mb-4 line-clamp-2 min-h-[2.5rem] sm:min-h-[2.75rem]">{{ stripHtml(news.description) }}</p>
                  <Link :href="'/news/' + news.id"
                    class="text-[#2b4b58] text-xs font-bold uppercase tracking-wider hover:text-[#E1B137] transition-colors inline-flex items-center gap-1.5 mt-auto pt-3 border-t border-slate-100">
                    Read More <i class="fa-solid fa-chevron-right text-[9px]"></i>
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div v-else class="text-center py-10">
          <p class="text-slate-400 text-sm">No news items available yet. Check back later!</p>
        </div>
      </div>
    </section>

    <!-- =========================================================
         SECTION 7 — VISIT US (static)
    ========================================================= -->
    <section class="bg-white border-t border-slate-100">
      <div class="max-w-6xl mx-auto px-6 md:px-12 py-20 md:py-28">

        <div class="text-center mb-14">
          <div class="flex items-center justify-center gap-3 mb-5">
            <div class="w-8 h-px bg-[#E1B137]"></div>
            <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em] font-display">Location</span>
            <div class="w-8 h-px bg-[#E1B137]"></div>
          </div>
          <h2 class="font-display text-4xl md:text-5xl text-[#2b4b58]">
            Find Your <em class="not-italic text-[#E1B137]">Sanctuary</em>
          </h2>
          <p class="text-slate-400 mt-4 max-w-md mx-auto text-sm leading-relaxed">
            Located in the heart of Lekki's ecological reserve, accessible to seekers from around the world.
          </p>
        </div>

        <div class="overflow-hidden border border-slate-200 shadow-md h-[320px] md:h-[420px]">
          <iframe
            src="https://maps.google.com/maps?q=07%20Kayode%20I%20Micah%20Street%20Meadow%20View%20Estate%20Lekki%20Lagos%20Nigeria&z=17&output=embed"
            width="100%"
            height="100%"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            title="Google Maps location of the ashram">
          </iframe>
        </div>

        <div class="text-center mt-8">
          <a
            href="https://www.google.com/maps/search/?api=1&query=07+Kayode+I+Micah+Street+Meadow+View+Estate+Lekki+Lagos+Nigeria"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center gap-3 bg-[#2b4b58] text-white px-8 py-4 font-display font-bold text-[11px] uppercase tracking-[0.2em] hover:bg-[#E1B137] hover:text-[#0d1e26] transition-all duration-300 group"
          >
            <i class="fa-solid fa-location-dot"></i>
            Get Directions
            <i class="fa-solid fa-arrow-right-long text-xs group-hover:translate-x-1 transition-transform"></i>
          </a>
        </div>

        <div class="text-center mt-6 text-slate-500 text-sm">
          <i class="fa-solid fa-map-pin text-[#E1B137] mr-2"></i>
          07, Kayode I. Micah Street, Off Abraham Adesanya-Ogombo Rd. Lekki Schem 2, Eti-Osa, Nigeria.
        </div>

      </div>
    </section>

    <!-- =========================================================
         AUDIO PLAYER - Only renders when needed
    ========================================================= -->
    <Teleport to="body">
      <div v-if="currentPodcast" class="fixed bottom-0 left-0 right-0 z-50 bg-white border-t border-slate-200 shadow-2xl">
        <div class="max-w-4xl mx-auto px-4 md:px-6 py-3 md:py-4">
          <div class="flex items-center gap-3 md:gap-4">
            <img :src="currentPodcast.thumbnail" :alt="currentPodcast.title"
              loading="lazy"
              class="w-12 h-12 md:w-14 md:h-14 object-cover rounded-md shrink-0" />
            <div class="flex-1 min-w-0">
              <p class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Now Playing</p>
              <p class="text-sm font-medium text-[#2b4b58] truncate">{{ currentPodcast.title }}</p>
              <p class="text-xs text-slate-400 truncate">{{ currentPodcast.speaker_name }}</p>
            </div>

            <!-- Transport controls: rewind / play-pause / fast-forward -->
            <div class="relative flex items-center gap-1 md:gap-2">
              <transition name="fade">
                <span v-if="skipFeedback"
                  class="absolute -top-8 left-1/2 -translate-x-1/2 bg-[#2b4b58] text-white text-[11px] font-bold px-2.5 py-1 rounded-full shadow-lg pointer-events-none whitespace-nowrap">
                  {{ skipFeedback }}
                </span>
              </transition>

              <button @click="skipBackward"
                aria-label="Rewind 15 seconds"
                class="relative w-11 h-11 shrink-0 flex items-center justify-center rounded-full text-slate-500 hover:text-[#2b4b58] hover:bg-slate-100 active:scale-90 active:bg-slate-200 transition-all touch-manipulation">
                <i class="fa-solid fa-rotate-left text-lg"></i>
                <span class="absolute text-[8px] font-bold mt-0.5 leading-none">15</span>
              </button>

              <button @click="togglePlay"
                :aria-label="isPlaying ? 'Pause' : 'Play'"
                class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-[#E1B137] hover:bg-[#2b4b58] active:scale-95 transition flex items-center justify-center text-white text-lg shrink-0 touch-manipulation">
                <i :class="isPlaying ? 'fa-solid fa-pause' : 'fa-solid fa-play'"></i>
              </button>

              <button @click="skipForward"
                aria-label="Fast forward 30 seconds"
                class="relative w-11 h-11 shrink-0 flex items-center justify-center rounded-full text-slate-500 hover:text-[#2b4b58] hover:bg-slate-100 active:scale-90 active:bg-slate-200 transition-all touch-manipulation">
                <i class="fa-solid fa-rotate-right text-lg"></i>
                <span class="absolute text-[8px] font-bold mt-0.5 leading-none">30</span>
              </button>

              <button @click="closePlayer"
                aria-label="Close player"
                class="w-9 h-9 shrink-0 flex items-center justify-center rounded-full text-slate-400 hover:text-red-500 hover:bg-slate-100 active:scale-90 transition-all touch-manipulation ml-1">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>
          </div>

          <div class="mt-2 flex items-center gap-3">
            <span class="text-xs text-slate-400 font-mono tabular-nums min-w-[40px]">{{ formatTime(currentTime) }}</span>
            <div
              class="flex-1 relative py-2.5 -my-2.5 select-none touch-none"
              :class="isDragging ? 'cursor-grabbing' : 'cursor-grab'"
              role="slider"
              :aria-valuenow="Math.round(safePlaybackProgress)"
              :aria-valuemin="0"
              :aria-valuemax="100"
              aria-label="Audio progress"
              @mousedown="onMouseDown"
              @touchstart="onTouchStart"
              @click="seekAudio"
            >
              <div class="relative h-1.5 group-hover:h-2 bg-slate-200 rounded-full overflow-visible transition-all duration-150">
                <div class="absolute inset-y-0 left-0 bg-slate-300/60 rounded-full"
                  :style="{ width: safeBufferedProgress + '%' }"></div>
                <div class="absolute inset-y-0 left-0 bg-[#E1B137] rounded-full"
                  :class="isDragging ? '' : 'transition-all duration-100'"
                  :style="{ width: safePlaybackProgress + '%' }"></div>
                <div
                  class="absolute top-1/2 -translate-y-1/2 -translate-x-1/2 w-3.5 h-3.5 bg-[#E1B137] border-2 border-white rounded-full shadow transition-opacity duration-150"
                  :class="isDragging ? 'opacity-100 scale-125' : 'opacity-0 hover:opacity-100'"
                  :style="{ left: safePlaybackProgress + '%' }"
                ></div>
              </div>
            </div>
            <span class="text-xs text-slate-400 font-mono tabular-nums min-w-[40px]">{{ formatTime(currentDuration) }}</span>
          </div>
          <div v-if="isLoading" class="absolute bottom-full left-0 right-0 h-0.5 bg-[#E1B137]/30 overflow-hidden">
            <div class="h-full bg-[#E1B137] animate-loading-bar"></div>
          </div>
        </div>
      </div>
    </Teleport>

  </div>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import HeroSlider from '../Components/HeroSlider.vue'
import FeaturedCarousel from '@/Components/FeaturedCarousel.vue'
import { Link } from '@inertiajs/vue3'
import { ref, computed, onMounted, onUnmounted, watch, shallowRef } from 'vue'
import AOS from 'aos'
import 'aos/dist/aos.css'
import axios from 'axios'

defineOptions({ layout: GuestLayout })

const props = defineProps({
  heroSlides: Array,
  pillars: Array,
  experiences: Array,
  podcasts: Array,
  partners: Array,
  newsItems: Array,
  featuredArticles: Array,
  recentArticles: Array,
  recipes: Array,
  totalRecipesCount: Number,
  featuredPoints: Array,
  concencrationImg: String,
  indianExpoImg: String,
})

// ── Toast (simple) ──
const showToast = (message, type = 'info') => {
  // You can replace this with your actual toast implementation
  console.log(`[${type}] ${message}`)
}

// ── Helper Functions ──
const formatDate = (date) => {
  if (!date) return ''
  try {
    const d = new Date(date)
    return d.toLocaleDateString('en-US', {
      year: 'numeric',
      month: 'short',
      day: 'numeric',
    })
  } catch (e) {
    return date
  }
}

// ── Strip HTML tags from a string — used for card excerpts ──
// Handles both raw HTML and HTML-escaped entities from the backend
const stripHtml = (html) => {
  if (!html) return ''
  let s = String(html)
  // 1. Decode HTML entities first (in case the backend sent &lt;p&gt;)
  s = s
    .replace(/&lt;/g, '<')
    .replace(/&gt;/g, '>')
    .replace(/&quot;/g, '"')
    .replace(/&#39;/g, "'")
    .replace(/&#x27;/g, "'")
    .replace(/&apos;/g, "'")
    .replace(/&nbsp;/g, ' ')
    .replace(/&amp;/g, '&')
  // 2. Strip all HTML tags
  s = s.replace(/<[^>]*>/g, ' ')
  // 3. Decode again (in case entities were double-encoded)
  s = s
    .replace(/&lt;/g, '<')
    .replace(/&gt;/g, '>')
    .replace(/&quot;/g, '"')
    .replace(/&#39;/g, "'")
    .replace(/&nbsp;/g, ' ')
    .replace(/&amp;/g, '&')
  // 4. Collapse whitespace
  return s.replace(/\s+/g, ' ').trim()
}

// ── Recipe Image Helper ──
const getRecipeImage = (recipe) => {
  return recipe.image_url || '/img/placeholder-recipe.jpg'
}

const handleImageError = (event) => {
  console.warn('Image failed to load:', event.target.src)
  event.target.src = '/img/placeholder-recipe.jpg'
}

// ── ✅ BOOKMARK MANAGEMENT (LocalStorage) ──
const bookmarks = ref({})

// Load bookmarks from localStorage
const loadBookmarks = () => {
  try {
    const saved = localStorage.getItem('ashram_podcast_bookmarks')
    if (saved) {
      bookmarks.value = JSON.parse(saved)
    }
  } catch (e) {
    console.warn('Failed to load bookmarks:', e)
    bookmarks.value = {}
  }
}

// Save bookmarks to localStorage
const saveBookmarks = () => {
  try {
    localStorage.setItem('ashram_podcast_bookmarks', JSON.stringify(bookmarks.value))
  } catch (e) {
    console.warn('Failed to save bookmarks:', e)
  }
}

// Toggle bookmark for a podcast
const toggleBookmark = (podcast) => {
  if (!podcast) return
  
  if (bookmarks.value[podcast.id]) {
    delete bookmarks.value[podcast.id]
    podcast.bookmarked = false
    showToast('Bookmark removed', 'info')
  } else {
    bookmarks.value[podcast.id] = true
    podcast.bookmarked = true
    showToast('Bookmarked! ✓', 'success')
  }
  saveBookmarks()
}

// ── Podcast Player ──
const showAllEpisodes = ref(false)
const currentPlaying = ref(null)
const currentPodcast = ref(null)
const isPlaying = ref(false)
const volume = ref(0.7)
const currentTime = ref(0)
const playbackProgress = ref(0)
const audioElement = shallowRef(null)
const isLoading = ref(false)
const bufferedProgress = ref(0)
const currentDuration = ref(0)
const isDragging = ref(false)

// ── Skip forward/backward config + tap feedback ──
const SKIP_BACKWARD_SECONDS = 15
const SKIP_FORWARD_SECONDS = 30
const skipFeedback = ref(null)
let skipFeedbackTimeout = null

const showSkipFeedback = (label) => {
  skipFeedback.value = label
  clearTimeout(skipFeedbackTimeout)
  skipFeedbackTimeout = setTimeout(() => {
    skipFeedback.value = null
  }, 700)
}

const safePlaybackProgress = computed(() => {
  const p = playbackProgress.value
  if (!isFinite(p) || isNaN(p)) return 0
  return Math.min(100, Math.max(0, p))
})

const safeBufferedProgress = computed(() => {
  const p = bufferedProgress.value
  if (!isFinite(p) || isNaN(p)) return 0
  return Math.min(100, Math.max(0, p))
})

const visiblePodcasts = computed(() => {
  if (!props.podcasts) return []
  return showAllEpisodes.value ? props.podcasts : props.podcasts.slice(0, 3)
})

const toggleAllEpisodes = () => { showAllEpisodes.value = !showAllEpisodes.value }

const playPodcast = async (podcast) => {
  if (currentPlaying.value === podcast.id) { togglePlay(); return }

  try {
    const response = await axios.post(`/podcasts/${podcast.id}/listen`)
    if (response.data.success) {
      podcast.listens = response.data.podcast.listens
    }
  } catch (error) {
    console.error('Failed to increment listens:', error)
  }

  if (!podcast.audio) {
    currentPlaying.value = podcast.id
    currentPodcast.value = podcast
    isPlaying.value = false
    return
  }

  if (audioElement.value) {
    audioElement.value.pause()
    audioElement.value.currentTime = 0
  }
  currentPlaying.value = podcast.id
  currentPodcast.value = podcast
  currentDuration.value = 0
  playbackProgress.value = 0
  bufferedProgress.value = 0
  
  if (audioElement.value) {
    audioElement.value.src = podcast.audio
    try {
      await audioElement.value.play()
      isPlaying.value = true
    } catch (e) {
      console.error('Playback failed:', e)
      isLoading.value = false
    }
  }
}

const togglePlay = async () => {
  if (!audioElement.value || !currentPodcast.value) return
  if (isPlaying.value) {
    audioElement.value.pause()
    isPlaying.value = false
  } else {
    try {
      await audioElement.value.play()
      isPlaying.value = true
    } catch (e) {
      console.error('Playback failed:', e)
      isLoading.value = false
    }
  }
}

const closePlayer = () => {
  if (audioElement.value) {
    audioElement.value.pause()
    audioElement.value.src = ''
  }
  isPlaying.value = false
  currentPlaying.value = null
  currentPodcast.value = null
  currentTime.value = 0
  playbackProgress.value = 0
  bufferedProgress.value = 0
  isDragging.value = false
  skipFeedback.value = null
  clearTimeout(skipFeedbackTimeout)
}

const skipBackward = () => {
  if (!audioElement.value) return
  audioElement.value.currentTime = Math.max(0, audioElement.value.currentTime - SKIP_BACKWARD_SECONDS)
  showSkipFeedback(`-${SKIP_BACKWARD_SECONDS}s`)
}

const skipForward = () => {
  if (!audioElement.value) return
  const duration = audioElement.value.duration
  const hasValidDuration = duration && isFinite(duration) && duration > 0
  const target = audioElement.value.currentTime + SKIP_FORWARD_SECONDS
  audioElement.value.currentTime = hasValidDuration ? Math.min(duration, target) : target
  showSkipFeedback(`+${SKIP_FORWARD_SECONDS}s`)
}

const updateProgress = () => {
  if (!audioElement.value || !currentPodcast.value || isDragging.value) return
  currentTime.value = audioElement.value.currentTime
  const duration = audioElement.value.duration
  if (duration && isFinite(duration) && duration > 0) {
    playbackProgress.value = (currentTime.value / duration) * 100
  }
}

const updateBuffered = () => {
  if (audioElement.value && audioElement.value.buffered.length > 0) {
    const buffered = audioElement.value.buffered
    const duration = audioElement.value.duration
    if (duration && isFinite(duration) && duration > 0) {
      bufferedProgress.value = (buffered.end(buffered.length - 1) / duration) * 100
    }
  }
}

const getSeekTime = (event) => {
  if (!audioElement.value) return NaN
  const duration = audioElement.value.duration
  if (!duration || !isFinite(duration) || duration <= 0) return NaN
  const rect = event.currentTarget.getBoundingClientRect()
  const clientX = event.touches ? event.touches[0].clientX : event.clientX
  const x = Math.min(Math.max((clientX - rect.left) / rect.width, 0), 1)
  return x * duration
}

const seekAudio = (event) => {
  if (!audioElement.value) return
  const duration = audioElement.value.duration
  if (!duration || !isFinite(duration) || duration <= 0) return
  const seekTime = getSeekTime(event)
  if (!isNaN(seekTime)) {
    audioElement.value.currentTime = seekTime
    currentTime.value = seekTime
    playbackProgress.value = (seekTime / duration) * 100
  }
}

const onMouseDown = (event) => {
  if (!audioElement.value || !audioElement.value.duration || !isFinite(audioElement.value.duration)) return
  isDragging.value = true
  seekAudio(event)
  document.addEventListener('mousemove', onMouseMove)
  document.addEventListener('mouseup', onMouseUp)
}

const onMouseMove = (event) => {
  if (!isDragging.value) return
  seekAudio(event)
}

const onMouseUp = () => {
  isDragging.value = false
  document.removeEventListener('mousemove', onMouseMove)
  document.removeEventListener('mouseup', onMouseUp)
}

const onTouchStart = (event) => {
  if (!audioElement.value || !audioElement.value.duration || !isFinite(audioElement.value.duration)) return
  event.preventDefault()
  isDragging.value = true
  seekAudio(event)
  document.addEventListener('touchmove', onTouchMove, { passive: false })
  document.addEventListener('touchend', onTouchEnd)
}

const onTouchMove = (event) => {
  event.preventDefault()
  if (!isDragging.value) return
  seekAudio(event)
}

const onTouchEnd = () => {
  isDragging.value = false
  document.removeEventListener('touchmove', onTouchMove)
  document.removeEventListener('touchend', onTouchEnd)
}

const formatTime = (s) => {
  if (!s && s !== 0) return '0:00'
  const minutes = Math.floor(s / 60)
  const seconds = Math.floor(s % 60)
  return `${minutes}:${seconds.toString().padStart(2, '0')}`
}

watch(volume, (v) => {
  if (audioElement.value) audioElement.value.volume = v
})

const handleKeydown = (e) => {
  if (!currentPodcast.value) return
  if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA' || e.target.tagName === 'SELECT') return
  if (e.repeat) return

  if (e.key === 'ArrowLeft') {
    e.preventDefault()
    skipBackward()
  } else if (e.key === 'ArrowRight') {
    e.preventDefault()
    skipForward()
  } else if (e.key === ' ' || e.key === 'Space') {
    e.preventDefault()
    togglePlay()
  }
}

// ── Partners marquee ──
const marqueePartners = computed(() => {
  if (!props.partners || props.partners.length === 0) return []
  return [...props.partners, ...props.partners]
})

// ── ARTICLES TOGGLE ──
const showAllArticles = ref(false)

const visibleArticles = computed(() => {
  if (!props.recentArticles) return []
  return showAllArticles.value ? props.recentArticles : props.recentArticles.slice(0, 3)
})

const toggleAllArticles = () => {
  showAllArticles.value = !showAllArticles.value
}

// ── NEWS & UPDATES carousel ──
const NEWS_PER_PAGE = 3
const currentNewsPage = ref(0)

const newsPages = computed(() => {
  if (!props.newsItems || props.newsItems.length === 0) return []
  const pages = []
  for (let i = 0; i < props.newsItems.length; i += NEWS_PER_PAGE) {
    pages.push(props.newsItems.slice(i, i + NEWS_PER_PAGE))
  }
  return pages
})

const nextNewsPage = () => {
  if (currentNewsPage.value < newsPages.value.length - 1) currentNewsPage.value++
}

const prevNewsPage = () => {
  if (currentNewsPage.value > 0) currentNewsPage.value--
}

// ── Lifecycle ──
const initAudio = () => {
  if (!audioElement.value) {
    const audio = new Audio()
    audio.volume = volume.value
    audio.addEventListener('timeupdate', updateProgress)
    audio.addEventListener('loadedmetadata', () => {
      currentDuration.value = audio.duration
    })
    audio.addEventListener('waiting', () => {
      isLoading.value = true
    })
    audio.addEventListener('canplay', () => {
      isLoading.value = false
    })
    audio.addEventListener('progress', updateBuffered)
    audio.addEventListener('error', (e) => {
      console.error('Audio error:', e)
      isLoading.value = false
    })
    audio.addEventListener('ended', () => {
      isPlaying.value = false
      playbackProgress.value = 0
      currentTime.value = 0
      setTimeout(() => {
        if (!isPlaying.value) closePlayer()
      }, 3000)
    })
    audioElement.value = audio
  }
}

// Use requestIdleCallback for non-critical initialization
const initAOS = () => {
  if ('requestIdleCallback' in window) {
    requestIdleCallback(() => {
      AOS.init({ duration: 800, once: true, offset: 40, easing: 'ease-out' })
    })
  } else {
    setTimeout(() => {
      AOS.init({ duration: 800, once: true, offset: 40, easing: 'ease-out' })
    }, 100)
  }
}

onMounted(() => {
  initAOS()
  initAudio()
  document.addEventListener('keydown', handleKeydown)
  
  // ✅ Load bookmarks and apply to podcasts
  loadBookmarks()
  if (props.podcasts) {
    props.podcasts.forEach(podcast => {
      if (bookmarks.value[podcast.id]) {
        podcast.bookmarked = true
      }
    })
  }
})

onUnmounted(() => {
  if (audioElement.value) {
    audioElement.value.pause()
    audioElement.value.src = ''
    audioElement.value = null
  }
  document.removeEventListener('keydown', handleKeydown)
  document.removeEventListener('mousemove', onMouseMove)
  document.removeEventListener('mouseup', onMouseUp)
  document.removeEventListener('touchmove', onTouchMove)
  document.removeEventListener('touchend', onTouchEnd)
  clearTimeout(skipFeedbackTimeout)
  AOS.refresh()
})
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap');

.font-montserrat { font-family: 'Montserrat', sans-serif; }

[v-cloak] {
  display: none;
}

.line-clamp-1 {
  display: -webkit-box;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.player-up-enter-active,
.player-up-leave-active {
  transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
}
.player-up-enter-from,
.player-up-leave-to {
  transform: translate(-50%, 120%);
  opacity: 0;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.25s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.marquee-viewport {
  overflow: hidden;
}
.marquee-track {
  display: flex;
  gap: 1.25rem;
  width: max-content;
  animation: marquee-scroll 32s linear infinite;
}
.marquee-viewport:hover .marquee-track {
  animation-play-state: paused;
}
@keyframes marquee-scroll {
  from { transform: translateX(0); }
  to { transform: translateX(-50%); }
}
@media (prefers-reduced-motion: reduce) {
  .marquee-track {
    animation: none;
    flex-wrap: wrap;
    width: 100%;
  }
}

@keyframes loadingBar {
  0% { transform: translateX(-100%); }
  100% { transform: translateX(100%); }
}
.animate-loading-bar {
  animation: loadingBar 1.5s ease-in-out infinite;
}
</style>