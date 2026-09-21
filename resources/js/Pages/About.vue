<template>
  <main class="page-wrapper font-body">
    <Head>
      <title>About | The Lekki Ashram</title>
      <meta name="description" content="Discover the story and mission behind The Lekki Ashram - a sanctuary for higher living rooted in Advaita philosophy and ecological stewardship." />
      <meta property="og:title" content="About | The Lekki Ashram" />
      <meta property="og:description" content="Discover the story and mission behind The Lekki Ashram - a sanctuary for higher living rooted in Advaita philosophy and ecological stewardship." />
    </Head>

    <!-- =====================================================
         HERO — Parallax
    ===================================================== -->
    <section class="relative min-h-screen overflow-hidden bg-[#0d1e26]" ref="heroRef">
      <div
        class="absolute inset-0 will-change-transform parallax-layer"
        :style="{ transform: `translateY(${heroParallax}px)`, top: '-15%', height: '130%' }"
      >
        <img
          src="/img/about.jpg"
          alt="The Lekki Ashram"
          class="w-full h-full object-cover"
        />
        <div class="absolute inset-0 bg-[#0d1e26]/50"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#0d1e26]/70 via-[#0d1e26]/30 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#0d1e26]/60 via-transparent to-transparent"></div>
      </div>

      <div class="absolute right-8 top-1/2 -translate-y-1/2 hidden lg:flex flex-col items-center gap-3 z-10">
        <div class="w-px h-16 bg-white/20"></div>
        <span class="text-white/25 text-[9px] uppercase tracking-[0.5em] font-display"
          style="writing-mode: vertical-rl; transform: rotate(180deg);">
          The Art of Living
        </span>
        <div class="w-px h-16 bg-white/20"></div>
      </div>

      <div class="relative min-h-screen flex items-center">
        <div class="max-w-6xl mx-auto px-6 md:px-12 w-full">
          <div class="max-w-3xl">
            <div class="flex items-center gap-4 mb-6 md:mb-8 hero-item" style="animation-delay:.1s">
              <div class="w-12 h-px bg-[#E1B137]"></div>
              <span class="text-[#E1B137] font-display font-bold uppercase tracking-[0.45em] text-[10px]">
                The Art of Living Center
              </span>
            </div>

            <h1 class="font-display text-4xl sm:text-5xl md:text-6xl lg:text-[84px] text-white leading-[0.93] mb-6 md:mb-8 hero-item" style="animation-delay:.25s">
              A Journey<br>
              <span class="text-[#E1B137]">Into Higher</span><br>
              <span class="text-white/75 italic">Living</span>
            </h1>

            <div class="flex items-center gap-4 mb-6 md:mb-8 hero-item" style="animation-delay:.38s">
              <div class="w-20 h-px bg-white/20"></div>
              <div class="w-2 h-2 border border-[#E1B137] rotate-45"></div>
              <div class="w-20 h-px bg-white/20"></div>
            </div>

            <p class="text-white/80 text-base md:text-lg lg:text-xl font-light leading-relaxed max-w-lg mb-8 md:mb-12 hero-item" style="animation-delay:.48s">
              Rooted in Advaita wisdom, we cultivate stillness, awareness,
              and conscious transformation in a sacred community space.
            </p>

            <div class="flex flex-wrap gap-4 hero-item" style="animation-delay:.58s">
              <button @click="openModal"
                class="inline-flex items-center gap-3 bg-[#E1B137] text-[#0d1e26] px-8 py-4 font-display font-bold text-[11px] uppercase tracking-[0.2em] hover:bg-white transition-all duration-300 group">
                <i class="fa-solid fa-calendar-check"></i>
                Visit the Ashram
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="absolute bottom-6 md:bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 hero-item" style="animation-delay:.75s">
        <span class="text-white/30 text-[9px] font-display uppercase tracking-[0.45em]">Scroll</span>
        <div class="w-px h-10 md:h-14 bg-gradient-to-b from-white/30 to-transparent animate-pulse-slow"></div>
      </div>
    </section>

    <!-- STATS BAR (ANIMATED) -->
    <section class="bg-[#2b4b58]" ref="statsRef">
      <div class="max-w-6xl mx-auto px-6 md:px-12">
        <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-white/10">
          <div v-for="(stat, i) in stats" :key="stat.label"
            class="py-10 px-6 text-center group hover:bg-white/5 transition-colors duration-300">
            <div class="font-display text-3xl md:text-4xl font-bold text-[#E1B137] mb-1 group-hover:scale-110 transition-transform duration-300 inline-block">
              {{ animatedStats[i] }}{{ stat.suffix }}
            </div>
            <div class="text-white/40 text-[10px] uppercase tracking-[0.35em] font-display block mt-1">{{ stat.label }}</div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 1 — ABOUT STRIP -->
    <section class="py-16 md:py-28 bg-white">
      <div class="max-w-6xl mx-auto px-6 md:px-12">
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
          <div class="w-full lg:w-5/12 relative">
            <div class="rounded-xl overflow-hidden shadow-2xl">
              <img
                src="/img/our-journey-img.jpg"
                alt="The Lekki Ashram"
                class="w-full h-64 md:h-[480px] object-cover"
              />
            </div>
            <div class="absolute -bottom-4 -right-4 w-full h-full border-2 border-[#E1B137]/30 rounded-xl -z-10"></div>
            <div class="absolute -top-5 -left-5 w-20 h-20 md:w-24 md:h-24 bg-[#E1B137] rounded-full flex flex-col items-center justify-center shadow-xl z-10">
              <span class="text-white font-bold text-xl md:text-2xl leading-none font-serif">3k+</span>
              <span class="text-white text-[8px] md:text-[9px] uppercase tracking-widest font-semibold mt-0.5 text-center leading-tight">Years of<br/>Wisdom</span>
            </div>
          </div>

          <div class="w-full lg:w-7/12 space-y-6 md:space-y-7">
            <div>
              <div class="flex items-center gap-3 mb-4">
                <div class="w-8 h-0.5 bg-[#E1B137]"></div>
                <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em]">The Lekki Ashram</span>
              </div>
              <h2 class="text-3xl md:text-5xl font-serif font-medium text-[#2b4b58] leading-tight">
                A Sanctuary for<br/>
                <em class="not-italic text-[#E1B137]">Higher Living</em>
              </h2>
            </div>

            <p class="text-slate-500 text-sm md:text-base leading-relaxed">
              Guided by Advaita and grounded in the preservation of nature, The Lekki Ashram is more than a sanctuary. It is a movement for human evolution, where ecological wisdom and philosophical depth walk hand in hand.
            </p>

            <div class="grid grid-cols-2 gap-4 md:gap-6 py-6 border-y border-slate-100">
              <div>
                <div class="flex items-center gap-2 mb-2">
                  <div class="w-4 h-0.5 bg-[#E1B137]"></div>
                  <p class="text-[10px] font-bold uppercase tracking-widest text-[#2b4b58]">Our Mission</p>
                </div>
                <p class="text-slate-500 text-xs md:text-sm leading-relaxed">Expand human capacity through mental clarity and ecological harmony.</p>
              </div>
              <div>
                <div class="flex items-center gap-2 mb-2">
                  <div class="w-4 h-0.5 bg-[#E1B137]"></div>
                  <p class="text-[10px] font-bold uppercase tracking-widest text-[#2b4b58]">Our Vision</p>
                </div>
                <p class="text-slate-500 text-xs md:text-sm leading-relaxed">A global society operating in a state of high consciousness.</p>
              </div>
            </div>

            <button @click="openPathPanel"
              class="inline-flex items-center gap-3 bg-[#2b4b58] text-white px-8 py-4 text-[11px] font-bold uppercase tracking-[0.2em] hover:bg-[#E1B137] transition-all duration-300 group">
              Explore Our Path
              <i class="fa-solid fa-arrow-right-long group-hover:translate-x-1 transition-transform"></i>
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 3 — FOUNDER -->
    <section id="founder-section" class="py-16 md:py-36 bg-[#f8f7f4]">
      <div class="max-w-6xl mx-auto px-6 md:px-12">
        <div class="flex flex-col lg:flex-row items-start gap-12 lg:gap-24">
          <div class="w-full lg:w-7/12 space-y-6 md:space-y-8 order-2 lg:order-1">
            <div>
              <div class="flex items-center gap-3 mb-5">
                <div class="w-8 h-px bg-[#E1B137]"></div>
                <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em] font-display">Convener</span>
              </div>
              <h2 class="font-display text-3xl md:text-5xl text-[#2b4b58] leading-tight mb-6">
                Iyke <em class="not-italic text-[#E1B137]">OHAEGBU</em>
              </h2>
              <div class="space-y-4 text-slate-500 text-sm md:text-base leading-relaxed">
                <p>
                  Iyke, as fondly called by friends, is the Convener of The Art of Living Center, Lekki-Nigeria, fondly called The Lekki Ashram. He has dedicated over 15 years to the teaching of Advaita and guiding individuals toward the consequent amazing experience of self-realization. His teachings blend ancient wisdom with contemporary understanding.
                </p>
                <p>
                  He prefers a very ascetic lifestyle and in the past three decades, has criss-crossed various professional and academic fields, ranging from, but not limited to, the natural sciences, environment, construction, theology, philosophy, and mysticism.
                </p>
                <p>
                  His earliest years were heavily influenced by epistemology, especially the moral principle of categorical imperative as famously propounded by Immanuel Kant. Later years by works of legendary spiritualists, biologists, and historians, namely B.K.S. Iyengar, Swami Vivekananda, famous English poet and critic Gerald Massey, Charles Darwin, Richard Dawkins, Jiddu Krishnamurti, and Noah Yuval Harari.
                </p>
                <p>
                  Much of his engagements and public opinions on Advaita were borne out of personal experiences and association with the Vedanta Society of New York, United States of America, led by Swami Sarvapriyananda.
                </p>
              </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-3">
              <div v-for="c in contributions" :key="c"
                class="flex items-start gap-3 p-4 bg-white border border-slate-100 hover:border-[#E1B137]/30 hover:shadow-sm transition-all duration-300">
                <div class="w-5 h-5 bg-[#E1B137]/15 flex items-center justify-center shrink-0 mt-0.5">
                  <i class="fa-solid fa-check text-[#E1B137] text-[10px]"></i>
                </div>
                <p class="text-slate-600 text-sm">{{ c }}</p>
              </div>
            </div>

          </div>

          <div class="w-full lg:w-5/12 relative order-1 lg:order-2 lg:sticky lg:top-24">
            <div class="overflow-hidden shadow-2xl">
              <img src="/img/trustees/founder.jpg" alt="Iyke OHAEGBU"
                class="w-full h-[320px] md:h-[540px] object-cover hover:scale-105 transition-transform duration-700" />
              <div class="absolute inset-0 bg-gradient-to-t from-[#0d1e26]/30 via-transparent to-transparent"></div>
            </div>
            <div class="absolute -bottom-6 -left-6 bg-[#2b4b58] px-6 py-4 md:px-7 md:py-5 shadow-2xl z-10">
              <div class="font-display text-3xl md:text-4xl font-bold text-[#E1B137]">15+</div>
              <div class="text-white/50 text-[8px] md:text-[9px] uppercase tracking-[0.35em] font-display mt-0.5">Years Teaching</div>
            </div>
            <div class="absolute -bottom-5 -right-5 w-full h-full border-2 border-[#E1B137]/20 -z-10"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 4 — BOARD OF TRUSTEES (3 members, images fully visible) -->
    <section class="py-16 md:py-36 bg-white">
      <div class="max-w-6xl mx-auto px-6 md:px-12">
        <div class="text-center mb-12 md:mb-16">
          <div class="flex items-center justify-center gap-3 mb-5">
            <div class="w-8 h-px bg-[#E1B137]"></div>
            <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em] font-display">Governance</span>
            <div class="w-8 h-px bg-[#E1B137]"></div>
          </div>
          <h2 class="font-display text-3xl md:text-5xl text-[#2b4b58] mb-5">
            Board of <em class="not-italic text-[#E1B137]">Trustees</em>
          </h2>
          <p class="text-slate-400 max-w-md mx-auto text-sm leading-relaxed">
            Three dedicated trustees who oversee our mission and ensure sustainable growth, alongside our Convener.
          </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 items-start">
          <div v-for="(t, i) in trustees" :key="i"
            class="group bg-[#f8f7f4] border border-slate-100 hover:border-[#E1B137]/40 hover:shadow-xl transition-all duration-400 overflow-hidden flex flex-col">
            <div class="relative h-64 md:h-72 overflow-hidden bg-white flex items-center justify-center">
              <img :src="t.image" :alt="t.name"
                class="w-full h-full object-contain transition-transform duration-700 group-hover:scale-105" />
              <div class="absolute inset-0 bg-gradient-to-t from-[#0d1e26]/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
              <div class="absolute bottom-3 left-3 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-2 group-hover:translate-y-0">
                <span class="bg-[#E1B137] text-[#0d1e26] text-[8px] font-display font-bold uppercase tracking-[0.3em] px-3 py-1.5">{{ t.role }}</span>
              </div>
            </div>
            <div class="p-6 flex-1 flex flex-col">
              <div class="mb-4">
                <h3 class="font-display text-lg text-[#2b4b58] mb-0.5">{{ t.name }}</h3>
                <p class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.25em] font-display">{{ t.role }}</p>
              </div>

              <!-- Bio with Read More toggle -->
              <div class="relative">
                <p
                  class="text-slate-500 text-sm leading-relaxed transition-all duration-500 overflow-hidden"
                  :class="expandedBio[i] ? 'max-h-[800px]' : 'max-h-[120px]'"
                >
                  {{ t.bio }}
                </p>

                <!-- Fade overlay when collapsed -->
                <div
                  v-if="!expandedBio[i] && t.bio.length > 200"
                  class="absolute bottom-0 left-0 right-0 h-12 bg-gradient-to-t from-[#f8f7f4] to-transparent pointer-events-none transition-opacity duration-300"
                ></div>
              </div>

              <!-- Read More / Less button -->
              <button
                v-if="t.bio.length > 200"
                @click="toggleBio(i)"
                class="mt-3 self-start inline-flex items-center gap-1.5 text-[10px] font-display font-bold uppercase tracking-[0.2em] text-[#E1B137] hover:text-[#2b4b58] transition-colors duration-300"
              >
                {{ expandedBio[i] ? 'Read Less' : 'Read More' }}
                <i
                  class="fa-solid fa-chevron-down text-[8px] transition-transform duration-300"
                  :class="expandedBio[i] ? 'rotate-180' : ''"
                ></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 5 — JOIN OUR COMMUNITY (Parallax CTA) -->
    <section class="relative min-h-[75vh] flex items-center overflow-hidden" ref="ctaRef">
      <div
        class="absolute inset-0 will-change-transform parallax-layer"
        :style="{ transform: `translateY(${ctaParallax}px)`, top: '-15%', height: '130%' }"
      >
        <img
          src="/img/parallax-img-1.jpg"
          alt="Join Our Community"
          class="w-full h-full object-cover"
        />
        <div class="absolute inset-0 bg-[#0d1e26]/20"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#0d1e26]/40 via-transparent to-transparent"></div>
      </div>

      <div class="absolute inset-0 opacity-[0.02] pointer-events-none"
        style="background-image: radial-gradient(circle, #E1B137 1px, transparent 1px); background-size: 40px 40px;"></div>

      <div class="relative w-full max-w-6xl mx-auto px-6 md:px-12 py-20 md:py-36">
        <div class="max-w-2xl">
          <div class="flex items-center gap-4 mb-6 md:mb-7">
            <div class="w-12 h-px bg-[#E1B137]"></div>
            <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.45em] font-display">Join Our Community</span>
          </div>

          <h2 class="font-display text-4xl md:text-6xl lg:text-7xl text-white leading-[0.95] mb-6 md:mb-7">
            Ready to<br>
            <em class="not-italic text-[#E1B137]">Begin</em> Your<br>
            <span class="text-white/75 italic">Journey?</span>
          </h2>

          <div class="flex items-center gap-4 mb-8">
            <div class="w-16 h-px bg-white/20"></div>
            <div class="w-1.5 h-1.5 border border-[#E1B137] rotate-45"></div>
            <div class="w-16 h-px bg-white/20"></div>
          </div>

          <p class="text-white/85 text-base md:text-lg leading-relaxed mb-10 md:mb-12 max-w-xl">
            Whether you're seeking meditation guidance, ecological involvement, or philosophical study, we welcome you to our sacred community.
          </p>

          <div class="flex flex-col sm:flex-row flex-wrap gap-4 mb-10 md:mb-14">
            <button @click="openModal"
              class="inline-flex items-center justify-center gap-3 bg-[#E1B137] text-[#0d1e26] px-8 py-4 font-display font-bold text-[11px] uppercase tracking-[0.2em] hover:bg-white transition-all duration-300 group">
              <i class="fa-solid fa-calendar-check"></i>
              Schedule a Visit
            </button>
            <a :href="`https://wa.me/2349069258377?text=${encodeURIComponent(whatsappMsg)}`" target="_blank"
              class="inline-flex items-center justify-center gap-3 bg-[#25D366] text-white px-8 py-4 font-display font-bold text-[11px] uppercase tracking-[0.2em] hover:bg-[#128C7E] transition-all duration-300">
              <i class="fa-brands fa-whatsapp"></i>
              WhatsApp Us
            </a>
            <Link href="/get-involved"
              class="inline-flex items-center justify-center gap-3 border border-white/30 text-white px-8 py-4 font-display font-bold text-[11px] uppercase tracking-[0.2em] hover:border-[#E1B137] hover:text-[#E1B137] transition-all duration-300">
                  <i class="fa-solid fa-hand-holding-heart"></i> Get Involved
            </Link>
          </div>

          <div class="flex flex-wrap gap-x-8 gap-y-3 pt-8 border-t border-white/15">
            <a href="tel:+2349069258377" class="text-white/70 hover:text-white/90 transition-colors flex items-center gap-2 text-sm">
              <i class="fa-solid fa-phone text-[#E1B137] text-xs"></i>
              +234 906 925 8377
            </a>
            <a href="tel:+2348129050431" class="text-white/70 hover:text-white/90 transition-colors flex items-center gap-2 text-sm">
              <i class="fa-solid fa-phone text-[#E1B137] text-xs"></i>
              +234 812 905 0431
            </a>
            <a href="mailto:info@lekkiashram.com" class="text-white/70 hover:text-white/90 transition-colors flex items-center gap-2 text-sm">
              <i class="fa-solid fa-envelope text-[#E1B137] text-xs"></i>
              info@lekkiashram.com
            </a>
            <span class="text-white/70 flex items-center gap-2 text-sm">
              <i class="fa-solid fa-clock text-[#E1B137] text-xs"></i>
              Mon–Fri: 10AM–4PM
            </span>
          </div>
        </div>
      </div>
    </section>

    <!-- MODAL — Schedule Visit -->
    <Teleport to="body">
      <Transition name="modal">
        <div v-if="showModal"
          class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-[#0d1e26]/75 backdrop-blur-md"
          @click.self="closeModal">
          <div class="bg-white max-w-2xl w-full max-h-[90vh] overflow-hidden shadow-2xl">
            <div class="flex items-center justify-between px-6 md:px-7 py-4 md:py-5 border-b border-slate-100">
              <div class="flex items-center gap-4">
                <div class="w-9 h-9 bg-[#E1B137]/15 flex items-center justify-center">
                  <i class="fa-solid fa-calendar-check text-[#E1B137]"></i>
                </div>
                <div>
                  <h3 class="font-display text-base md:text-lg text-[#2b4b58]">Schedule Your Visit</h3>
                  <p class="text-xs text-slate-400">Experience the Ashram in person</p>
                </div>
              </div>
              <button @click="closeModal"
                class="w-9 h-9 flex items-center justify-center text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-colors">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>

            <div class="p-6 md:p-7 overflow-y-auto max-h-[calc(90vh-80px)]">
              <form @submit.prevent="submitForm" class="space-y-5">
                <div>
                  <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-3 font-display">Type of Visit *</label>
                  <div class="grid grid-cols-2 gap-3">
                    <button type="button" @click="form.visitType = 'meditation'"
                      class="p-4 border text-left transition-all duration-200"
                      :class="form.visitType === 'meditation' ? 'border-[#2b4b58] bg-[#2b4b58]/5' : 'border-slate-200 hover:border-slate-300'">
                      <i class="fa-solid fa-person-praying block text-lg mb-2" :class="form.visitType === 'meditation' ? 'text-[#2b4b58]' : 'text-slate-300'"></i>
                      <h4 class="font-display text-sm text-[#2b4b58]">Meditation Session</h4>
                      <p class="text-xs text-slate-400 mt-0.5">Group meditation & guidance</p>
                    </button>
                    <button type="button" @click="form.visitType = 'retreat'"
                      class="p-4 border text-left transition-all duration-200"
                      :class="form.visitType === 'retreat' ? 'border-[#E1B137] bg-[#E1B137]/5' : 'border-slate-200 hover:border-slate-300'">
                      <i class="fa-solid fa-person-walking block text-lg mb-2" :class="form.visitType === 'retreat' ? 'text-[#E1B137]' : 'text-slate-300'"></i>
                      <h4 class="font-display text-sm text-[#2b4b58]">Personal Retreat</h4>
                      <p class="text-xs text-slate-400 mt-0.5">1-on-1 spiritual guidance</p>
                    </button>
                  </div>
                  <p v-if="errors.visitType" class="text-red-500 text-xs mt-1">{{ errors.visitType }}</p>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                  <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Preferred Date *</label>
                    <input type="date" v-model="form.date" :min="minDate" required
                      class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors"
                      :class="errors.date ? 'border-red-400' : ''" />
                    <p v-if="errors.date" class="text-red-500 text-xs mt-1">{{ errors.date }}</p>
                  </div>
                  <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Preferred Time *</label>
                    <select v-model="form.time" required
                      class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors bg-white"
                      :class="errors.time ? 'border-red-400' : ''">
                      <option value="">Select a time</option>
                      <option value="09:00">9:00 AM – Morning</option>
                      <option value="11:00">11:00 AM – Midday</option>
                      <option value="14:00">2:00 PM – Afternoon</option>
                      <option value="16:00">4:00 PM – Evening</option>
                    </select>
                    <p v-if="errors.time" class="text-red-500 text-xs mt-1">{{ errors.time }}</p>
                  </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                  <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Full Name *</label>
                    <input type="text" v-model="form.name" placeholder="John Doe" required
                      class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors"
                      :class="errors.name ? 'border-red-400' : ''" />
                    <p v-if="errors.name" class="text-red-500 text-xs mt-1">{{ errors.name }}</p>
                  </div>
                  <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Email *</label>
                    <input type="email" v-model="form.email" placeholder="john@example.com" required
                      class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors"
                      :class="errors.email ? 'border-red-400' : ''" />
                    <p v-if="errors.email" class="text-red-500 text-xs mt-1">{{ errors.email }}</p>
                  </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                  <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Phone</label>
                    <input type="tel" v-model="form.phone" placeholder="+234 XXX XXX XXXX"
                      class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors" />
                  </div>
                  <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Guests</label>
                    <select v-model="form.guests"
                      class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors bg-white">
                      <option value="1">Just myself</option>
                      <option value="2">2 people</option>
                      <option value="3">3 people</option>
                      <option value="4">4 people</option>
                      <option value="5">5+ people</option>
                    </select>
                  </div>
                </div>

                <div>
                  <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Special Requests</label>
                  <textarea v-model="form.requests" rows="3" placeholder="Any specific requirements..."
                    class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors resize-none"></textarea>
                </div>

                <button type="submit" :disabled="isSubmitting"
                  class="w-full py-4 bg-[#E1B137] text-[#0d1e26] font-display font-bold text-[11px] uppercase tracking-[0.2em] hover:bg-[#2b4b58] hover:text-white transition-all duration-300 flex items-center justify-center gap-3 disabled:opacity-50 disabled:cursor-not-allowed">
                  <i class="fa-solid" :class="isSubmitting ? 'fa-spinner fa-spin' : 'fa-paper-plane'"></i>
                  {{ isSubmitting ? 'Sending...' : 'Request Visit' }}
                </button>

                <p class="text-xs text-slate-400 text-center">
                  We'll confirm within 24 hours · 
                  <a href="tel:+2349069258377" class="text-[#2b4b58] hover:underline whitespace-nowrap">
                    +234 906 925 8377
                  </a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </Transition>
    </Teleport>

    <!-- SLIDE-IN PANEL — Explore Our Path -->
    <Teleport to="body">
      <Transition name="fade">
        <div v-if="showPathPanel"
          class="fixed inset-0 z-50 bg-[#0d1e26]/75 backdrop-blur-md"
          @click.self="closePathPanel">
        </div>
      </Transition>
      <Transition name="path-panel">
        <div v-if="showPathPanel"
          class="fixed inset-y-0 right-0 z-50 w-full sm:w-[90%] md:w-[75%] lg:w-[55%] h-full overflow-y-auto bg-[#2b4b58] shadow-2xl">
          <div class="absolute inset-0 opacity-[0.04] pointer-events-none"
            style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 28px 28px;"></div>

          <div class="relative px-6 md:px-12 py-10 md:py-16">
            <div class="flex items-center justify-between mb-12 md:mb-16">
              <div class="flex items-center gap-3">
                <div class="w-8 h-px bg-[#E1B137]"></div>
                <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em] font-display">Our Foundation</span>
              </div>
              <button @click="closePathPanel"
                class="w-10 h-10 flex items-center justify-center text-white/60 hover:text-white hover:bg-white/10 transition-colors">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>

            <h2 class="font-display text-3xl md:text-5xl text-white mb-5">
              Explore <em class="not-italic text-[#E1B137]">Our Path</em>
            </h2>
            <p class="text-white/50 text-sm md:text-base leading-relaxed mb-12 md:mb-16 max-w-lg">
              Three principles that shape every step of the journey we walk together, from first visit to lasting transformation.
            </p>

            <div class="grid sm:grid-cols-1 gap-6">
              <div v-for="(p, i) in pathPrinciples" :key="i"
                class="group relative bg-white/5 border border-white/10 p-8 hover:border-[#E1B137]/50 hover:bg-white/8 transition-all duration-500 overflow-hidden">
                <div class="absolute bottom-0 left-0 h-0.5 w-0 bg-[#E1B137] group-hover:w-full transition-all duration-500"></div>
                <div class="w-14 h-14 flex items-center justify-center mb-6 border transition-all duration-300"
                  :class="i === 1 ? 'border-[#E1B137]/30 group-hover:border-[#E1B137] group-hover:bg-[#E1B137]/10' : 'border-white/15 group-hover:border-[#E1B137]/50'">
                  <i :class="[p.icon, 'text-xl transition-colors duration-300', i === 1 ? 'text-[#E1B137]' : 'text-white/60 group-hover:text-[#E1B137]']"></i>
                </div>
                <h3 class="font-display text-lg text-white mb-3 group-hover:text-[#E1B137] transition-colors duration-300">{{ p.title }}</h3>
                <p class="text-white/45 text-sm leading-relaxed group-hover:text-white/65 transition-colors duration-300">{{ p.description }}</p>
              </div>
            </div>

            <button @click="closePathPanel"
              class="mt-10 inline-flex items-center gap-3 border border-white/30 text-white px-8 py-4 font-display font-bold text-[11px] uppercase tracking-[0.2em] hover:border-[#E1B137] hover:text-[#E1B137] transition-all duration-300">
              Close
              <i class="fa-solid fa-xmark text-xs"></i>
            </button>
          </div>
        </div>
      </Transition>
    </Teleport>

  </main>
</template>

<script setup>
import { ref, reactive, computed, onMounted, onUnmounted } from 'vue'
import { Link, router } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { useToast } from '@/Composables/useToast'
import AOS from 'aos'
import 'aos/dist/aos.css'

defineOptions({ layout: GuestLayout })

const { showToast } = useToast()

// ── Parallax ──
const heroRef    = ref(null)
const ctaRef     = ref(null)
const statsRef   = ref(null)
const heroParallax = ref(0)
const ctaParallax  = ref(0)

const onScroll = () => {
  const scrolled = window.scrollY
  const windowHeight = window.innerHeight

  if (heroRef.value) {
    const heroTop = heroRef.value.offsetTop
    const heroHeight = heroRef.value.offsetHeight
    const scrollPastHero = Math.max(0, scrolled - heroTop)
    if (scrollPastHero <= heroHeight + windowHeight) {
      heroParallax.value = scrollPastHero * 0.35
    }
  }

  if (ctaRef.value) {
    const ctaTop = ctaRef.value.offsetTop
    const scrollPastCTA = Math.max(0, scrolled - ctaTop + windowHeight)
    if (scrollPastCTA <= ctaRef.value.offsetHeight + windowHeight) {
      ctaParallax.value = scrollPastCTA * 0.3
    }
  }
}

// ── Animated Stats ──
const stats = [
  { value: 15,  suffix: '+', label: 'Years of Service'  },
  { value: 100, suffix: '+', label: 'Retreats Conducted' },
  { value: 4,   suffix: '',  label: 'Trustees'           },
  { value: 4,   suffix: '',  label: 'Global Partners'    }
]

const animatedStats = ref(stats.map(() => 0))
const hasAnimated = ref(false)

const animateCount = (index, target, duration = 2000) => {
  const startTime = performance.now()
  const startValue = 0

  const step = (currentTime) => {
    const elapsed = currentTime - startTime
    const progress = Math.min(elapsed / duration, 1)
    const eased = 1 - Math.pow(1 - progress, 3)
    animatedStats.value[index] = Math.floor(eased * (target - startValue) + startValue)

    if (progress < 1) {
      requestAnimationFrame(step)
    } else {
      animatedStats.value[index] = target
    }
  }

  requestAnimationFrame(step)
}

const startStatsAnimation = () => {
  if (hasAnimated.value) return
  hasAnimated.value = true
  stats.forEach((stat, i) => {
    setTimeout(() => animateCount(i, stat.value), i * 150)
  })
}

const setupStatsObserver = () => {
  if (!statsRef.value) return

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        startStatsAnimation()
        observer.disconnect()
      }
    })
  }, { threshold: 0.3 })

  observer.observe(statsRef.value)
}

// ── Explore Our Path — slide-in panel ──
const showPathPanel = ref(false)

const openPathPanel = () => {
  showPathPanel.value = true
  document.body.style.overflow = 'hidden'
}

const closePathPanel = () => {
  showPathPanel.value = false
  document.body.style.overflow = ''
}

const pathPrinciples = [
  { icon: 'fa-solid fa-infinity', title: 'Non-Dual Awareness',    description: 'A journey that begins by recognizing the indivisible nature of existence, where self and world are expressions of one unified reality.' },
  { icon: 'fa-solid fa-eye',      title: 'Conscious Inquiry',     description: 'Each step forward is guided by disciplined reflection, philosophical study, and courageous questioning.' },
  { icon: 'fa-solid fa-seedling', title: 'Ecological Compassion', description: 'The path unfolds through unity, nurturing humanity and nature as sacred dimensions of one evolving consciousness.' }
]

// ── Modal ──
const showModal    = ref(false)
const isSubmitting = ref(false)
const errors = ref({})

const form = reactive({
  visitType: 'meditation',
  date: '',
  time: '',
  name: '',
  email: '',
  phone: '',
  guests: '1',
  requests: ''
})

const minDate = computed(() => {
  const d = new Date()
  return `${d.getFullYear()}-${String(d.getMonth()+1).padStart(2,'0')}-${String(d.getDate()).padStart(2,'0')}`
})

const whatsappMsg = `Hello, I'm interested in visiting The Lekki Ashram. Please help me schedule a visit. Thank you!`

const openModal  = () => {
  showModal.value = true
  document.body.style.overflow = 'hidden'
}

const closeModal = () => {
  showModal.value = false
  document.body.style.overflow = ''
}

const submitForm = () => {
  const requiredFields = ['visitType', 'date', 'time', 'name', 'email']
  const newErrors = {}

  requiredFields.forEach(field => {
    if (!form[field]) {
      newErrors[field] = `${field.charAt(0).toUpperCase() + field.slice(1)} is required`
    }
  })

  if (Object.keys(newErrors).length > 0) {
    errors.value = newErrors
    showToast('Please fill in all required fields.', 'error')
    return
  }

  errors.value = {}
  isSubmitting.value = true

  const timeoutId = setTimeout(() => {
    if (isSubmitting.value) {
      isSubmitting.value = false
      showToast('Request timed out. Please try again.', 'error')
    }
  }, 30000)

  router.post('/visit-requests', form, {
    preserveState: true,
    preserveScroll: true,
    onSuccess: (page) => {
      clearTimeout(timeoutId)
      isSubmitting.value = false

      if (page.props.flash?.success) {
        showToast(page.props.flash.success, 'success')
      } else {
        showToast('Your visit request has been sent. We\'ll confirm within 24 hours.', 'success')
      }

      setTimeout(() => {
        closeModal()
        Object.assign(form, {
          visitType: 'meditation',
          date: '',
          time: '',
          name: '',
          email: '',
          phone: '',
          guests: '1',
          requests: ''
        })
      }, 2000)
    },
    onError: (err) => {
      clearTimeout(timeoutId)
      isSubmitting.value = false
      errors.value = err

      if (err.email) {
        showToast(err.email, 'error')
      } else if (err.name) {
        showToast(err.name, 'error')
      } else if (err.date) {
        showToast(err.date, 'error')
      } else if (err.time) {
        showToast(err.time, 'error')
      } else {
        showToast('Please check your form and try again.', 'error')
      }
    },
    onFinish: () => {
      clearTimeout(timeoutId)
      isSubmitting.value = false
    }
  })
}

// ── Static Data ──
const contributions = [
  'Founded The Art of Living Center, Lekki - Nigeria in the late 2018',
  'Led scores of both private and public meditation retreats.',
]

const trustees = [
  {
    name: 'Mrs. Julie Ann Van-Vleck',
    bio: 'A spiritual seeker and notary public with over two decades in corporate governance. She has dedicated 20+ years to counseling, awakening, and consciousness studies, guiding seekers to unique self-realization experiences.',
    image: '/img/trustees/Julie Ann.png',
  },
  {
    name: 'Prof. Habeeb Abiodun Sanni',
    bio: 'Habeeb Abiodun Sanni holds a Bachelor of Arts (Hons), a master\'s degree in history and diplomacy from Lagos University, Ojo, Lagos, in 1988 and 1996, respectively, and a Ph.D. from the Ibadan School of History, University of Ibadan, in 2016. He has made significant contributions to both academic and community services, with over 38 peer-reviewed articles in local and international journals and books to his credit. He has also served in different capacities within the university and Lagos State. He was a member of the Commission of Inquiry into the Oloja Chieftaincy family dispute in 2006. He was also a member of the Lagos State Historical Committee sent to the National Archives, Kew Gardens, London in 2013, to retrieve historical documents on Lagos history. He also served in various capacities at the Lagos State University, Ojo; he was a two-term Assistant Director at the Centre for General Nigerian Studies from 2017 to 2021 and Director of the Directorate of Skills Development and Entrepreneurship from 2022 to date. He is a member of several academic and professional associations, including the Historical Society of Nigeria, the African Studies Association of the United Kingdom, the Royal African Society of the U.K., the Lagos Studies Association, Friends of the National Archives, U.K., and the African Studies Association of the United States of America. He is also a member of the prestigious Eko Club. He is married and blessed with children.',
    image: '/img/trustees/Habeeb Sanni.jpg',
  },
  {
    name: 'Dr. Narendra Nath Datta',
    bio: 'Fondly called Dr. D, he is a devout Hindu and saint-like figure. He has dedicated over 50 years to yoga, psychology, farming, neurosurgery, Advaita Vedanta, and classical philosophy.',
    image: '/img/trustees/Narendra Datta.png',
  },
]

// ── Bio expansion state ──
const expandedBio = ref(trustees.map(() => false))

const toggleBio = (index) => {
  expandedBio.value[index] = !expandedBio.value[index]
}

// ── Lifecycle ──
const handleEscape = (e) => {
  if (e.key === 'Escape' && showPathPanel.value) {
    closePathPanel()
  }
}

onMounted(() => {
  AOS.init({ duration: 800, once: true, offset: 50, easing: 'ease-out' })
  window.addEventListener('scroll', onScroll, { passive: true })
  document.addEventListener('keydown', handleEscape)
  onScroll()

  setTimeout(() => {
    setupStatsObserver()
  }, 100)
})

onUnmounted(() => {
  window.removeEventListener('scroll', onScroll)
  document.removeEventListener('keydown', handleEscape)
  document.body.style.overflow = ''
})
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap');

.font-display { font-family: 'Playfair Display', Georgia, serif; }
.font-body    { font-family: 'Montserrat', sans-serif; }

@keyframes heroUp {
  from { opacity: 0; transform: translateY(28px); }
  to   { opacity: 1; transform: translateY(0); }
}
.hero-item {
  opacity: 0;
  animation: heroUp 0.9s cubic-bezier(0.22, 1, 0.36, 1) forwards;
}

@keyframes pulseSlow {
  0%, 100% { opacity: 0.25; }
  50%       { opacity: 0.6;  }
}
.animate-pulse-slow { animation: pulseSlow 2.5s ease-in-out infinite; }

.will-change-transform { will-change: transform; }

.modal-enter-active,
.modal-leave-active {
  transition: opacity 0.3s ease;
}
.modal-enter-from,
.modal-leave-to {
  opacity: 0;
}

.parallax-layer {
  transition: transform 0.1s ease-out;
}

.path-panel-enter-active,
.path-panel-leave-active {
  transition: transform 0.45s cubic-bezier(0.22, 1, 0.36, 1);
}
.path-panel-enter-from,
.path-panel-leave-to {
  transform: translateX(100%);
}
</style>