<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="formStyle">
        @csrf
        <h1 class="text-4xl mb-4">Create Account</h1>
        {{-- Username --}}
        <x-input-label for="username" :value="__('Username')" />
        <input type="text" name="username" id="" placeholder="Username" class=" w-full inputStyle mb-2" autofocus
            required>
        <x-input-error :messages="$errors->get('username')" class="mb-2" />

        {{-- Email --}}
        <x-input-label for="email" :value="__('Email')" />
        <input type="email" name="email" id="" placeholder="Email" class=" w-full inputStyle mb-2"
            required>
        <x-input-error :messages="$errors->get('email')" class="mb-2" />

        {{-- Password --}}
        <x-input-label for="password" :value="__('Password')" />
        <input type="password" name="password" id="" placeholder="Password" class=" w-full inputStyle mb-2"
            required>
        <x-input-error :messages="$errors->get('password')" class="mb-2" />

        {{-- ConfirmPassword --}}
        <x-input-label for="confirmpassword" :value="__('Confirm Password')" />
        <input type="password" name="confirmpassword" id="" placeholder="Confirm Password"
            class=" w-full inputStyle mb-2"required>
        <x-input-error :messages="$errors->get('confirmpassword')" class="mb-2" />

        {{-- Phonenumber --}}
        <x-input-label for="phonenumber" :value="__('Phonenumber')" />
        <input type="text" name="phonenumber" id="" placeholder="Phonenumber" class="w-full inputStyle mb-4"
            required>
        <x-input-error :messages="$errors->get('phonenumber')" class="mb-2" />

        <button class="w-full buttonStyle">Create Account</button>

    </form>
</x-guest-layout>
