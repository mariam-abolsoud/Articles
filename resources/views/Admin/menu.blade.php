<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
	<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
		<li class="m-menu__item  m-menu__item--" aria-haspopup="true"><a href="{{route('dashboard')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Dashboard</span>
						<span class="m-menu__link-badge"></span> </span></span></a></li>
		<!--<li class="m-menu__section ">
			<h4 class="m-menu__section-text">Components</h4>
			<i class="m-menu__section-icon flaticon-more-v2"></i>
		</li>-->
          
		<li class="m-menu__item  m-menu__item--submenu m-menu__item--expanded {{isset($articles)?'m-menu__item--open m-menu__item--hover':''}}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-interface-3"></i><span class="m-menu__link-text">Articles</span><i
				 class="m-menu__ver-arrow la la-angle-right"></i></a>
			<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
					<li class="m-menu__item  m-menu__item--parent " aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">All Articles</span></span></li>
					<li class="m-menu__item {{isset($article_active_class)?$article_active_class:''}}" aria-haspopup="true"><a href="{{route('Articles.index')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">All articles</span></a></li>
						
				</ul>
			</div>
		</li>
        
        <li class="m-menu__item  m-menu__item--submenu {{isset($categories)?'m-menu__item--open m-menu__item--hover':''}}" aria-haspopup="true" m-menu-submenu-toggle="hover">
            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon flaticon-layer"></i>
                <span class="m-menu__link-text">Categories</span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
			<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
					<li class="m-menu__item  m-menu__item--parent " aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">All Categories</span></span></li>
					<li class="m-menu__item {{isset($cat_active_class)?$cat_active_class:''}}" aria-haspopup="true"><a href="{{route('Categories.index')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">All Categories</span></a></li>
						
				</ul>
			</div>
		</li>
        
        <li class="m-menu__item " ><a href="{{route('AdminLogout')}}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-logout"></i><span class="m-menu__link-text">Log out</span></a>
			
		</li>
		
		
        
		
		
		
		
	</ul>
</div>