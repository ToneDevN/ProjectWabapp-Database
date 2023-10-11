<script src="{{ url('../javascript/navigation.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Attach a click event handler to the button with ID "home"
        $("#home").click(function() {
            window.location.href = '{{ url('/home') }}';
        });

        // Attach a click event handler to the element with ID "notification"
        $("#notification").click(function(event) {
            event.preventDefault();
            window.location.href = '{{ url('/notification') }}';
        });
    });
</script>
<div>
    <ul class="font-medium flex flex-row gap-10">
        <li>
            <button id="home">
                <div class="h-9"><span class="material-icons" style="font-size: 36px">home</span></div>
                <p class="navigationUnderline" id="homeUnderline">Home</p>
            </button>
        </li>
        <li>
            <button id="notification">
                <div class="h-9"><span class="material-icons" style="font-size: 36px">notifications</span></div>
                <p class="navigationUnderline" id="notificationUnderline">Notifications</p>
            </button>
        </li>
        <li>
            <form action="{{ route('Profile_index') }}" method="get">
                @csrf
                <button onclick="onclick="event.preventDefault(); this.closest('form').submit();" id="me">
                    <div class="h-9">
                        @isset($image)
                            <img src="{{ asset('profile/' . auth()->user()->idUser . '.jpg') }}" alt="" class="mb-2"
                                id="icon">
                        @endisset
                        @empty($image)
                            <img src="{{ url('../images/ProfileUserIcon.jpg') }}" alt="" class="mb-2"
                                id="icon">
                        @endempty
                    </div>
                    <p class="navigationUnderline" id="meUnderline">Me</p>
                </button>
            </form>

        </li>

    </ul>
</div>
