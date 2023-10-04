@extends('layouts.mainPage')
@section('content')
    <div class="bg-white rounded-xl min-h-full p-4 px-12">
        @isset($job)
            <h1 class="text-4xl font-semibold my-4">{{ $job->nameJob }}</h1>


            <div class="p-4">
                <div class="flex my-4">
                    <div class="w-16 h-16 grid content-center border border-gray-200 rounded-md p-2">
                        @if (@isset($job->Poser->User->image))
                            <img src="{{ asset('profile/' . $job->Poser->idUser . '.jpg') }}" alt=""
                                class="w-full auto rounded-full img-job">
                        @else
                            <img src="{{ url('../images/ProfileUserIcon.jpg') }}" alt=""
                                class="w-full auto rounded-full img-job">
                        @endif
                    </div>
                    <div class="flex self-center mx-4 font-medium text-lg ">
                        <a href="" class="text-left underline underline-offset-1 mr-2">{{ $job->Poser->userOfficeName }}
                        </a>
                        <p>{{ $job->Poser->userOfficeAddress }}</p>
                    </div>
                </div>
                <div class="m-4">
                    <div class="flex my-4">
                        <span class="material-symbols-outlined" style="font-size: 2.5em">
                            business_center
                        </span>
                        <p class="self-center font-medium text-lg ml-6">{{ $job->workType }}</p>
                    </div>
                    <div class="flex my-4">
                        <span class="material-symbols-outlined" style="font-size: 2.5em">
                            location_city
                        </span>
                        <p class="self-center font-medium text-lg ml-6">{{ $job->jobType }}</p>
                    </div>
                    <div class="flex gap-4 w-full my-6">

                        <form action="{{ route('enroll') }}" method='post' class="h-12 w-1/2">
                            @csrf
                            <input type="hidden" name="job_id" value="{{ $idjob }}">
                            <button type="submit" name="idjob" value="{{ $job->idJobInfo }}"
                                class="colors-blue rounded-md h-12 w-full text-white text-lg font-semibold">
                                Apply
                            </button>
                        </form>

                        <form action="{{ route('save.favorite') }}" method='post' class="h-12 w-1/2" id="saveFavoriteForm">
                            @csrf
                            <input type="hidden" name="saveFavorite" value="{{ $job->idJobInfo }}">
                            <button name="saveFavorite" value="{{ $job->idJobInfo }}"
                                class="border borders-blue rounded-md h-12 w-full text-lg font-semibold bt-save hover:text-white">
                                Save
                            </button>
                        </form>
                    </div>
                    <button class="flex border border-gray-300 rounded-md w-full p-4 my-6">
                        <div class="w-12 h-12 grid content-center ">
                            @if (@isset($job->Poser->User->image))
                                <img src="{{ asset('profile/' . $job->Poser->idUser . '.jpg') }}" alt=""
                                    class="w-full auto rounded-full img-job">
                            @else
                                <img src="{{ url('../images/ProfileUserIcon.jpg') }}" alt=""
                                    class="w-full auto rounded-full img-job">
                            @endif
                        </div>
                        <div class="flex self-center mx-4">
                            <p class="text-left text-xl  mr-2 font-semibold">{{ $job->Poser->userOfficeName }}</p>
                        </div>
                    </button>
                    <div>
                        <h1 class="text-xl font-semibold">About the job</h1>
                        <div class="bg-gray-100 rounded-md p-4">
                            <p>{{ $job->discription }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endisset
    <script>
        document.getElementById('saveFavoriteForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            // Serialize the form data
            const formData = new FormData(this);

            // Send an AJAX request to the save.favorite route
            jQuery.ajax({
                url: "{{ route('save.favorite') }}",
                data: formData,
                type: 'post',
                processData: false, // Don't process the data (already FormData)
                contentType: false, // Don't set content type

                success: function(result) {
                    // Handle the success response here (e.g., show a success message)
                    alert("Job saved as favorite!");
                },
                error: function(error) {
                    // Handle the error response here if needed
                    console.error(error);
                }
            });
        });
    </script>
@endsection
