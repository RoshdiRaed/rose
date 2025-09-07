<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        @method('put')

        <div class="mb-4">
            <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Current Password') }}</label>
            <input id="current_password" name="current_password" type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" autocomplete="current-password">
            @error('current_password', 'updatePassword')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">{{ __('New Password') }}</label>
            <input id="password" name="password" type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" autocomplete="new-password">
            @error('password', 'updatePassword')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end">
            @if (session('status') === 'password-updated')
                <p class="text-sm text-green-600 mr-4">
                    {{ __('Saved.') }}
                </p>
            @endif
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                {{ __('Save') }}
            </button>
        </div>
    </form>
</section>
