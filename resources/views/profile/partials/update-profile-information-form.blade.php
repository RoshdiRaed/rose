<form method="post" action="{{ route('profile.update') }}" class="space-y-4">
    @csrf
    @method('patch')

    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Name') }}</label>
        <input id="name" name="name" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Email') }}</label>
        <input id="email" name="email" type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" value="{{ old('email', $user->email) }}" required autocomplete="username">
        @error('email')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-2">
                <p class="text-sm text-yellow-700">
                    {{ __('Your email address is unverified.') }}
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-yellow-600 hover:text-yellow-800 underline">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </form>
                </p>
            </div>
        @endif
    </div>

    <div class="flex items-center justify-end mt-6">
        @if (session('status') === 'profile-updated')
            <p class="text-sm text-green-600 mr-4">
                {{ __('Saved.') }}
            </p>
        @endif
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
            {{ __('Save') }}
        </button>
    </div>
</form>
