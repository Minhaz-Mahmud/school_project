<form method="POST" action="{{ route('approve_meet', ['id' => $id]) }}">
    @csrf
    <label for="teacher_id">Teacher ID:</label>
    <input type="text" id="teacher_id" name="teacher_id">
    <button type="submit">Approve Meeting</button>
</form>
