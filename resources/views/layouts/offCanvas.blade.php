{{-- OFF CANVAS MENU --}}
<div id="offCanvas" class="sidebar">
    <span class="close-btn" onclick="closeSidebar()">&times;</span>
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a href="#">Profile</a>
    <a href="#">Pengaturan</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}" 
           onclick="event.preventDefault(); this.closest('form').submit();">
            Logout
        </a>
    </form>
</div>
