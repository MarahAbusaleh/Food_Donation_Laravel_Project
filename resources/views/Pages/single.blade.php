@if (session('success'))
    <div id="vola_message" class="alert alert-primary">{{ session('success') }}</div>
@endif
<a href="{{ route('money.show', ['id' => 1, 'user_id' => 1, 'donation_id' => 1]) }}"><button>Money</button></a>
<a href="{{ route('things.show', ['id' => 1, 'user_id' => 1, 'donation_id' => 1]) }}"><button>Things</button></a>
<a href="{{ route('other.show', ['id' => 1, 'user_id' => 1, 'donation_id' => 1]) }}"><button>Other</button></a>
