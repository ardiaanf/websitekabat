<h1>Live Chat User</h1>

<div class="chat-container">
    @foreach($messages as $message)
        <div class="message">
            <p><strong>{{ $message->name }} @if($message->village){{ $message->village }}@endif</strong></p>
            <p>{{ $message->message }}</p>
            @if ($message->admin_reply)
                <p class="admin-reply">{{ $message->admin_reply }}</p>
            @endif
        </div>
    @endforeach
</div>

<form action="{{ route('user.live-chat.send-message') }}" method="post">
    @csrf
    @if (!session('user_has_sent_message'))
        <input type="text" name="name" placeholder="Nama" required>
        <input type="text" name="village" placeholder="Desa" required>
    @endif
    <textarea name="message" placeholder="Pesan" required></textarea>
    <button type="submit">Kirim</button>

    <a href="{{ route('clear.user-sent-message-session') }}">Keluar</a>

</form>
