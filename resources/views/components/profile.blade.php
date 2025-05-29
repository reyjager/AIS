<li class="nav-item dropdown px-3 list-unstyled">
   <a class="nav-link nav-profile d-flex flex-column align-items-center pe-0" href="#" role="button" data-bs-toggle="dropdown">
    <img src="http://localhost:8000/images/profile-img.jpg" alt="Profile" class="rounded-circle mb-1" style="width: 40px; height: 40px;">
    <span class="d-none d-md-block fs-6">{{ auth()->user()->name() }}</span>
</a>
    <!-- End Profile Image Icon -->

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
            <h6>{{ auth()->user()->name() }}</h6>
            <span>Web Designer</span>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="">
                <i class="bi bi-person pe-2"></i>
                <span>My Profile</span>
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="">
                <i class="bi bi-gear pe-2"></i>
                <span>Account Settings</span>
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item d-flex align-items-center">
                    <i class="bi bi-box-arrow-right pe-2"></i>
                    <span>Sign Out</span>
                </button>
            </form>
        </li>
    </ul><!-- End Profile Dropdown Items -->
</li><!-- End Profile Nav -->
</ul>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>