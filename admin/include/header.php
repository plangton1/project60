<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">
  <a href="?page=dash"  class="non-printable">
       <img src="../b/assets/img/1.png"  class="non-printable" width="90%" /></a>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo"><img src="../b/assets/img/logo.png" alt=""></a>-->

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="?page=status">เอกสารทั้งหมด</a></li>
        <li><a class="nav-link scrollto" href="#about">รายงานเอกสาร</a></li>
        <li class="dropdown"><a href="#"><span>ข้อมูลพื้นฐาน</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="?page=add_type">เพิ่มข้อมูลสถานะ</a></li>
            <li><a href="?page=add_group">เพิ่มกลุ่มผลิตภัณฑ์</a></li>
            <li><a href="?page=add_agency">เพิ่มหน่วยงานคู่แข่ง</a></li>
            <li><a href="?page=add_department">เพิ่มหน่วยงานที่ขอ</a></li>
          </ul>
        </li>
        <li><a class="nav-link scrollto" href="?page=contact">ติดต่อเรา</a></li>
        <li class="dropdown"><a href="#"><span>สวัสดีคุณ <?= $_SESSION['user_login']; ?> || ตำแหน่ง : <?= $_SESSION['role_login']; ?></span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="?page=logout" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่')">ออกจากระบบ</a></li>
          </ul>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->