<ul class="nav bg-dark mb-4 p-2">
  <li class="nav-item">
    <a class="nav-link link-light" href="{{ route('dashboard') }}">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link link-light" href="{{ route('about-me.index') }}">About Me</a>
  </li>
  <li class="nav-item">
    <a class="nav-link link-light active" aria-current="page" href="{{ route('skills.index') }}">Skills</a>
  </li>
  <li class="nav-item">
    <a class="nav-link link-light" href="{{ route('projects.index') }}">Projects</a>
  </li>
  <li class="nav-item">
    <a class="nav-link link-light" href="{{ route('services.index') }}">Services</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link link-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      ACL Settings
    </a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="{{ route('user.rolepermissions') }}">Users & Roles</a></li>
      <li><a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a></li>
      <li><a class="dropdown-item" href="{{ route('permissions.index') }}">Permissions</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="{{ route('roles.create') }}">Add Role</a></li>
      <li><a class="dropdown-item" href="{{ route('permissions.create') }}">Add Permission</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="{{ route('assign.role') }}">Assign Role</a></li>
      <li><a class="dropdown-item" href="{{ route('assign.permission') }}">Assign Permission</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="{{ route('assign.role') }}">Assign Role</a></li>
      <li><a class="dropdown-item" href="{{ route('assign.permission') }}">Assign Permission</a></li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link link-light" href="{{ route('posts.index') }}">Blog</a>
  </li>
</ul>
