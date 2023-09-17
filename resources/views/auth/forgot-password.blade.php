<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="formStyle">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <h1 class="text-4xl mb-4">Reset Password</h1>

            <!-- Email Address -->
            <div class="input-control mb-4">
                <label for="email">
                    <input type="radio" name="repassword" id="email" value="email">
                    <span>Email</span>
                </label>
                <input id="email" class="w-full inputStyle" type="email" name="email" :value="old('email')"
                    required autofocus placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Phone Number -->
            <div class="input-control mb-4">
                <label for="phonenumber">
                    <input type="radio" name="repassword" id="phonenumber" value="phonenumber">
                    <span>Phone number</span>
                </label>
                <input id="phonenumber" class="w-full inputStyle" type="text" name="phonenumber"
                    :value="old('phonenumber')" required autofocus placeholder="Phone number" />
                <x-input-error :messages="$errors->get('phonenumber')" class="mt-2" />
            </div>

            <button class="w-full buttonStyle" type="submit">Reset Password</button>
        </form>
    </div>
</x-guest-layout>
