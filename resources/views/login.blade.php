<form method="POST" action="{{ url('/login') }}">
    @csrf
    <input type="email" name="email" required>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
    @error('invalid-credentials')
        <span>{{ $message }}</span>
    @enderror
</form>
