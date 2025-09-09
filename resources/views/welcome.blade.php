@extends('layouts.app')

@section('title', app()->getLocale() === 'ar' ? 'رويال سيكيوريتي | قطاع غزة' : 'Royal Security | Gaza Strip')

@section('content')
    <!-- Hero Section (Static) -->
    <section class="h-screen bg-cover bg-center flex items-center justify-center text-center hero-overlay"
        style="background-image: url('{{ asset('/img/9.jpg') }}');" data-aos="zoom-out">
        <div class="max-w-4xl px-6 text-white">
            <span class="uppercase tracking-widest text-yellow-400 text-sm font-semibold" data-aos="fade-up">
                {{ app()->getLocale() === 'ar' ? 'رويال سيكيوريتي' : 'Royal Security' }}
            </span>
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 leading-tight" data-aos="fade-right">
                {{ app()->getLocale() === 'ar' ? 'حلول أمنية متميزة للمؤسسات الدولية' : 'Premier Security Solutions for International Institutions' }}
            </h1>
            <p class="text-lg md:text-xl mb-8 max-w-2xl mx-auto" data-aos="fade-left">
                {{ app()->getLocale() === 'ar' ? 'موثوق به من قبل الشركاء العالميين مع أكثر من 250 من أفراد الأمن المدربين تدريباً عالياً في قطاع غزة.' : 'Trusted by global partners with over 250 highly trained security personnel in the Gaza Strip.' }}
            </p>

            <div class="mt-6 flex justify-center items-center gap-4">
                <!-- زر التواصل -->
                <a href="{{ route('contact') }}"
                    class="btn-primary flex items-center justify-center bg-yellow-400 text-gray-900 px-6 py-3 rounded-full font-semibold hover:bg-yellow-500 transition min-w-[140px]"
                    data-aos="fade-up">
                    <span class="text-center">{{ app()->getLocale() === 'ar' ? 'تواصلوا معنا' : 'Get in Touch' }}</span>
                </a>

                <!-- Admin Panel Button -->
                <span data-aos="fade-down">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center justify-center w-12 h-12 bg-gray-800 hover:bg-yellow-400 text-yellow-400 hover:text-gray-900 rounded-full shadow-lg transition transform hover:-translate-y-1"
                            title="{{ app()->getLocale() === 'ar' ? 'لوحة الإدارة' : 'Admin Panel' }}">
                            <span>🔑</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="flex items-center justify-center w-12 h-12 bg-gray-800 hover:bg-yellow-400 text-yellow-400 hover:text-gray-900 rounded-full shadow-lg transition transform hover:-translate-y-1"
                            title="{{ app()->getLocale() === 'ar' ? 'تسجيل الدخول' : 'Login' }}">
                            <span>🔑</span>
                        </a>
                    @endauth
                </span>
            </div>
        </div>
    </section>

    <!-- Services Overview -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-down">
                <h2 class="text-4xl font-bold text-gray-800">
                    {{ app()->getLocale() === 'ar' ? 'نقاط قوتنا الأساسية' : 'Our Core Strengths' }}
                </h2>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                    {{ app()->getLocale() === 'ar' ? 'تقديم خدمات أمنية استثنائية بخبرة وابتكار لا مثيل لهما.' : 'Delivering exceptional security services with unmatched expertise and innovation.' }}
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-12">
                @forelse($services as $service)
                    <div class="bg-gray-50 p-8 rounded-xl shadow-lg card-hover" data-aos="fade-up"
                        data-aos-delay="{{ $loop->index * 200 }}">
                        <div class="text-4xl mb-4 text-yellow-400">
                            <i class="{{ $service->icon }}"></i>
                        </div>
                        <h3 class="text-2xl font-semibold mb-3 text-gray-800">
                            {{ $service->{"title_" . app()->getLocale()} }}
                        </h3>
                        <p class="text-gray-600 mb-4">
                            {{ Str::limit($service->{"description_" . app()->getLocale()}, 150) }}
                        </p>
                        <a href="{{ route('services') }}" class="text-yellow-400 hover:text-yellow-500 font-medium">
                            {{ app()->getLocale() === 'ar' ? 'تعرف على المزيد' : 'Learn More' }}
                        </a>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500">{{ __('No services available at the moment.') }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-24 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 lg:gap-20 items-center">
                <!-- Image with Decorative Elements -->
                <div class="relative" data-aos="fade-right">
                    <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl">
                        @php $about = \App\Models\About::first(); @endphp
                        <img 
                            src="{{ $about && $about->image ? asset('storage/' . $about->image) : asset('img/about.png') }}" 
                            alt="{{ $about ? $about->{"title_" . app()->getLocale()} : 'Company Logo' }}" 
                            class="w-full h-auto object-cover transition-transform duration-700 hover:scale-105"
                        >
                        <!-- Decorative Elements -->
                        <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl opacity-20"></div>
                        <div class="absolute -top-6 -right-6 w-32 h-32 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-20"></div>
                    </div>
                    
                    <!-- Experience Badge -->
                    <div class="absolute -bottom-6 -right-6 bg-white rounded-xl shadow-lg p-6 text-center z-20" data-aos="fade-up" data-aos-delay="300">
                        <div class="text-4xl font-bold text-yellow-500">15+</div>
                        <div class="text-sm font-medium text-gray-600">{{ app()->getLocale() === 'ar' ? 'سنة خبرة' : 'Years Experience' }}</div>
                    </div>
                </div>
                
                <!-- Content -->
                <div data-aos="fade-left" data-aos-delay="100">
                    <!-- Section Title -->
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-yellow-50 text-yellow-600 text-sm font-medium mb-6">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h2a1 1 0 100-2h-2V9z" clip-rule="evenodd" />
                        </svg>
                        {{ app()->getLocale() === 'ar' ? 'من نحن' : 'About Us' }}
                    </div>
                    
                    <!-- Main Heading -->
                    <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-900 leading-tight">
                        {{ $about ? $about->{"title_" . app()->getLocale()} : (app()->getLocale() === 'ar' ? 'شركة رائدة في مجال الأمن والسلامة' : 'Leading Security & Safety Company') }}
                    </h2>
                @if($about)
                    <div class="prose max-w-none text-gray-600 mb-6 leading-relaxed">
                        {!! nl2br(e($about->{"description_" . app()->getLocale()})) !!}
                    </div>
                @else
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        {{ app()->getLocale() === 'ar' 
                            ? 'نحن شركة رائدة في مجال الخدمات الأمنية، نقدم حلولاً متكاملة لحماية الأفراد والممتلكات بأعلى معايير الجودة والكفاءة.'
                            : 'We are a leading security services company, providing integrated solutions to protect individuals and property with the highest standards of quality and efficiency.' }}
                    </p>
                @endif
                
                <!-- Features List -->
                <div class="space-y-6 mb-10">
                    @if($about && $about->features)
                        @foreach($about->features as $feature)
                            <div class="flex items-start group">
                                <div class="flex-shrink-0 mt-1 mr-4">
                                    <div class="flex items-center justify-center w-10 h-10 rounded-full bg-yellow-50 text-yellow-500 group-hover:bg-yellow-100 transition-colors duration-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-900 mb-1">{{ $feature["feature_" . app()->getLocale()] }}</h4>
                                    <p class="text-gray-600 text-sm">{{ $feature["description_" . app()->getLocale()] ?? '' }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Default Features -->
                        <div class="flex items-start group">
                            <div class="flex-shrink-0 mt-1 mr-4">
                                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-yellow-50 text-yellow-500 group-hover:bg-yellow-100 transition-colors duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-1">
                                    {{ app()->getLocale() === 'ar' ? 'فريق محترف' : 'Professional Team' }}
                                </h4>
                                <p class="text-gray-600 text-sm">
                                    {{ app()->getLocale() === 'ar' 
                                        ? 'خبراء أمنيون مدربون بأعلى المعايير الدولية'
                                        : 'Security experts trained to the highest international standards' }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start group">
                            <div class="flex-shrink-0 mt-1 mr-4">
                                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-50 text-blue-500 group-hover:bg-blue-100 transition-colors duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-1">
                                    {{ app()->getLocale() === 'ar' ? 'تكنولوجيا متطورة' : 'Advanced Technology' }}
                                </h4>
                                <p class="text-gray-600 text-sm">
                                    {{ app()->getLocale() === 'ar' 
                                        ? 'أحدث الأنظمة والتقنيات في مجال المراقبة والأمن'
                                        : 'Latest surveillance and security systems technology' }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start group">
                            <div class="flex-shrink-0 mt-1 mr-4">
                                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-green-50 text-green-500 group-hover:bg-green-100 transition-colors duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-1">
                                    {{ app()->getLocale() === 'ar' ? 'حلول مخصصة' : 'Custom Solutions' }}
                                </h4>
                                <p class="text-gray-600 text-sm">
                                    {{ app()->getLocale() === 'ar' 
                                        ? 'تصميم حلول أمنية تلبي احتياجاتك الخاصة'
                                        : 'Tailored security solutions for your specific needs' }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
                
                <!-- CTA Button -->
                <div class="mt-10">
                    @if($about && $about->cta_link)
                        <a href="{{ $about->cta_link }}" 
                           class="btn-primary group relative inline-flex items-center justify-center bg-gradient-to-r from-yellow-400 to-amber-500 hover:from-amber-500 hover:to-yellow-400 text-gray-900 font-semibold px-8 py-4 rounded-full transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-yellow-500/20">
                            <span>{{ $about->{"cta_text_" . app()->getLocale()} }}</span>
                            <svg class="w-5 h-5 mr-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('about') }}" 
                           class="btn-primary group relative inline-flex items-center justify-center bg-gradient-to-r from-yellow-400 to-amber-500 hover:from-amber-500 hover:to-yellow-400 text-gray-900 font-semibold px-8 py-4 rounded-full transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-yellow-500/20">
                            <span>{{ app()->getLocale() === 'ar' ? 'اقرأ المزيد' : 'Read More' }}</span>
                            <svg class="w-5 h-5 mr-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                {{ app()->getLocale() === 'ar' ? 'ماذا يقول عملاؤنا' : 'What Our Clients Say' }}
            </h2>
            <p class="text-lg text-gray-600 mb-16 max-w-2xl mx-auto">
                {{ app()->getLocale() === 'ar' ? 'موثوق به من قبل المؤسسات الدولية، تعكس تعليقات عملائنا التزامنا بالتميز.' : 'Trusted by international institutions, our clients\' feedback reflects our commitment to excellence.' }}
            </p>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach (\App\Models\Testimonial::all() as $testimonial)
                    <div class="bg-white p-8 rounded-xl shadow-lg card-hover flex flex-col h-full" data-aos="fade-up"
                        data-aos-delay="{{ $loop->index * 200 }}">
                        <!-- Profile Image -->
                        @if($testimonial->image_url)
                            <div class="w-20 h-20 mx-auto mb-6 rounded-full overflow-hidden border-4 border-yellow-100">
                                <img src="{{ $testimonial->image_url }}" 
                                     alt="{{ app()->getLocale() === 'ar' ? $testimonial->name_ar : $testimonial->name_en }}"
                                     class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-gray-200 flex items-center justify-center">
                                <svg class="w-10 h-10 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                            </div>
                        @endif

                        <!-- Rating -->
                        <div class="flex justify-center mb-4">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}" 
                                     fill="currentColor" 
                                     viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784 .57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81 .588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>

                        <!-- Testimonial Content -->
                        <p class="text-gray-600 italic mb-6 flex-grow">
                            "{{ app()->getLocale() === 'ar' ? $testimonial->content_ar : $testimonial->content_en }}"
                        </p>

                        <!-- Client Info -->
                        <div class="mt-auto">
                            <h4 class="text-lg font-semibold text-gray-800">
                                {{ app()->getLocale() === 'ar' ? $testimonial->name_ar : $testimonial->name_en }}
                            </h4>
                            <p class="text-gray-500 text-sm">
                                {{ app()->getLocale() === 'ar' ? $testimonial->position_ar : $testimonial->position_en }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 text-center" data-aos="fade-up">
            <h2 class="text-4xl font-bold mb-16">
                {{ app()->getLocale() === 'ar' ? 'خدماتنا الشاملة' : 'Our Comprehensive Services' }}
            </h2>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach (\App\Models\Service::all() as $service)
                    <div class="p-8 bg-gray-50 rounded-xl shadow-lg card-hover" data-aos="fade-up"
                        data-aos-delay="{{ $loop->index * 100 }}">
                        <h3 class="text-xl font-semibold mb-3 text-gray-800">
                            {{ app()->getLocale() === 'ar' ? $service->title_ar : $service->title_en }}
                        </h3>
                        <p class="text-gray-600">
                            {{ app()->getLocale() === 'ar' ? $service->description_ar : $service->description_en }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .hero-overlay {
            position: relative;
        }

        .hero-overlay::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .hero-overlay>div {
            position: relative;
            z-index: 2;
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .btn-primary {
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
@endsection
