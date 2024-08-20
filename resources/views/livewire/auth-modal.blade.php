<div>

        <div class="fixed inset-0 flex items-center justify-center bg-black   bg-opacity-60">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-2xl dark:text-black font-bold mb-4">
                    {{ $isLoginMode ? 'Login' : 'Sign Up' }}
                </h2>

                <form wire:submit.prevent="{{ $isLoginMode ? 'login' : 'signup' }}">
                    @if (!$isLoginMode)
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name" wire:model="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-opacity-50">
                            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" wire:model="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-opacity-50">
                        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" wire:model="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-opacity-50">
                        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    @if (!$isLoginMode)
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                            <input type="password" id="password_confirmation" wire:model="password_confirmation" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-opacity-50">
                            @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    @endif

                    <div class="mb-4">
                        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md">
                            {{ $isLoginMode ? 'Login' : 'Sign Up' }}
                        </button>
                    </div>

                    <div class="text-sm text-center">
                        <button type="button" wire:click="switchMode" class="text-blue-500 hover:underline">
                            {{ $isLoginMode ? 'Create an account' : 'Already have an account? Login' }}
                        </button>
                    </div>
                </form>

                <button wire:click="$set('isOpen', false)" class="mt-4 w-full bg-gray-500 text-white p-2 rounded-md">Close</button>
            </div>
        </div>
</div>
