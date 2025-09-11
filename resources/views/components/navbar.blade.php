<nav class="fixed top-0 left-0 w-full bg-gray-900/90 backdrop-blur-md shadow-md z-50" dir="{{ config('app.direction', 'ltr') }}">
    <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-16" dir="{{ config('app.direction', 'ltr') }}">
        <!-- Logo -->
        <a href="/" class="flex items-center gap-2">
            <img src="/img/logo.png" alt="logo" class="w-8 h-8 rounded">
            <span class="font-bold text-yellow-400 text-lg">
                {{ __('messages.site_name') }}
            </span>
        </a>

        <!-- Desktop Links -->
        <div class="hidden md:flex items-center gap-6">
            <a href="{{ route('home') }}" class="text-yellow-400 hover:text-yellow-600 transition">
                {{ __('messages.home') }}
            </a>
            <a href="{{ route('services') }}" class="text-yellow-400 hover:text-yellow-600 transition">
                {{ __('messages.services') }}
            </a>
            <a href="{{ route('portfolio') }}" class="text-yellow-400 hover:text-yellow-600 transition">
                {{ __('messages.portfolio') }}
            </a>
            <a href="{{ route('contact') }}" class="text-yellow-400 hover:text-yellow-600 transition">
                {{ __('messages.contact') }}
            </a>
        </div>

        <!-- Right side -->
        <div class="flex items-center gap-4">
            <a href="{{ route('language.switch', app()->getLocale() === 'en' ? 'ar' : 'en') }}" class="px-3 py-1 rounded-full border border-yellow-400 text-yellow-400 hover:bg-yellow-400 hover:text-gray-900 transition focus:outline-none">
                {{ app()->isLocale('en') ? 'العربية' : 'English' }}
            </a>

            <!-- Hamburger (Mobile only) -->
            <button id="menu-btn" class="md:hidden flex flex-col gap-1.5">
                <span class="w-6 h-0.5 bg-yellow-400"></span>
                <span class="w-6 h-0.5 bg-yellow-400"></span>
                <span class="w-6 h-0.5 bg-yellow-400"></span>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu"
        class="fixed top-0 {{ config('app.direction') === 'rtl' ? 'right-0' : 'left-0' }} w-64 h-full bg-gray-800 transform {{ config('app.direction') === 'rtl' ? 'translate-x-full' : '-translate-x-full' }} transition-transform duration-300 z-40 md:hidden" dir="{{ config('app.direction', 'ltr') }}">
        <div class="p-6 flex flex-col gap-6">
            <!-- Close button -->
            <button id="close-menu" class="self-end text-yellow-400 hover:text-yellow-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <a href="{{ route('home') }}" class="text-yellow-400 hover:text-yellow-600 transition">
                {{ __('messages.home') }}
            </a>
            <a href="{{ route('services') }}" class="text-yellow-400 hover:text-yellow-600 transition">
                {{ __('messages.services') }}
            </a>
            <a href="{{ route('portfolio') }}" class="text-yellow-400 hover:text-yellow-600 transition">
                {{ __('messages.portfolio') }}
            </a>
            <a href="{{ route('contact') }}" class="text-yellow-400 hover:text-yellow-600 transition">
                {{ __('messages.contact') }}
            </a>

            <a href="{{ route('language.switch', app()->getLocale() === 'en' ? 'ar' : 'en') }}"
                class="px-3 py-2 rounded-lg border border-yellow-400 text-yellow-400 hover:bg-yellow-400 hover:text-gray-900 transition w-full text-center block">
                {{ app()->isLocale('en') ? 'العربية' : 'English' }}
            </a>
        </div>
    </div>

    <!-- Overlay -->
    <div id="mobile-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-30"></div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const menuBtn = document.getElementById("menu-btn");
    const closeMenu = document.getElementById("close-menu");
    const mobileMenu = document.getElementById("mobile-menu");
    const mobileOverlay = document.getElementById("mobile-overlay");
    const isRTL = document.documentElement.dir === 'rtl';

    function openMobileMenu() {
        if (isRTL) {
            mobileMenu.classList.remove("translate-x-full");
        } else {
            mobileMenu.classList.remove("-translate-x-full");
        }
        mobileOverlay.classList.remove("hidden");
        document.body.style.overflow = 'hidden';
    }

    function closeMobileMenu() {
        if (isRTL) {
            mobileMenu.classList.add("translate-x-full");
        } else {
            mobileMenu.classList.add("-translate-x-full");
        }
        mobileOverlay.classList.add("hidden");
        document.body.style.overflow = '';
    }

    // Event Listeners
    menuBtn.addEventListener("click", openMobileMenu);
    closeMenu.addEventListener("click", closeMobileMenu);
    mobileOverlay.addEventListener("click", closeMobileMenu);

    // Close menu when clicking on a nav link
    document.querySelectorAll('#mobile-menu a').forEach(link => {
        link.addEventListener('click', closeMobileMenu);
    });

    // Close menu when pressing Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
            closeMobileMenu();
        }
    });
});
</script>
