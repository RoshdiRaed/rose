<div>
    <p class="text-sm text-gray-600 mb-4">
        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
    </p>

    <button
        type="button"
        onclick="document.getElementById('confirm-delete').classList.remove('hidden')"
        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
    >
        {{ __('Delete Account') }}
    </button>

    <div id="confirm-delete" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
            <h3 class="text-lg font-medium text-gray-900 mb-4">
                {{ __('Are you sure you want to delete your account?') }}
            </h3>

            <p class="text-sm text-gray-600 mb-6">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <form method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
                @csrf
                @method('delete')

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Password') }}
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                        placeholder="{{ __('Password') }}"
                        required
                    >
                    @error('password', 'userDeletion')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <button
                        type="button"
                        onclick="document.getElementById('confirm-delete').classList.add('hidden')"
                        class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500"
                    >
                        {{ __('Cancel') }}
                    </button>

                    <button
                        type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                    >
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Close modal when clicking outside
    document.getElementById('confirm-delete')?.addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.add('hidden');
        }
    });
</script>
