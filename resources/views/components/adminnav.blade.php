<script src="{{ url('../javascript/navigation.js') }}"></script>
<div>
    <ul class="font-medium flex flex-row gap-10">
        <li>
            <form action="{{ route('logout') }}" method="post">
                @csrf
            <button onclick="onclick="event.preventDefault(); this.closest('form').submit();">
                <div class="h-9"><img class="mb-2" src="{{ url('../images/ProfileIcon.jpg') }}" alt=""
                        id="icon"></div>
                <p>Me</p>
            </button>
            </form>
        </li>
    </ul>
</div>
