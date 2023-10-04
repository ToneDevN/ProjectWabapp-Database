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
            <button id="home" class="hover:bg-blue-400">
                <div class="h-9"><span class="material-icons" style="font-size: 36px">home</span></div>
                <p class="navigationUnderline">Home</p>
            </button>
        </li>
        <li>
            <button id="notification" class="hover:bg-blue-400">
                <div class="h-9"><span class="material-icons" style="font-size: 36px">notifications</span></div>
                <p class="navigationUnderline">Notifications</p>
            </button>
        </li>
        <li>
            <form action="{{ route('Profile_index') }}" method="get">
                @csrf
                <button onclick="onclick="event.preventDefault(); this.closest('form').submit();" class="hover:bg-blue-400">
                    <div class="h-9"><img class="mb-2" src="{{ url('../images/ProfileIcon.jpg') }}" alt=""
                            id="icon"></div>
                    <p class="navigationUnderline">Me</p>
                </button>
            </form>

        </li>

    </ul>
</div>
