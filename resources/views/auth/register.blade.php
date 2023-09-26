<x-guest-layout>
    <script src="{{ url('javascript/auth.js') }}"></script>
    <form method="POST" action="{{ route('register') }}" class="formStyle" autocomplete="on" id="form">
        @csrf
        <h1 class="text-4xl mb-4">Create Account</h1>
        {{-- Username --}}
        <div class="input-control mb-2">
            <x-input-label for="username" :value="__('Username')" />
            <input type="text" name="name" id="name" placeholder="Username" class=" w-full inputStyle " value=" {{ old('name') }}"
                autofocus pattern="[a-zA-Z0-9]*" required>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Email --}}
        <div class="input-control mb-2">
            <x-input-label for="email" :value="__('Email')" />
            <input type="email" name="email" id="email" placeholder="Email" class=" w-full inputStyle " value=" {{ old('email') }}"
                required>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Password --}}
        <div class="input-control mb-2">
            <x-input-label for="password" :value="__('Password')" />
            <input type="password" name="password" id="password" placeholder="Password" class=" w-full inputStyle "
                required>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- ConfirmPassword --}}
        <div class="input-control mb-2">
            <x-input-label for="confirmpassword" :value="__('Confirm Password')" />
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"
                class=" w-full inputStyle " required>
            <x-input-error :messages="$errors->get('confirmpassword')" class="mt-2" />
        </div>

        {{-- Phonenumber --}}
        <div class="input-control mb-4">
            <x-input-label for="phonenumber" :value="__('Phonenumber')" />
            <input type="text" name="phonenumber" id="phonenumber" placeholder="Phonenumber" value=" {{ old('phonenumber') }}"
                class="w-full inputStyle " pattern="[0-9]*" required>
            <x-input-error :messages="$errors->get('phonenumber')" class="mt-2" />
        </div>

        <button class="w-full buttonStyle" type="submit">Create Account</button>

    </form>
</x-guest-layout>
