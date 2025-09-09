@extends('layouts.app')

@section('title', 'تأكيد البريد الإلكتروني | Royal Security')

@section('content')
<div class="min-h-screen bg-cover bg-center flex items-center justify-center"
     style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('img/9.jpg') }}');">

    <div class="max-w-md w-full mx-4">
        <!-- Logo and Title -->
        <div class="text-center mb-8">
            <img src="{{ asset('img/logo.png') }}" alt="Royal Security Logo" class="w-20 h-20 mx-auto mb-4 rounded-full shadow-lg">
            <h1 class="text-3xl font-bold text-white mb-2" data-en="Email Verification" data-ar="تأكيد البريد الإلكتروني">
                {{ app()->getLocale() === 'ar' ? 'تأكيد البريد الإلكتروني' : 'Email Verification' }}
            </h1>
            <p class="text-gray-300 text-sm" data-en="Enter the verification code sent to your email" data-ar="أدخل رمز التأكيد المرسل إلى بريدك الإلكتروني">
                {{ app()->getLocale() === 'ar' ? 'أدخل رمز التأكيد المرسل إلى بريدك الإلكتروني' : 'Enter the verification code sent to your email' }}
            </p>
        </div>

        <!-- Verification Form Card -->
        <div class="bg-white/10 backdrop-blur-md rounded-xl shadow-2xl p-8 border border-white/20">
            <div class="mb-4 text-sm text-gray-300" data-en="Thanks for signing up! Before getting started, please verify your email address by entering the 6-digit code we sent to your email. If you didn't receive the email, we will gladly send you another." data-ar="شكرًا لتسجيلك! قبل البدء، يرجى تأكيد عنوان بريدك الإلكتروني بإدخال رمز التأكيد المكون من 6 أرقام الذي أرسلناه إلى بريدك الإلكتروني. إذا لم تستلم البريد الإلكتروني، سنرسل لك واحدًا آخر بكل سرور.">
                {{ app()->getLocale() === 'ar' ? 'شكرًا لتسجيلك! قبل البدء، يرجى تأكيد عنوان بريدك الإلكتروني بإدخال رمز التأكيد المكون من 6 أرقام الذي أرسلناه إلى بريدك الإلكتروني. إذا لم تستلم البريد الإلكتروني، سنرسل لك واحدًا آخر بكل سرور.' : 'Thanks for signing up! Before getting started, please verify your email address by entering the 6-digit code we sent to your email. If you didn\'t receive the email, we will gladly send you another.' }}
            </div>

            @if (session('status') === 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-400" data-en="A new verification code has been sent to your email address." data-ar="تم إرسال رمز تأكيد جديد إلى عنوان بريدك الإلكتروني.">
                    {{ app()->getLocale() === 'ar' ? 'تم إرسال رمز تأكيد جديد إلى عنوان بريدك الإلكتروني.' : 'A new verification code has been sent to your email address.' }}
                </div>
            @endif

            <form method="POST" action="{{ route('verification.verify') }}" class="space-y-6">
                @csrf

                <!-- Verification Code -->
                <div class="space-y-2">
                    <label for="verification_code" class="block text-sm font-semibold text-white" data-en="Verification Code" data-ar="رمز التأكيد">
                        {{ app()->getLocale() === 'ar' ? 'رمز التأكيد' : 'Verification Code' }}
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.1.9-2 2-2s2 .9 2 2-2 4-2 4m-4-4c0-1.1-.9-2-2-2s-2 .9-2 2 2 4 2 4m6 2v2m-6-2v2m-2-6h12" />
                            </svg>
                        </div>
                        <input id="verification_code"
                               type="text"
                               name="verification_code"
                               required
                               autofocus
                               autocomplete="one-time-code"
                               placeholder="{{ app()->getLocale() === 'ar' ? 'أدخل رمز التأكيد المكون من 6 أرقام' : 'Enter 6-digit code' }}"
                               class="block w-full pl-10 pr-4 py-3 bg-white/10 border border-white/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition duration-200" />
                    </div>
                    @if($errors->get('verification_code'))
                        <div class="text-red-400 text-sm mt-1">
                            @foreach($errors->get('verification_code') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Verify Button -->
                <div class="flex items-center justify-between">
                    <button type="submit"
                            class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-3 px-4 rounded-lg transition duration-200 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-yellow-400/50"
                            data-en="Verify Email" data-ar="تأكيد البريد الإلكتروني">
                        {{ app()->getLocale() === 'ar' ? 'تأكيد البريد الإلكتروني' : 'Verify Email' }}
                    </button>
                </div>
            </form>

            <!-- Resend Code -->
            <div class="mt-4 text-center">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                            class="text-sm text-gray-300 hover:text-white transition duration-200"
                            data-en="Didn't receive a code? Click here to resend" data-ar="لم تستلم رمز التأكيد؟ انقر هنا لإعادة الإرسال">
                        {{ app()->getLocale() === 'ar' ? 'لم تستلم رمز التأكيد؟ انقر هنا لإعادة الإرسال' : 'Didn\'t receive a code? Click here to resend' }}
                    </button>
                </form>
            </div>
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