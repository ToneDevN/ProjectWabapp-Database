<script src="{{ url('../javascript/navigation.js') }}"></script>
<div>
    <ul class="font-medium flex flex-row gap-10">
        <li>
            <button>
                <div class="h-9"><span class="material-icons" style="font-size: 36px">home</span></div>
                <p class="navigationUnderline">Home</p>
            </button>
        </li>
        <li>
            <button>
                <div class="h-9"><span class="material-icons" style="font-size: 36px">notifications</span></div>
                <p class="navigationUnderline">Notifications</p>
            </button>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="post">
                @csrf
            <button onclick="onclick="event.preventDefault(); this.closest('form').submit();">
                <div class="h-9"><img class="mb-2" src="{{ url('../images/ProfileIcon.jpg') }}" alt=""
                        id="icon"></div>
                <p class="navigationUnderline">Me</p>
            </button>
            </form>
        </li>
    </ul>
</div>
