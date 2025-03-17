<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
            </a>
        </div>
        <div class="flex-grow-1 search-bar">
            <div class="input-group">
                <button class="btn btn-search-back search-arrow-back" type="button"><i
                        class="bx bx-arrow-back"></i></button>
                <input type="text" class="form-control" placeholder="search" />
                <button class="btn btn-search" type="button"><i class="lni lni-search-alt"></i></button>
            </div>
        </div>
        <div class="right-topbar ms-auto">
            <ul class="navbar-nav">
                <li class="nav-item search-btn-mobile">
                    <a class="nav-link position-relative" href="javascript:;"> <i
                            class="bx bx-search vertical-align-middle"></i>
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                        data-bs-toggle="dropdown">
                        <div class="d-flex user-box align-items-center">
                            <div class="user-info">
                                <p class="user-name mb-0">Admin</p>
                                <p class="designattion mb-0">Online</p>
                            </div>
                            <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" class="user-img"
                                alt="user avatar">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <!-- Tombol Logout -->
                        <a class="dropdown-item" href="#" id="logout-btn">
                            <i class="bx bx-power-off"></i><span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('logout-btn').addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah logout langsung

    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Anda akan keluar dari akun ini!",
        icon: "warning", // Ikon peringatan
        showCancelButton: true,
        confirmButtonColor: "#d33", // Warna merah untuk konfirmasi
        cancelButtonColor: "#3085d6", // Warna biru untuk batal
        confirmButtonText: "Ya, Logout!",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logout-form').submit(); // Kirim formulir logout
        }
    });
});
</script>