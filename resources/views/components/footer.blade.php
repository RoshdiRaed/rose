<footer class="bg-gray-900 text-gray-300 py-16 overflow-x-hidden">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-4 gap-12">
        <!-- Company Info -->
        <div>
            <h3 class="text-xl font-bold text-white mb-4">
                {{ app()->getLocale() === 'ar' ? 'رويال سيكيوريتي' : 'Royal Security' }}
            </h3>
            <p class="text-gray-400">
                {{ app()->getLocale() === 'ar' ? 'الخيار الأول للمؤسسات الدولية في قطاع غزة، يقدم حلول أمنية موثوقة.' : 'The premier choice for international institutions in the Gaza Strip, delivering trusted security solutions.' }}
            </p>
        </div>
        <!-- Quick Links -->
        <div>
            <h3 class="text-xl font-bold text-white mb-4">
                {{ app()->getLocale() === 'ar' ? 'روابط سريعة' : 'Quick Links' }}
            </h3>
            <ul class="space-y-3">
                <li><a href="/" class="footer-link hover:text-yellow-400">
                    {{ app()->getLocale() === 'ar' ? 'معلومات عنا' : 'About Us' }}
                </a></li>
                <li><a href="{{ route('service') }}" class="footer-link hover:text-yellow-400">
                    {{ app()->getLocale() === 'ar' ? 'الخدمات' : 'Services' }}
                </a></li>
                <li><a href="{{ route('contact') }}" class="footer-link hover:text-yellow-400">
                    {{ app()->getLocale() === 'ar' ? 'اتصل بنا' : 'Contact' }}
                </a></li>
            </ul>
        </div>
        <!-- Contact Info -->
        <div>
            <h3 class="text-xl font-bold text-white mb-4">
                {{ app()->getLocale() === 'ar' ? 'اتصل بنا' : 'Contact Us' }}
            </h3>
            <p class="text-gray-400">
                {{ app()->getLocale() === 'ar' ? 'قطاع غزة' : 'Gaza Strip' }}
            </p>
            <p class="text-gray-400">Phone: <a href="tel:+970-59-999999" class="hover:text-yellow-400">059999999</a></p>
            <p class="text-gray-400">Email: <a href="mailto:info@royalsecurity.ps" class="hover:text-yellow-400">info@royalsecurity.ps</a></p>
        </div>
        <!-- Follow Us -->
        <div>
            <h3 class="text-xl font-bold text-white mb-4">
                {{ app()->getLocale() === 'ar' ? 'تابعنا' : 'Follow Us' }}
            </h3>
            <div class="flex space-x-4 space-x-reverse">
                <!-- social icons -->
            </div>
        </div>
    </div>
    <div class="text-center text-sm text-gray-500 mt-12">
        {{ app()->getLocale() === 'ar' ? '© ' . date('Y') . ' رويال سيكيوريتي. جميع الحقوق محفوظة.' : '© ' . date('Y') . ' Royal Security. All rights reserved.' }}
    </div>
</footer>
