@extends('layouts.app')

@section('title', 'إعادة تعيين كلمة المرور | Royal Security')

@section('content')
<div class="min-h-screen bg-cover bg-center flex items-center justify-center"
     style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('img/9.jpg') }}');">

    <div class="max-w-md w-full mx-4">
        <!-- Logo and Title -->
        <div class="text-center mb-8">
            <img src="{{ asset('img/logo.png') }}" alt="Royal Security Logo" class="w-20 h-20 mx-auto mb-4 rounded-full shadow-lg">
            <h1 class="text-3xl font-bold text-white mb-2" data-en="Reset Password" data-ar="إعادة تعيين كلمة المرور">
                {{ app()->getLocale() === 'ar' ? 'إعادة تعيين كلمة المرور' : 'Reset Password' }}
            </h1>
            <p class="text-gray-300 text-sm" data-en="Create a new password to secure your account" data-ar="إنشاء كلمة مرور جديدة لتأمين حسابك">
                {{ app()->getLocale() === 'ar' ? 'إنشاء كلمة مرور جديدة لتأمين حسابك' : 'Create a new password to secure your account' }}
            </p>
        </div>

        <!-- Password Reset Form Card -->
        <div class="bg-white/10 backdrop-blur-md rounded-xl shadow-2xl p-8 border border-white/20">
            <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

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
                               value="{{ old('email', $request->email) }}"
                               required
                               autofocus
                               autocomplete="username"
                               placeholder="{{ app()->getLocale() === 'ar' ? 'أدخل بريدك الإلكتروني' : 'Enter your email' }}"
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
                               placeholder="{{ app()->getLocale() === 'ar' ? 'أدخل كلمة المرور الجديدة' : 'Enter new password' }}"
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password_confirmation"
                               type="password"
                               name="password_confirmation"
                               required
                               autocomplete="new-password"
                               placeholder="{{ app()->getLocale() === 'ar' ? 'تأكيد كلمة المرور الجديدة' : 'Confirm new password' }}"
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

                <!-- Reset Password Button -->
                <div class="flex items-center justify-end">
                    <button type="submit"
                            class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-3 px-4 rounded-lg transition duration-200 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-yellow-400/50"
                            data-en="Reset Password" data-ar="إعادة تعيين كلمة المرور">
                        {{ app()->getLocale() === 'ar' ? 'إعادة تعيين كلمة المرور' : 'Reset Password' }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Security Notice -->
        <div class="mt-6 text-center">
            <p class="text-xs text-gray-400" data-en="This is a secure area. All activities are logged." data-ar="هذه منطقة آمنة. يتم تسجيل جميع الأنشطة.">
                {{ app()->getLocale() === 'ar' ? 'هذه منطقة آمنة. يتم تسجيل جميع الأنشطة.' : 'This is a secure area. All activities are logged.' }}
            </p>
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

/* Custom focus styles */
input:focus, button:focus {
    box-shadow: 0 0 0 3px rgba(252, 211, 77, 0.3);
}

/* Hover effects */
button:hover {
    box-shadow: 0 10px 20px rgba(252, 211, 77, 0.3);
}

/* Responsive adjustments */
@media (max-width: 640px) {
    .backdrop-blur-md {
        margin: 1rem;
        padding: 1.5rem;
    }
}
</style>
@endsection