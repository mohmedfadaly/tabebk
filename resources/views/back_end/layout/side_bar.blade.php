<nav class="sidebar">
				
				<!-- close sidebar menu -->

				<div class="dismiss">
					<i class="fas fa-arrow-right"></i>
				</div>

				
				<ul class="list-unstyled menu-elements">
				
					<li class="{{ is_active('home') }}">
               		 <a  href="{{ route('home.index') }}">
                    التحكم
                	</a>
            		</li>
					<li class="{{ is_active('users') }}">
						<a    href="{{ route('users.index') }}">
						الاعضاء
						</a>
					</li>
					<li class="{{ is_active('specialties') }}">
						<a    href="{{ route('specialties.index') }}">
						التخصصات
						</a>
					</li>
					<li class="{{ is_active('doctors') }}">
						<a    href="{{ route('doctors') }}">
						الاطباء
						</a>
					</li>
					<li class="{{ is_active('posts') }}">
						<a    href="{{ route('posts.index') }}">
						المنشورات
						</a>
					</li>
					<li class="{{ is_active('reservs') }}">
						<a    href="{{ route('reservs.index') }}">
						الحجز
						</a>
					</li>
					<li class="{{ is_active('videos') }}">
						<a    href="{{ route('videos.index') }}">
					الفديو
						</a>
					</li>


				</ul>
				
				<div class="to-top">
					<a class="btn btn-primary btn-customized-3" href="#" role="button">
	                    <i class="fas fa-arrow-up"></i> اعلي
	                </a>
				</div>
				
				<div class="dark-light-buttons">
					<a class="btn btn-primary btn-customized-4 btn-customized-dark" href="#" role="button">Dark</a>
					<a class="btn btn-primary btn-customized-4 btn-customized-light" href="#" role="button">Light</a>
				</div>
			
			</nav>