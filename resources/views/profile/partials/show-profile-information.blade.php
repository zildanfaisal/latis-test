<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <div>
        <div class="my-4">
            <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('images/default-profile.png') }}" alt="Profile Photo" class="h-32 w-32 object-cover rounded-full">            
        </div>

        <table>
            <tr>
                <td>Nama Kandidat:</td>
                <td>&nbsp;{{ $user->name }}</td>
            </tr>
            <tr>
                <td>Email Kandidat:</td>
                <td>&nbsp;{{ $user->email }}</td>
            </tr>
            <tr>
                <td>Posisi Kandidat:</td>
                <td>&nbsp;{{ $user->position }}</td>
            </tr>
        </table>
    </div>
</section>
