<li><a href="{{ route('home') }}">Home</a></li>
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="dropdown"><a href="#">company</a>
    <ul>
        <li><a href="{{ route('about') }}">About Us</a></li>
        <li><a href="{{ route('faqs') }}">FAQ</a></li>
        <li><a href="{{ route('team') }}">Teams</a></li>
        <li><a href="{{ route('contact') }}">Contact Us</a></li>
    </ul>
</li>
<li class="dropdown"><a href="#">Services</a>
    <ul>
        <li><a href="{{ route('services') }}">Our Services</a></li>
        <li><a href="{{ route('serviceDetails') }}">Service Details</a></li>
    </ul>
</li>
<li class="dropdown"><a href="#">Projects</a>
    <ul>
        <li><a href="{{ route('projects') }}">Project Grid</a></li>
        <li><a href="{{ route('projectList') }}">Project List</a></li>
        <li><a href="{{ route('projectMasonry') }}">Project Masonry</a></li>
        <li><a href="{{ route('projectDetails') }}">Project Details</a></li>
    </ul>
</li>
<li class="dropdown"><a href="#">blog</a>
    <ul>
        <li><a href="{{ route('blog') }}">blog list</a></li>
    </ul>
</li>