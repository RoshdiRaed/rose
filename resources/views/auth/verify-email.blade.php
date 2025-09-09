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
            <p class="text-gray-300 text-sm" data-en="Please verify your email to continue" data-ar="يرجى تأكيد بريدك الإلكتروني للمتابعة">
                {{ app()->getLocale() === 'ar' ? 'يرجى تأكيد بريدك الإلكتروني للمتابعة' : 'Please verify your email to continue' }}
            </p>
        </div>

        <!-- Verification Card -->
        <div class="bg-white/10 backdrop-blur-md rounded-xl shadow-2xl p-8 border border-white/20">
            <div class="mb-4 text-sm text-gray-300" data-en="Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another." data-ar="شكرًا لتسجيلك! قبل البدء، هل يمكنك تأكيد عنوان بريدك الإلكتروني بالنقر على الرابط الذي أرسلناه لك للتو؟ إذا لم تستلم البريد الإلكتروني، سنرسل لك واحدًا آخر بكل سرور.">
                {{ app()->getLocale() === 'ar' ? 'شكرًا لتسجيلك! قبل البدء، هل يمكنك تأكيد عنوان بريدك الإلكتروني بالنقر على الرابط الذي أرسلناه لك للتو؟ إذا لم تستلم البريد الإلكتروني، سنرسل لك واحدًا آخر بكل سرور.' : 'Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.' }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-400" data-en="A new verification link has been sent to the email address you provided during registration." data-ar="تم إرسال رابط تأكيد جديد إلى عنوان البريد الإلكتروني الذي قدمته أثناء التسجيل.">
                    {{ app()->getLocale() === 'ar' ? 'تم إرسال رابط تأكيد جديد إلى عنوان البريد الإلكتروني الذي قدمته أثناء التسجيل.' : 'A new verification link has been sent to the email address you provided during registration.' }}
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                            class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-3 px-4 rounded-lg transition duration-200 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-yellow-400/50"
                            data-en="Resend Verification Email" data-ar="إعادة إرسال بريد التأكيد">
                        {{ app()->getLocale() === 'ar' ? 'إعادة إرسال بريد التأكيد' : 'Resend Verification Email' }}
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="underline text-sm text-gray-300 hover:text-white transition duration-200"
                            data-en="Log Out" data-ar="تسجيل الخروج">
                        {{ app()->getLocale() === 'ar' ? 'تسجيل الخروج' : 'Log Out' }}
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
button:focus {
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