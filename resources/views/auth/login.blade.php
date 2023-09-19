<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="formStyle">
        <form method="POST" action="{{ route('login') }}" class="formStyle">
            @csrf

            <h1 class="text-4xl mb-4">Sign In</h1>

            <!-- Email Address -->
            <div class="input-control mb-2">
                <x-input-label for="email" :value="__('Email')" />
                <input id="email" class=" w-full inputStyle" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="input-control mb-2">
                <x-input-label for="password" :value="__('Password')" />

                <input id="password" class=" w-full inputStyle" type="password" name="password" required
                    placeholder="Password" value=""/>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded " name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <button class="w-full buttonStyle" type="submit">Login</button>

            <div>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            <hr>

        </form>

        <button class="createButton" onclick="location.href='/register'">Create Account</button>
    </div>
</x-guest-layout>
