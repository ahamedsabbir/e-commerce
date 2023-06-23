<form action="{{route('verification.send')}}" method="post">
@csrf
	<button type="submit">resend email</button>
</form>