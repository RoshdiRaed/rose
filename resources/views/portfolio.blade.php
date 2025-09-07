@extends('layouts.app')

@section('title', app()->getLocale() === 'ar' ? 'رويال سيكيوريتي | أعمالنا' : 'Royal Security | Our Work')

@section('content')
    <!-- Hero Section (Static) -->
    <section class="h-96 bg-cover bg-center flex items-center justify-center text-center bg-gradient-to-r from-indigo-900 to-gray-900" data-aos="zoom-out">
        <div class="max-w-4xl px-6 text-white">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-4 leading-tight">
                {{ app()->getLocale() === 'ar' ? 'أعمالنا' : 'Our Work' }}
            </h1>
            <p class="text-lg md:text-xl max-w-2xl mx-auto">
                {{ app()->getLocale() === 'ar' ? 'اكتشف محفظتنا من المشاريع الأمنية الناجحة، التي تعرض خبرتنا والتزامنا بالسلامة.' : 'Discover our portfolio of successful security projects, showcasing our expertise and commitment to safety.' }}
            </p>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-down">
                <h2 class="text-4xl font-bold text-gray-800">
                    {{ app()->getLocale() === 'ar' ? 'مشاريعنا' : 'Our Projects' }}
                </h2>
                <p class="text-lg text-gray-600 mt-4 max-w-2xl mx-auto">
                    {{ app()->getLocale() === 'ar' ? 'استكشف مجموعتنا من المشاريع المكتملة، كل منها مصمم لتلبية التحديات الأمنية الفريدة بدقة وابتكار.' : 'Explore our range of completed projects, each tailored to meet unique security challenges with precision and innovation.' }}
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach(\App\Models\Portfolio::all() as $project)
                    <div class="bg-gray-50 p-8 rounded-xl shadow-lg card-hover flex flex-col items-start" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ app()->getLocale() === 'ar' ? $project->title_ar : $project->title_en }}" class="w-full h-40 object-cover rounded-t-xl mb-4">
                        <h3 class="text-2xl font-semibold mb-3 text-gray-800">
                            {{ app()->getLocale() === 'ar' ? $project->title_ar : $project->title_en }}
                        </h3>
                        <p class="text-gray-600 mb-4">
                            {{ app()->getLocale() === 'ar' ? $project->description_ar : $project->description_en }}
                        </p>
                        <a href="{{ route('contact') }}" class="text-yellow-400 hover:text-yellow-500 font-medium">
                            {{ app()->getLocale() === 'ar' ? 'تعرف على المزيد' : 'Learn More' }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Call to Action (Static) -->
    <section class="bg-gradient-to-r from-indigo-900 to-gray-900 text-white py-24 text-center" data-aos="fade-down">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-4xl font-bold mb-4">
                {{ app()->getLocale() === 'ar' ? 'شارك مع رويال سيكيوريتي' : 'Partner with Royal Security' }}
            </h2>
            <p class="text-lg mb-8">
                {{ app()->getLocale() === 'ar' ? 'تواصلوا معنا اليوم لاستكشاف كيف يمكن لخبرتنا حماية مشروعكم القادم.' : 'Contact us today to explore how our expertise can safeguard your next project.' }}
            </p>
            <a href="{{ route('contact') }}"
               class="btn-primary inline-block bg-yellow-400 text-gray-900 px-8 py-4 rounded-full font-semibold hover:bg-yellow-500">
                {{ app()->getLocale() === 'ar' ? 'ابدأ الآن' : 'Get Started' }}
            </a>
        </div>
    </section>
@endsection
