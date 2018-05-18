@if (Auth::guard('web')->check())
    <p class="text-success">
        You are login as a <strong>User</strong>
    </p>
@else
    <p class="text-danger">
        You are logout as a <strong>User</strong>
    </p>
@endif

@if (Auth::guard('admin')->check())
    <p class="text-success">
        You are login as a <strong>Admin</strong>
    </p>
@else
    <p class="text-danger">
        You are logout as a <strong>Admin</strong>
    </p>
@endif
