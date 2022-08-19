<!-- Sidebar user panel (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="<?php if(Auth::user()->image!='team-3.jpg'): ?>{{url('/Images/user/'.Auth::user()->image)}} <?php else: ?>{{url('/assets/img/team/'.Auth::user()->image)}} <?php endif; ?>" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
    </div>
</div>