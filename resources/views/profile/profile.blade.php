<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="http://127.0.0.1:8000/css/profile.css" rel="stylesheet">
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Archivo:wght@300&family=Bai+Jamjuree&family=Poppins:wght@300&display=swap');
        </style>
        <script>
        @if(session('success'))
        alert("{{ session('success') }}");
        @endif

        @if(session('error'))
        alert("{{ session('error') }}");
        @endif

        function showUploadButton() {
            document.getElementById('bt-upload-img').style.display = 'block';
        }


        document.addEventListener("DOMContentLoaded", function() {
            const checkboxes = document.querySelectorAll(".checkbox-tag");
            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", function() {
                    const form = this.closest(".checkbox-form");
                    const formData = new FormData(form);

                    fetch(form.action, {
                            method: "POST",
                            body: formData,
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute("content"),
                            },
                        })
                        .then((response) => response.json())
                        .then((data) => {
                            // Handle the response as needed.
                            console.log(data);
                        })
                        .catch((error) => {
                            console.error("Error:", error);
                        });
                });
            });
        });
        </script>

    </head>

    <body>
        <div class="body-navigation">
            <div class="background">
                <div class="content">
                    <div class="bg">
                        <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="file-upload">
                                <input class="icon-input" type="file" name="profile_image" id="fileInput"
                                    onchange="showUploadButton()">
                                <label class="icon-button" for="fileInput">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="black"
                                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </span>
                                </label>
                                <button id="bt-upload-img" type="submit">Upload</button>
                            </div>

                        </form>
                        <!-- รูปภาพ -->
                        @isset($img_default)
                        $img_default = <img class="rounded-full" src="http://127.0.0.1:8000/../profile/Default.svg"
                            alt="Profile Image" id="ProfileIcon">
                        @endisset
                        <img class="rounded-full" src="http://127.0.0.1:8000/../profile/{{$image}}" alt="Profile Image"
                            id="ProfileIcon">
                    </div>

                    <div class="pt">
                        <!-- edit profile -->
                        <div class="content-item">
                            <div class="title">
                                <h1>Profile information</h1>
                                Update your profile information and email address.
                            </div>
                            <div class="form">
                                <form action="/profile/update1" method="POST">
                                    @csrf
                                    <span class="title-item">Name</span><br>
                                    <input type="text" name="name" value="{{Auth::user()->name}}" required><br>
                                    <span class="title-item">Email</span><br>
                                    <input type="email" name="email" value="{{ Auth::user()->email}}" required>
                                    <p><button class="cf" type="submit">save</button></p>
                                </form>
                            </div>
                        </div>

                        <!-- edit password -->
                        <div class="content-item">
                            <div class="title">
                                <h1>Update Password</h1>
                                Ensure your account is using a long, random password to stay secure.
                            </div>
                            <form action="/profiles/passwordupdate" method="POST">
                                @csrf
                                <span class="title-item">Current Password</span>
                                <br><input type="hidden" value='{{$old_password}}'>
                                <input type="password" name="current_password" required placeholder="Current password">
                                <br><span class="title-item">New Password</span>
                                <br><input type="password" name="new_password" required placeholder="New password">
                                <br><span class="title-item">Confirm Password</span>
                                <br><input type="password" name="new_password_confirmation" required
                                    placeholder="Confirm password">
                                <p><button class="cf" type="submit">save</button></p>
                            </form>
                        </div>

                        <!-- company -->
                        <div class="content-item">
                            <div class="title">
                                <h1>Office</h1>
                                Ensure your office name and office location to enchance
                                account to post the job.
                            </div>
                            <form action="/profile/updateoffice" method="POST">
                                @csrf
                                <span class="title-item">Office Name</span><br>
                                <input type="text" name="office_name" value="{{ $posersData->userOfficeName }}"
                                    required><br>
                                <span class="title-item">Office Address</span><br>
                                <input type="text" name="office_add" value="{{ $posersData->userOfficeAddress}}"
                                    required>
                                <p><button class="cf" type="submit">save</button></p>
                            </form>
                        </div>

                        <!-- Logout -->
                        <div class="content-item">
                            <div class="title">
                                <h1>Logout</h1>
                                Ensure your account is using a long, random password to stay secure.
                            </div>
                            <form class="logout" action="/profile/logout" method="GET">
                                @csrf
                                <button id="bt-logout" type="submit">Logout</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        </div>
    </body>

    </html>
</x-app-layout>
