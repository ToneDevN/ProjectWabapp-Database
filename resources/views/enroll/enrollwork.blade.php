<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-semibold mb-4">Edit Your Profile</h3>

                    <!-- Profile Form -->
                    <form action="/submit" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input type="email" name="email" id="email" class="border rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500" required>
                        </div>

                        <!-- Mobile Phone Number -->
                        <div class="mb-4">
                            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Mobile Phone Number:</label>
                            <input type="tel" name="phone" id="phone" class="border rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500" required>
                        </div>

                        <!-- Resume Upload -->
                        <div class="mb-4">
                            <label for="resume" class="block text-gray-700 text-sm font-bold mb-2">Upload Resume (PDF, max 10MB):</label>
                            <input type="file" name="resume" id="resume" accept=".pdf" class="border w-full py-2 px-3 focus:outline-none focus:border-blue-500" required>
                        </div>

                        <!-- Next Button -->
                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Next</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
