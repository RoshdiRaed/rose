@extends('layouts.app')

@section('title', app()->getLocale() === 'ar' ? 'رويال سيكيوريتي | الخدمات' : 'Royal Security | Services')

@section('content')
    <!-- Hero Section (Static) -->
    <section
        class="h-96 bg-cover bg-center flex items-center justify-center text-center bg-gradient-to-r from-indigo-900 to-gray-900"
        data-aos="zoom-out">
        <div class="max-w-4xl px-6 text-white">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-4 leading-tight">
                {{ app()->getLocale() === 'ar' ? 'خدمات الأمن الشاملة' : 'Comprehensive Security Services' }}
            </h1>
            <p class="text-lg md:text-xl max-w-2xl mx-auto">
                {{ app()->getLocale() === 'ar' ? 'حلول مخصصة يقدمها أكثر من 250 من المحترفين المهرة لحماية أصولك وعملياتك.' : 'Tailored solutions delivered by over 250 skilled professionals to protect your assets and operations.' }}
            </p>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-down">
                <h2 class="text-4xl font-bold text-gray-800">
                    {{ app()->getLocale() === 'ar' ? 'خدماتنا' : 'Our Services' }}
                </h2>
                <p class="text-lg text-gray-600 mt-4 max-w-2xl mx-auto">
                    {{ app()->getLocale() === 'ar' ? 'استكشف مجموعتنا من الحلول الأمنية المصممة لتلبية الاحتياجات المتنوعة بدقة وخبرة.' : 'Explore our range of security solutions designed to meet diverse needs with precision and expertise.' }}
                </p>
            </div>
            <div class="grid md:grid-cols-2 gap-12">
                @foreach (\App\Models\Service::all() as $service)
                    <div class="bg-gray-50 p-8 rounded-xl shadow-lg card-hover flex items-start space-x-6 space-x-reverse"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        @if ($service->icon)
                            <svg class="w-12 h-12 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="{{ $service->icon }}"></path>
                            </svg>
                        @endif
                        <div>
                            <h3 class="text-2xl font-semibold mb-3 text-gray-800">
                                {{ app()->getLocale() === 'ar' ? $service->title_ar : $service->title_en }}
                            </h3>
                            <p class="text-gray-600 mb-4">
                                {{ app()->getLocale() === 'ar' ? $service->description_ar : $service->description_en }}
                            </p>
                            <a href="{{ route('contact') }}" class="text-yellow-400 hover:text-yellow-500 font-medium">
                                {{ app()->getLocale() === 'ar' ? 'طلب عرض أسعار' : 'Request a Quote' }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Call to Action (Static) -->
    <section class="bg-gradient-to-r from-indigo-900 to-gray-900 text-white py-24 text-center" data-aos="fade-down">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-4xl font-bold mb-4">
                {{ app()->getLocale() === 'ar' ? 'تأمين مستقبلك مع رويال سيكيوريتي' : 'Secure Your Future with Royal Security' }}
            </h2>
            <p class="text-lg mb-8">
                {{ app()->getLocale() === 'ar' ? 'تواصلوا معنا اليوم لمناقشة احتياجاتكم الأمنية والحصول على حل مخصص.' : 'Contact us today to discuss your security needs and receive a tailored solution.' }}
            </p>
            <a href="{{ route('contact') }}"
                class="btn-primary inline-block bg-yellow-400 text-gray-900 px-8 py-4 rounded-full font-semibold hover:bg-yellow-500">
                {{ app()->getLocale() === 'ar' ? 'ابدأ الآن' : 'Get Started' }}
            </a>
        </div>
    </section>
@endsection
