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
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
            @php $about = \App\Models\About::first(); @endphp
            <img src="{{ $about && $about->image ? asset('storage/' . $about->image) : asset('img/about.png') }}" 
                 alt="{{ $about ? $about->{"title_" . app()->getLocale()} : 'Company Logo' }}" 
                 class="rounded-xl shadow-lg w-full h-auto max-h-96 object-cover" 
                 data-aos="fade-right"
                 data-aos-delay="100">
            <div data-aos="fade-left" data-aos-delay="200">
                <h2 class="text-4xl font-bold mb-6 text-gray-800">
                    {{ $about ? $about->{"title_" . app()->getLocale()} : (app()->getLocale() === 'ar' ? 'من نحن' : 'About Us') }}
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
                
                <div class="space-y-4">
                    @if($about && $about->features)
                        @foreach($about->features as $feature)
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-gray-600">
                                    {{ $feature["feature_" . app()->getLocale()] }}
                                </p>
                            </div>
                        @endforeach
                    @else
                        <!-- Default features if no about data -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <p class="ml-3 text-gray-600">
                                {{ app()->getLocale() === 'ar' 
                                    ? 'فريق محترف من ذوي الخبرة والكفاءة العالية' 
                                    : 'Professional team with high experience and efficiency' }}
                            </p>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <p class="ml-3 text-gray-600">
                                {{ app()->getLocale() === 'ar' 
                                    ? 'أحدث التقنيات والمعدات المتطورة' 
                                    : 'Latest technologies and advanced equipment' }}
                            </p>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <p class="ml-3 text-gray-600">
                                {{ app()->getLocale() === 'ar' 
                                    ? 'خدمات مخصصة تلبي احتياجاتك الأمنية' 
                                    : 'Customized services that meet your security needs' }}
                            </p>
                        </div>
                    @endif
                </div>
                
                @if($about && $about->cta_link)
                    <a href="{{ $about->cta_link }}"
                        class="mt-8 inline-block bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-8 py-3 rounded-full transition duration-300 transform hover:scale-105">
                        {{ $about->{"cta_text_" . app()->getLocale()} }}
                    </a>
                @else
                    <a href="{{ route('about') }}"
                        class="mt-8 inline-block bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-8 py-3 rounded-full transition duration-300 transform hover:scale-105">
                        {{ app()->getLocale() === 'ar' ? 'اقرأ المزيد' : 'Read More' }}
                    </a>
                @endif
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
                    <div class="bg-white p-8 rounded-xl shadow-lg card-hover" data-aos="fade-up"
                        data-aos-delay="{{ $loop->index * 200 }}">
                        <div class="flex justify-center mb-4">
                            @for ($i = 0; $i < $testimonial->rating; $i++)
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784 .57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81 .588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            @endfor
                        </div>
                        <p class="text-gray-600 italic mb-4">
                            {{ app()->getLocale() === 'ar' ? $testimonial->content_ar : $testimonial->content_en }}
                        </p>
                        <h4 class="text-lg font-semibold text-gray-800">
                            {{ app()->getLocale() === 'ar' ? $testimonial->name_ar : $testimonial->name_en }}
                        </h4>
                        <p class="text-gray-500 text-sm">
                            {{ app()->getLocale() === 'ar' ? $testimonial->position_ar : $testimonial->position_en }}
                        </p>
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
