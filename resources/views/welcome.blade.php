@extends('layouts.app')

@section('title', app()->getLocale() === 'ar' ? 'رويال سيكيوريتي | قطاع غزة' : 'Royal Security | Gaza Strip')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section relative h-screen bg-cover bg-center flex items-center justify-center text-center"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)), url('{{ asset('/img/9.jpg') }}');" 
        data-aos="fade-in"
        data-aos-duration="1000"
        role="banner"
        aria-labelledby="hero-title">
        
        <div class="container max-w-6xl px-6 text-white relative z-10">
            <!-- Company Badge -->
            <section class="relative pt-24">
                <span class="hero-badge inline-block uppercase tracking-widest text-yellow-400 text-sm font-semibold mb-4 px-4 py-2 border border-yellow-400 rounded-full backdrop-blur-sm bg-black/20" 
                    data-aos="fade-up" data-aos-delay="200">
                    {{ app()->getLocale() === 'ar' ? 'رويال سيكيوريتي' : 'Royal Security' }}
                </span>
            </section>            
            
            <!-- Main Heading -->
            <h1 id="hero-title" class="hero-title text-4xl md:text-6xl lg:text-7xl font-extrabold mb-6 leading-tight bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent" 
                data-aos="fade-up" data-aos-delay="400">
                {{ app()->getLocale() === 'ar' ? 'حلول أمنية متميزة للمؤسسات الدولية' : 'Premier Security Solutions for International Institutions' }}
            </h1>
            
            <!-- Hero Description -->
            <p class="hero-description text-lg md:text-xl mb-10 max-w-3xl mx-auto leading-relaxed text-gray-100" 
                data-aos="fade-up" data-aos-delay="600">
                {{ app()->getLocale() === 'ar' ? 'موثوق به من قبل الشركاء العالميين مع أكثر من 250 من أفراد الأمن المدربين تدريباً عالياً في قطاع غزة.' : 'Trusted by global partners with over 250 highly trained security personnel in the Gaza Strip.' }}
            </p>

            <!-- CTA Buttons -->
            <div class="hero-cta flex flex-col sm:flex-row justify-center items-center gap-6 mb-8"
                data-aos="fade-up" data-aos-delay="800">
                <!-- Primary CTA -->
                <a href="{{ route('contact') }}"
                    class="btn-primary group relative inline-flex items-center justify-center bg-gradient-to-r from-yellow-400 to-amber-500 hover:from-amber-500 hover:to-yellow-400 text-gray-900 font-semibold px-8 py-4 rounded-full transition-all duration-300 transform hover:scale-105 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-yellow-400/50"
                    aria-label="{{ app()->getLocale() === 'ar' ? 'تواصلوا معنا' : 'Get in Touch' }}">
                    <span class="relative z-10">{{ app()->getLocale() === 'ar' ? 'تواصلوا معنا' : 'Get in Touch' }}</span>
                    <svg class="w-5 h-5 {{ app()->getLocale() === 'ar' ? 'mr-2 group-hover:-translate-x-1' : 'ml-2 group-hover:translate-x-1' }} transition-transform duration-300" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="{{ app()->getLocale() === 'ar' ? 'M10 19l-7-7m0 0l7-7m-7 7h18' : 'M14 5l7 7m0 0l-7 7m7-7H3' }}"></path>
                    </svg>
                </a>

                <!-- Admin Panel Button -->
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="admin-btn group flex items-center justify-center w-14 h-14 bg-white/10 backdrop-blur-sm hover:bg-yellow-400 text-yellow-400 hover:text-gray-900 rounded-full shadow-lg transition-all duration-300 transform hover:scale-110 focus:outline-none focus:ring-4 focus:ring-yellow-400/50"
                        title="{{ app()->getLocale() === 'ar' ? 'لوحة الإدارة' : 'Admin Panel' }}"
                        aria-label="{{ app()->getLocale() === 'ar' ? 'لوحة الإدارة' : 'Admin Panel' }}">
                        <svg class="w-6 h-6 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="admin-btn group flex items-center justify-center w-14 h-14 bg-white/10 backdrop-blur-sm hover:bg-yellow-400 text-yellow-400 hover:text-gray-900 rounded-full shadow-lg transition-all duration-300 transform hover:scale-110 focus:outline-none focus:ring-4 focus:ring-yellow-400/50"
                        title="{{ app()->getLocale() === 'ar' ? 'تسجيل الدخول' : 'Login' }}"
                        aria-label="{{ app()->getLocale() === 'ar' ? 'تسجيل الدخول' : 'Login' }}">
                        <svg class="w-6 h-6 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                    </a>
                @endauth
            </div>

            <!-- Hero Stats -->
            <div class="hero-stats grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-2xl mx-auto text-center" 
                data-aos="fade-up" data-aos-delay="1000">
                <div class="stat-item backdrop-blur-sm bg-white/10 rounded-lg p-4">
                    <div class="text-2xl font-bold text-yellow-400">250+</div>
                    <div class="text-sm text-gray-300">{{ app()->getLocale() === 'ar' ? 'موظف أمني' : 'Security Personnel' }}</div>
                </div>
                <div class="stat-item backdrop-blur-sm bg-white/10 rounded-lg p-4">
                    <div class="text-2xl font-bold text-yellow-400">15+</div>
                    <div class="text-sm text-gray-300">{{ app()->getLocale() === 'ar' ? 'سنة خبرة' : 'Years Experience' }}</div>
                </div>
                <div class="stat-item backdrop-blur-sm bg-white/10 rounded-lg p-4">
                    <div class="text-2xl font-bold text-yellow-400">24/7</div>
                    <div class="text-sm text-gray-300">{{ app()->getLocale() === 'ar' ? 'دعم متواصل' : 'Support' }}</div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce" 
            data-aos="fade-up" data-aos-delay="1200">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- Services Overview -->
    <section class="services-overview py-24 bg-gradient-to-b from-white to-gray-50 overflow-hidden">
        <div class="container max-w-7xl mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-20" data-aos="fade-up" data-aos-duration="800">
                <span class="section-badge inline-block text-yellow-600 bg-yellow-50 px-4 py-2 rounded-full text-sm font-medium mb-4">
                    {{ app()->getLocale() === 'ar' ? 'خدماتنا' : 'Our Services' }}
                </span>
                <h2 class="section-title text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    {{ app()->getLocale() === 'ar' ? 'نقاط قوتنا الأساسية' : 'Our Core Strengths' }}
                </h2>
                <p class="section-description text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">
                    {{ app()->getLocale() === 'ar' ? 'تقديم خدمات أمنية استثنائية بخبرة وابتكار لا مثيل لهما لحماية ما يهمك أكثر.' : 'Delivering exceptional security services with unmatched expertise and innovation to protect what matters most to you.' }}
                </p>
            </div>

            <!-- Services Grid -->
            <div class="services-grid grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($services as $index => $service)
                    <article class="service-card group bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl border border-gray-100 transition-all duration-300 hover:-translate-y-1" 
                        data-aos="fade-up" 
                        data-aos-delay="{{ 100 + ($index * 100) }}"
                        data-aos-duration="600">
                        
                        <!-- Service Icon -->
                        <div class="service-icon mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-amber-500 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform duration-300">
                                <i class="{{ $service->icon ?? 'fas fa-shield-alt' }} text-2xl text-white"></i>
                            </div>
                        </div>

                        <!-- Service Content -->
                        <div class="service-content">
                            <h3 class="service-title text-xl font-bold mb-4 text-gray-900 group-hover:text-yellow-600 transition-colors duration-300">
                                {{ $service->{'title_' . app()->getLocale()} }}
                            </h3>
                            <p class="service-description text-gray-600 mb-6 leading-relaxed">
                                {{ Str::limit($service->{'description_' . app()->getLocale()}, 120) }}
                            </p>
                            <a href="{{ route('services') }}" 
                                class="service-link inline-flex items-center text-yellow-600 hover:text-yellow-700 font-medium transition-colors duration-300 group/link"
                                aria-label="{{ app()->getLocale() === 'ar' ? 'تعرف على المزيد حول' : 'Learn more about' }} {{ $service->{'title_' . app()->getLocale()} }}">
                                <span>{{ app()->getLocale() === 'ar' ? 'تعرف على المزيد' : 'Learn More' }}</span>
                                <svg class="w-4 h-4 {{ app()->getLocale() === 'ar' ? 'mr-2 group-hover/link:-translate-x-1' : 'ml-2 group-hover/link:translate-x-1' }} transition-transform duration-300" 
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="{{ app()->getLocale() === 'ar' ? 'M10 19l-7-7m0 0l7-7m-7 7h18' : 'M14 5l7 7m0 0l-7 7m7-7H3' }}"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center py-16">
                        <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-medium text-gray-900 mb-2">{{ app()->getLocale() === 'ar' ? 'لا توجد خدمات متاحة' : 'No Services Available' }}</h3>
                        <p class="text-gray-500">{{ app()->getLocale() === 'ar' ? 'سيتم إضافة الخدمات قريباً.' : 'Services will be added soon.' }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section py-24 bg-white overflow-hidden">
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                
                <!-- Image Column -->
                <div class="about-image relative order-2 lg:order-1" data-aos="fade-right" data-aos-duration="800">
                    <div class="relative">
                        @php $about = \App\Models\About::first(); @endphp
                        
                        <!-- Main Image -->
                        <div class="relative z-10 rounded-3xl overflow-hidden shadow-2xl group">
                            <img src="{{ $about && $about->image ? asset('storage/' . $about->image) : asset('img/about.png') }}"
                                alt="{{ $about ? $about->{'title_' . app()->getLocale()} : 'Royal Security Company' }}"
                                class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-105"
                                loading="lazy">
                        </div>

                        <!-- Experience Badge -->
                        <div class="absolute -bottom-8 -right-8 bg-white rounded-2xl shadow-2xl p-6 text-center z-20 border-4 border-yellow-100" 
                            data-aos="fade-up" data-aos-delay="300">
                            <div class="text-4xl font-bold bg-gradient-to-r from-yellow-500 to-amber-600 bg-clip-text text-transparent mb-1">15+</div>
                            <div class="text-sm font-semibold text-gray-600 uppercase tracking-wide">
                                {{ app()->getLocale() === 'ar' ? 'سنة خبرة' : 'Years Experience' }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="about-content order-1 lg:order-2" data-aos="fade-left" data-aos-delay="200" data-aos-duration="800">
                    
                    <!-- Section Badge -->
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-yellow-50 text-yellow-700 text-sm font-semibold mb-6">
                        <svg class="w-5 h-5 {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h2a1 1 0 100-2h-2V9z" clip-rule="evenodd" />
                        </svg>
                        {{ app()->getLocale() === 'ar' ? 'من نحن' : 'About Us' }}
                    </div>

                    <!-- Main Heading -->
                    <h2 class="text-4xl md:text-5xl font-bold mb-8 text-gray-900 leading-tight">
                        {{ $about ? $about->{'title_' . app()->getLocale()} : (app()->getLocale() === 'ar' ? 'شركة رائدة في مجال الأمن والسلامة' : 'Leading Security & Safety Company') }}
                    </h2>

                    <!-- Description -->
                    <div class="prose max-w-none text-gray-600 text-lg mb-10 leading-relaxed">
                        @if ($about)
                            {!! nl2br(e($about->{'description_' . app()->getLocale()})) !!}
                        @else
                            <p>
                                {{ app()->getLocale() === 'ar'
                                    ? 'نحن شركة رائدة في مجال الخدمات الأمنية، نقدم حلولاً متكاملة لحماية الأفراد والممتلكات بأعلى معايير الجودة والكفاءة. مع فريق من الخبراء المتخصصين والتقنيات المتطورة، نضمن توفير بيئة آمنة ومحمية لعملائنا.'
                                    : 'We are a leading security services company, providing integrated solutions to protect individuals and property with the highest standards of quality and efficiency. With a team of specialized experts and advanced technologies, we ensure a safe and secure environment for our clients.' }}
                            </p>
                        @endif
                    </div>

                    <!-- Features List -->
                    <div class="features-list space-y-6 mb-12">
                        @if ($about && $about->features)
                            @foreach ($about->features as $index => $feature)
                                <div class="flex items-start group" data-aos="fade-up" data-aos-delay="{{ 300 + ($index * 100) }}">
                                    <div class="flex-shrink-0 {{ app()->getLocale() === 'ar' ? 'ml-4' : 'mr-4' }} mt-1">
                                        <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-yellow-100 to-amber-100 text-yellow-600 group-hover:scale-105 transition-transform duration-300">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-yellow-600 transition-colors duration-300">
                                            {{ $feature['feature_' . app()->getLocale()] }}
                                        </h4>
                                        @if(isset($feature['description_' . app()->getLocale()]))
                                            <p class="text-gray-600 leading-relaxed">
                                                {{ $feature['description_' . app()->getLocale()] }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- Default Features -->
                            @php
                                $defaultFeatures = [
                                    [
                                        'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                                        'title_ar' => 'فريق محترف',
                                        'title_en' => 'Professional Team',
                                        'desc_ar' => 'خبراء أمنيون مدربون بأعلى المعايير الدولية',
                                        'desc_en' => 'Security experts trained to the highest international standards'
                                    ],
                                    [
                                        'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                                        'title_ar' => 'تكنولوجيا متطورة',
                                        'title_en' => 'Advanced Technology',
                                        'desc_ar' => 'أحدث الأنظمة والتقنيات في مجال المراقبة والأمن',
                                        'desc_en' => 'Latest surveillance and security systems technology'
                                    ],
                                    [
                                        'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                                        'title_ar' => 'حلول مخصصة',
                                        'title_en' => 'Custom Solutions',
                                        'desc_ar' => 'تصميم حلول أمنية تلبي احتياجاتك الخاصة',
                                        'desc_en' => 'Tailored security solutions for your specific needs'
                                    ]
                                ];
                            @endphp
                            
                            @foreach($defaultFeatures as $index => $feature)
                                <div class="flex items-start group" data-aos="fade-up" data-aos-delay="{{ 300 + ($index * 100) }}">
                                    <div class="flex-shrink-0 {{ app()->getLocale() === 'ar' ? 'ml-4' : 'mr-4' }} mt-1">
                                        <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-yellow-100 to-amber-100 text-yellow-600 group-hover:scale-105 transition-transform duration-300">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature['icon'] }}" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-yellow-600 transition-colors duration-300">
                                            {{ $feature['title_' . app()->getLocale()] }}
                                        </h4>
                                        <p class="text-gray-600 leading-relaxed">
                                            {{ $feature['desc_' . app()->getLocale()] }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- CTA Button -->
                    <div class="mt-12">
                        @if ($about && $about->cta_link)
                            <a href="{{ $about->cta_link }}"
                                class="btn-primary group inline-flex items-center justify-center bg-gradient-to-r from-yellow-400 to-amber-500 hover:from-amber-500 hover:to-yellow-400 text-gray-900 font-bold px-10 py-5 rounded-full text-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-yellow-400/50">
                                <span>{{ $about->{'cta_text_' . app()->getLocale()} }}</span>
                                <svg class="w-6 h-6 {{ app()->getLocale() === 'ar' ? 'mr-3 group-hover:-translate-x-1' : 'ml-3 group-hover:translate-x-1' }} transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ app()->getLocale() === 'ar' ? 'M10 19l-7-7m0 0l7-7m-7 7h18' : 'M14 5l7 7m0 0l-7 7m7-7H3' }}"></path>
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('about') }}"
                                class="btn-primary group inline-flex items-center justify-center bg-gradient-to-r from-yellow-400 to-amber-500 hover:from-amber-500 hover:to-yellow-400 text-gray-900 font-bold px-10 py-5 rounded-full text-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-yellow-400/50">
                                <span>{{ app()->getLocale() === 'ar' ? 'اقرأ المزيد' : 'Read More' }}</span>
                                <svg class="w-6 h-6 {{ app()->getLocale() === 'ar' ? 'mr-3 group-hover:-translate-x-1' : 'ml-3 group-hover:translate-x-1' }} transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ app()->getLocale() === 'ar' ? 'M10 19l-7-7m0 0l7-7m-7 7h18' : 'M14 5l7 7m0 0l-7 7m7-7H3' }}"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section py-24 bg-gradient-to-b from-gray-50 to-white overflow-hidden">
        <div class="container max-w-7xl mx-auto px-4">
            
            <!-- Section Header -->
            <div class="text-center mb-20" data-aos="fade-up" data-aos-duration="800">
                <span class="section-badge inline-block text-blue-600 bg-blue-50 px-4 py-2 rounded-full text-sm font-medium mb-4">
                    {{ app()->getLocale() === 'ar' ? 'التوصيات' : 'Testimonials' }}
                </span>
                <h2 class="section-title text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    {{ app()->getLocale() === 'ar' ? 'ماذا يقول عملاؤنا' : 'What Our Clients Say' }}
                </h2>
                <p class="section-description text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">
                    {{ app()->getLocale() === 'ar' ? 'موثوق به من قبل المؤسسات الدولية، تعكس تعليقات عملائنا التزامنا بالتميز والجودة في تقديم الخدمات الأمنية.' : 'Trusted by international institutions, our clients\' feedback reflects our unwavering commitment to excellence and quality in security services.' }}
                </p>
            </div>

            <!-- Testimonials Grid -->
            @php $testimonials = \App\Models\Testimonial::all(); @endphp
            @if($testimonials->count() > 0)
                <div class="testimonials-grid grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($testimonials as $index => $testimonial)
                        <article class="testimonial-card group bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl border border-gray-100 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full" 
                            data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 100) }}" data-aos-duration="600">
                            
                            <!-- Quote Icon -->
                            <div class="quote-icon absolute top-6 {{ app()->getLocale() === 'ar' ? 'left-6' : 'right-6' }} w-12 h-12 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full flex items-center justify-center opacity-60 group-hover:opacity-100 transition-opacity duration-300">
                                <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                </svg>
                            </div>

                            <!-- Client Avatar -->
                            <div class="client-avatar text-center mb-6">
                                @if ($testimonial->image_url)
                                    <div class="w-20 h-20 mx-auto rounded-full overflow-hidden border-4 border-gray-100 shadow-lg group-hover:border-blue-200 transition-colors duration-300">
                                        <img src="{{ $testimonial->image_url }}"
                                            alt="{{ app()->getLocale() === 'ar' ? $testimonial->name_ar : $testimonial->name_en }}"
                                            class="w-full h-full object-cover"
                                            loading="lazy">
                                    </div>
                                @else
                                    <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center shadow-lg group-hover:from-blue-100 group-hover:to-indigo-100 transition-all duration-300">
                                        <svg class="w-10 h-10 text-gray-500 group-hover:text-blue-500 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <!-- Rating -->
                            <div class="rating flex justify-center mb-6">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= ($testimonial->rating ?? 5) ? 'text-yellow-400' : 'text-gray-300' }} transition-colors duration-300" 
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>

                            <!-- Testimonial Content -->
                            <div class="testimonial-content flex-grow">
                                <blockquote class="text-gray-700 text-lg italic leading-relaxed text-center group-hover:text-gray-900 transition-colors duration-300">
                                    "{{ app()->getLocale() === 'ar' ? $testimonial->content_ar : $testimonial->content_en }}"
                                </blockquote>
                            </div>

                            <!-- Client Info -->
                            <div class="client-info text-center mt-8 pt-6 border-t border-gray-100">
                                <h4 class="client-name text-xl font-bold text-gray-900 mb-1 group-hover:text-blue-600 transition-colors duration-300">
                                    {{ app()->getLocale() === 'ar' ? $testimonial->name_ar : $testimonial->name_en }}
                                </h4>
                                <p class="client-position text-gray-500 font-medium">
                                    {{ app()->getLocale() === 'ar' ? $testimonial->position_ar : $testimonial->position_en }}
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">{{ app()->getLocale() === 'ar' ? 'لا توجد توصيات متاحة' : 'No Testimonials Available' }}</h3>
                    <p class="text-gray-500">{{ app()->getLocale() === 'ar' ? 'سيتم إضافة توصيات العملاء قريباً.' : 'Client testimonials will be added soon.' }}</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Services Grid -->
    <section class="services-grid-section py-24 bg-white overflow-hidden">
        <div class="container max-w-7xl mx-auto px-4">
            
            <!-- Section Header -->
            <div class="text-center mb-20" data-aos="fade-up" data-aos-duration="800">
                <span class="section-badge inline-block text-green-600 bg-green-50 px-4 py-2 rounded-full text-sm font-medium mb-4">
                    {{ app()->getLocale() === 'ar' ? 'الخدمات' : 'Services' }}
                </span>
                <h2 class="section-title text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    {{ app()->getLocale() === 'ar' ? 'خدماتنا الشاملة' : 'Our Comprehensive Services' }}
                </h2>
                <p class="section-description text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">
                    {{ app()->getLocale() === 'ar' ? 'نقدم مجموعة متكاملة من الحلول الأمنية المصممة خصيصاً لتلبية احتياجات مختلف القطاعات والمؤسسات.' : 'We offer a comprehensive range of security solutions specifically designed to meet the needs of various sectors and institutions.' }}
                </p>
            </div>

            <!-- Services Grid -->
            @php $allServices = \App\Models\Service::all(); @endphp
            @if($allServices->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($allServices as $index => $service)
                        <article class="service-item group bg-gradient-to-br from-gray-50 to-white p-8 rounded-2xl shadow-lg hover:shadow-xl border border-gray-100 transition-all duration-300 hover:-translate-y-1" 
                            data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 100) }}" data-aos-duration="600">
                            
                            <!-- Service Icon -->
                            <div class="service-icon mb-6">
                                <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-emerald-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform duration-300">
                                    <i class="{{ $service->icon ?? 'fas fa-shield-alt' }} text-2xl text-white"></i>
                                </div>
                            </div>

                            <!-- Service Content -->
                            <div class="service-content">
                                <h3 class="service-title text-xl font-bold mb-4 text-gray-900 group-hover:text-green-600 transition-colors duration-300">
                                    {{ app()->getLocale() === 'ar' ? $service->title_ar : $service->title_en }}
                                </h3>
                                <p class="service-description text-gray-600 leading-relaxed group-hover:text-gray-700 transition-colors duration-300">
                                    {{ app()->getLocale() === 'ar' ? $service->description_ar : $service->description_en }}
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">{{ app()->getLocale() === 'ar' ? 'لا توجد خدمات متاحة' : 'No Services Available' }}</h3>
                    <p class="text-gray-500">{{ app()->getLocale() === 'ar' ? 'سيتم إضافة الخدمات قريباً.' : 'Services will be added soon.' }}</p>
                </div>
            @endif

            <!-- View All Services CTA -->
            @if($allServices->count() > 6)
                <div class="text-center mt-16">
                    <a href="{{ route('services') }}" 
                        class="btn-secondary group inline-flex items-center justify-center bg-white border-2 border-green-500 hover:bg-green-500 text-green-500 hover:text-white font-semibold px-8 py-4 rounded-full transition-all duration-300 transform hover:scale-105 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-green-400/50">
                        <span>{{ app()->getLocale() === 'ar' ? 'عرض جميع الخدمات' : 'View All Services' }}</span>
                        <svg class="w-5 h-5 {{ app()->getLocale() === 'ar' ? 'mr-2 group-hover:-translate-x-1' : 'ml-2 group-hover:translate-x-1' }} transition-transform duration-300" 
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="{{ app()->getLocale() === 'ar' ? 'M10 19l-7-7m0 0l7-7m-7 7h18' : 'M14 5l7 7m0 0l-7 7m7-7H3' }}"></path>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('styles')
<style>
    /* Fixed viewport and overflow issues */
    html, body {
        width: 100%;
        overflow-x: hidden;
    }

    /* Hero Section - Simplified and fixed */
    .hero-section {
        min-height: 100vh;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        width: 100vw;
        max-width: 100%;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.4) 50%, rgba(0, 0, 0, 0.6) 100%);
        z-index: 1;
    }

    /* Container fixes */
    .container {
        width: 100%;
        max-width: 1280px;
        margin: 0 auto;
        padding-left: 1rem;
        padding-right: 1rem;
    }

    /* Prevent horizontal overflow */
    * {
        box-sizing: border-box;
    }

    .section {
        width: 100%;
        max-width: 100vw;
        overflow-x: hidden;
    }

    /* Simplified animations and transitions */
    .service-card,
    .testimonial-card,
    .service-item {
        will-change: transform;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .service-card:hover,
    .testimonial-card:hover,
    .service-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    /* Button improvements */
    .btn-primary,
    .btn-secondary {
        position: relative;
        transition: all 0.3s ease;
    }

    .btn-primary:hover,
    .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    /* Remove excessive decorative elements that cause overflow */
    .service-card::after,
    .testimonial-card::after,
    .service-item::after {
        display: none;
    }

    /* Mobile optimizations */
    @media (max-width: 768px) {
        .hero-section {
            min-height: 100dvh;
        }
        
        .hero-title {
            font-size: 2.5rem;
            line-height: 1.2;
        }
        
        .section-title {
            font-size: 2rem;
        }
        
        .service-card,
        .testimonial-card,
        .service-item {
            padding: 1.5rem;
        }
        
        .container {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    }

    /* Reduced motion preferences */
    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
            scroll-behavior: auto !important;
        }
        
        .hero-section {
            background-attachment: scroll;
        }
    }

    /* Grid improvements to prevent overflow */
    .grid {
        width: 100%;
        margin: 0;
    }

    .services-grid,
    .testimonials-grid {
        gap: 2rem;
        width: 100%;
    }

    /* Improved responsive design */
    @media (min-width: 768px) {
        .md\:grid-cols-2 {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 1024px) {
        .lg\:grid-cols-3 {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    /* Fix testimonial card positioning */
    .testimonial-card {
        position: relative;
    }

    .quote-icon {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
    }

    [dir="rtl"] .quote-icon {
        right: auto;
        left: 1.5rem;
    }

    /* Print styles */
    @media print {
        .hero-section {
            background: #f3f4f6;
            color: #1f2937;
            min-height: auto;
        }
        
        .admin-btn,
        .scroll-indicator {
            display: none;
        }
        
        .service-card,
        .testimonial-card,
        .service-item {
            break-inside: avoid;
            box-shadow: none;
            border: 1px solid #e5e7eb;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Simplified and optimized JavaScript
    document.addEventListener('DOMContentLoaded', function() {
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Simple loading states for buttons
        const buttons = document.querySelectorAll('.btn-primary, .btn-secondary');
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                if (!this.disabled && this.href) {
                    const originalText = this.innerHTML;
                    this.style.opacity = '0.8';
                    this.disabled = true;
                    
                    // Re-enable after short delay (in case navigation fails)
                    setTimeout(() => {
                        this.innerHTML = originalText;
                        this.style.opacity = '1';
                        this.disabled = false;
                    }, 2000);
                }
            });
        });
        
        // Lazy load images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                        }
                        img.classList.remove('lazy');
                        observer.unobserve(img);
                    }
                });
            });
            
            document.querySelectorAll('img[loading="lazy"]').forEach(img => {
                imageObserver.observe(img);
            });
        }
        
        // Prevent horizontal scroll issues
        function preventHorizontalScroll() {
            const body = document.body;
            const html = document.documentElement;
            
            const scrollWidth = Math.max(body.scrollWidth, body.offsetWidth, 
                                       html.clientWidth, html.scrollWidth, html.offsetWidth);
            
            if (scrollWidth > window.innerWidth) {
                document.querySelectorAll('*').forEach(el => {
                    const rect = el.getBoundingClientRect();
                    if (rect.right > window.innerWidth) {
                        console.warn('Element causing horizontal overflow:', el);
                    }
                });
            }
        }
        
        // Check for overflow on load and resize
        preventHorizontalScroll();
        window.addEventListener('resize', preventHorizontalScroll);
    });
</script>
@endpush