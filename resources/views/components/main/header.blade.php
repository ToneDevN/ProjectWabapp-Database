<script>
    function createJob($id) {
        window.location.href = 'http://127.0.0.1:8000/createjob';
    }
</script>
@poser
<button class="colors-blue h-20 rounded-xl mb-4 grid content-center w-full posts" onClick="createJob()"">
    <div class="flex justify-center place-items-center">
        <img src="{{ url('../images/Compose.png') }}" alt="" class="w-16 h-14">
        <h1 class="text-4xl text-white font-semibold">Post a job</h1>
    </div>
</button>
@endposer
@user
<div class="bg-blue h-20 rounded-xl mb-4 grid content-center w-full">
    <div class="flex justify-center place-items-center">
        <img src="{{ url('../images/Compose.png') }}" alt="" class="w-16 h-14">
        <h1 class="text-4xl text-white font-semibold">Post a job</h1>
    </div>
</div>
@enduser