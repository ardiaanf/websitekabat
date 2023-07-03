<h1>Live Chat Admin</h1>

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

<form action="{{ route('admin.live-chat.send-message') }}" method="post">
    @csrf
    <textarea name="message" placeholder="Kirim pesan" required></textarea>
    <button type="submit">Kirim</button>
</form>
