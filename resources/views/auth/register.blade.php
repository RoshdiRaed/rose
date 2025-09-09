@extends('layouts.app')

@section('title', 'إنشاء حساب | Royal Security')

@section('content')
<div class="min-h-screen bg-cover bg-center flex items-center justify-center py-12"
     style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('img/9.jpg') }}');">

    <div class="max-w-md w-full mx-4">
        <!-- Logo and Title -->
        <div class="text-center mb-8">
            <img src="{{ asset('img/logo.png') }}" alt="Royal Security Logo" class="w-20 h-20 mx-auto mb-4 rounded-full shadow-lg">
            <h1 class="text-3xl font-bold text-white mb-2" data-en="Create Admin Account" data-ar="إنشاء حساب مشرف">
                {{ app()->getLocale() === 'ar' ? 'إنشاء حساب مشرف' : 'Create Admin Account' }}
            </h1>
            <p class="text-gray-300 text-sm" data-en="Join the Royal Security admin team" data-ar="انضم إلى فريق إدارة رويال سيكيوريتي">
                {{ app()->getLocale() === 'ar' ? 'انضم إلى فريق إدارة رويال سيكيوريتي' : 'Join the Royal Security admin team' }}
            </p>
        </div>

        <!-- Register Form Card -->
        <div class="bg-white/10 backdrop-blur-md rounded-xl shadow-2xl p-8 border border-white/20">
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-semibold text-white" data-en="Full Name" data-ar="الاسم الكامل">
                        {{ app()->getLocale() === 'ar' ? 'الاسم الكامل' : 'Full Name' }}
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input id="name"
                               type="text"
                               name="name"
                               value="{{ old('name') }}"
                               required
                               autofocus
                               autocomplete="name"
                               placeholder="{{ app()->getLocale() === 'ar' ? 'أدخل اسمك الكامل' : 'Enter your full name' }}"
                               class="block w-full pl-10 pr-4 py-3 bg-white/10 border border-white/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition duration-200" />
                    </div>
                    @if($errors->get('name'))
                        <div class="text-red-400 text-sm mt-1">
                            @foreach($errors->get('name') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Email Address -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-semibold text-white" data-en="Email Address" data-ar="البريد الإلكتروني">
                        {{ app()->getLocale() === 'ar' ? 'البريد الإلكتروني' : 'Email Address' }}
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autocomplete="username"
                               placeholder="{{ app()->getLocale() === 'ar' ? 'أدخل بريدك الإلكتروني' : 'Enter your email address' }}"
                               class="block w-full pl-10 pr-4 py-3 bg-white/10 border border-white/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition duration-200" />
                    </div>
                    @if($errors->get('email'))
                        <div class="text-red-400 text-sm mt-1">
                            @foreach($errors->get('email') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-semibold text-white" data-en="Password" data-ar="كلمة المرور">
                        {{ app()->getLocale() === 'ar' ? 'كلمة المرور' : 'Password' }}
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password"
                               type="password"
                               name="password"
                               required
                               autocomplete="new-password"
                               placeholder="{{ app()->getLocale() === 'ar' ? 'أدخل كلمة مرور قوية' : 'Enter a strong password' }}"
                               class="block w-full pl-10 pr-4 py-3 bg-white/10 border border-white/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition duration-200" />
                    </div>
                    @if($errors->get('password'))
                        <div class="text-red-400 text-sm mt-1">
                            @foreach($errors->get('password') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Confirm Password -->
                <div class="space-y-2">
                    <label for="password_confirmation" class="block text-sm font-semibold text-white" data-en="Confirm Password" data-ar="تأكيد كلمة المرور">
                        {{ app()->getLocale() === 'ar' ? 'تأكيد كلمة المرور' : 'Confirm Password' }}
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <input id="password_confirmation"
                               type="password"
                               name="password_confirmation"
                               required
                               autocomplete="new-password"
                               placeholder="{{ app()->getLocale() === 'ar' ? 'أعد إدخال كلمة المرور' : 'Re-enter your password' }}"
                               class="block w-full pl-10 pr-4 py-3 bg-white/10 border border-white/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition duration-200" />
                    </div>
                    @if($errors->get('password_confirmation'))
                        <div class="text-red-400 text-sm mt-1">
                            @foreach($errors->get('password_confirmation') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Password Requirements -->
                <div class="bg-yellow-400/10 border border-yellow-400/30 rounded-lg p-3">
                    <h4 class="text-yellow-400 text-xs font-semibold mb-2" data-en="Password Requirements:" data-ar="متطلبات كلمة المرور:">
                        {{ app()->getLocale() === 'ar' ? 'متطلبات كلمة المرور:' : 'Password Requirements:' }}
                    </h4>
                    <ul class="text-gray-300 text-xs space-y-1">
                        <li class="flex items-center">
                            <svg class="w-3 h-3 text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span data-en="At least 8 characters long" data-ar="على الأقل 8 أحرف">
                                {{ app()->getLocale() === 'ar' ? 'على الأقل 8 أحرف' : 'At least 8 characters long' }}
                            </span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-3 h-3 text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span data-en="Mix of letters and numbers" data-ar="مزيج من الحروف والأرقام">
                                {{ app()->getLocale() === 'ar' ? 'مزيج من الحروف والأرقام' : 'Mix of letters and numbers' }}
                            </span>
                        </li>
                    </ul>
                </div>

                <!-- Register Button -->
                <button type="submit"
                        class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-3 px-4 rounded-lg transition duration-200 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-yellow-400/50">
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        <span data-en="Create Account" data-ar="إنشاء الحساب">
                            {{ app()->getLocale() === 'ar' ? 'إنشاء الحساب' : 'Create Account' }}
                        </span>
                    </span>
                </button>

                <!-- Already Registered Link -->
                <div class="text-center pt-4 border-t border-white/20">
                    <p class="text-gray-300 text-sm mb-2" data-en="Already have an account?" data-ar="لديك حساب بالفعل؟">
                        {{ app()->getLocale() === 'ar' ? 'لديك حساب بالفعل؟' : 'Already have an account?' }}
                    </p>
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center text-yellow-400 hover:text-yellow-300 font-semibold transition duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        <span data-en="Sign In Instead" data-ar="تسجيل الدخول بدلاً من ذلك">
                            {{ app()->getLocale() === 'ar' ? 'تسجيل الدخول بدلاً من ذلك' : 'Sign In Instead' }}
                        </span>
                    </a>
                </div>

                <!-- Back to Home -->
                <div class="text-center pt-2">
                    <a href="{{ route('home') }}"
                       class="inline-flex items-center text-sm text-gray-400 hover:text-gray-300 transition duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span data-en="Back to Homepage" data-ar="العودة للصفحة الرئيسية">
                            {{ app()->getLocale() === 'ar' ? 'العودة للصفحة الرئيسية' : 'Back to Homepage' }}
                        </span>
                    </a>
                </div>
            </form>
        </div>

        <!-- Security Notice -->
        <div class="mt-6 text-center">
            <div class="bg-gray-800/50 backdrop-blur-sm rounded-lg p-4 border border-gray-700/50">
                <div class="flex items-center justify-center mb-2">
                    <svg class="w-5 h-5 text-yellow-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <h4 class="text-yellow-400 font-semibold text-sm" data-en="Secure Registration" data-ar="تسجيل آمن">
                        {{ app()->getLocale() === 'ar' ? 'تسجيل آمن' : 'Secure Registration' }}
                    </h4>
                </div>
                <p class="text-xs text-gray-400" data-en="All admin accounts require approval. Your information is encrypted and secure." data-ar="جميع حسابات الإدارة تتطلب موافقة. معلوماتك مشفرة وآمنة.">
                    {{ app()->getLocale() === 'ar' ? 'جميع حسابات الإدارة تتطلب موافقة. معلوماتك مشفرة وآمنة.' : 'All admin accounts require approval. Your information is encrypted and secure.' }}
                </p>
            </div>
        </div>
    </div>
</div>

<style>
/* Custom animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.bg-white\/10 {
    animation: fadeInUp 0.6s ease-out;
}

/* Glassmorphism effect enhancement */
.backdrop-blur-md {
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
}

.backdrop-blur-sm {
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
}

/* Custom focus styles */
input:focus {
    box-shadow: 0 0 0 3px rgba(252, 211, 77, 0.3);
}

/* Hover effects */
button:hover {
    box-shadow: 0 10px 20px rgba(252, 211, 77, 0.3);
}

/* Password strength indicator */
.password-requirements li {
    transition: all 0.3s ease;
}

.password-requirements li.valid {
    color: #10B981;
}

.password-requirements li.valid svg {
    color: #10B981;
}

/* Responsive adjustments */
@media (max-width: 640px) {
    .backdrop-blur-md {
        margin: 1rem;
        padding: 1.5rem;
    }
}

/* Custom scrollbar for small screens */
@media (max-height: 800px) {
    .min-h-screen {
        padding: 2rem 0;
    }
}
</style>

<script>
// Password strength validation (optional enhancement)
document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');

    // Add real-time password matching feedback
    if (passwordInput && confirmPasswordInput) {
        confirmPasswordInput.addEventListener('input', function() {
            if (this.value && passwordInput.value && this.value !== passwordInput.value) {
                this.style.borderColor = '#EF4444';
            } else {
                this.style.borderColor = '';
            }
        });
    }
});
</script>
@endsection
