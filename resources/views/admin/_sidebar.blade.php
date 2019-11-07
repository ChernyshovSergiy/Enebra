
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">@lang('admin.main_navigation')</li>
    <li>
        <a href="{{route('admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i> <span>@lang('admin.dashboard')</span>
            <span class="pull-right-container"></span>
        </a>
    </li>
     <li>
        <a href="{{route('inf_menus.index')}}">
            <i class="fa fa-bars"></i> <span>@lang('admin.menu')</span>
            <span class="pull-right-container">
                  <small class="label pull-right bg-red-gradient">{{ $not_active }}</small>
                  <small class="label pull-right bg-green">{{ $is_active }}</small>
            </span>
        </a>
    </li>
     <li>
        <a href="{{route('inf_pages.index')}}">
            <i class="fa fa-newspaper-o"></i> <span>@lang('admin.pages')</span>
            <span class="pull-right-container"></span>
        </a>
    </li>
    <li>
        <a href="{{route('purposes.index')}}">
            <i class="fa fa-dot-circle-o" aria-hidden="true"></i> <span>@lang('admin.purposes')</span>
            <span class="pull-right-container"></span>
        </a>
    </li>
    <li>
        <a href="{{route('what_to_do_points.index')}}">
            <i class="fa fa-map-marker" aria-hidden="true"></i> <span>@lang('admin.what_to_do')</span>
            <span class="pull-right-container"></span>
        </a>
    </li>
    <li>
        <a href="{{route('terms.index')}}">
            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span>@lang('admin.terms')</span>
            <span class="pull-right-container"></span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-question-circle"></i>
            <span>@lang('admin.faq')</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('faq_questions.index') }}"><i class="fa fa-question-circle"></i> @lang('admin.faq_questions')</a></li>
            <li><a href="{{ route('faq_answers.index') }}"><i class="fa fa-info-circle"></i> @lang('admin.faq_answers')</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-balance-scale"></i>
            <span>@lang('admin.constitution')</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('const_sections.index') }}"><i class="fa fa-balance-scale"></i> @lang('admin.const_sections')</a></li>
            <li><a href="{{ route('const_articles.index') }}"><i class="fa fa-gavel"></i> @lang('admin.const_articles')</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-image"></i>
            <span>@lang('admin.images')</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('image_categories.index') }}"><i class="fa fa-list-alt"></i> @lang('admin.images_categories')</a></li>
            <li><a href="{{ route('images.index') }}"><i class="fa fa-image"></i> @lang('admin.images')</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-th-large"></i>
            <span>@lang('admin.descriptions')</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('desc_blocks.index') }}"><i class="fa fa-th-large"></i> @lang('admin.des_blocks')</a></li>
            <li><a href="{{ route('descriptions.index') }}"><i class="fa fa-bars"></i> @lang('admin.descriptions')</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i> <span>@lang('admin.components')</span>
            <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('languages.index')}}"><i class="fa fa-language"></i> @lang('admin.languages')</a></li>
            <li><a href="{{route('id_documents.index')}}"><i class="fa fa-newspaper-o"></i> @lang('admin.documents_id')</a></li>
            <li><a href="{{route('countries.index')}}"><i class="fa fa-flag"></i> @lang('admin.countries')</a></li>
            <li><a href="{{route('social_links.index')}}"><i class="fa fa-share-alt"></i> @lang('admin.social_links')</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-home"></i>
            <span>@lang('admin.home_page')</span>
            <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('introduction_points.index')}}"><i class="fa fa-map-marker"></i> @lang('admin.introduction_points')</a></li>
            <li><a href="{{route('introductions.index')}}"><i class="fa fa-file-text"></i> @lang('admin.introduction')</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-clock-o"></i>
            <span>@lang('admin.active_plan')</span>
            <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('inf_plan_phases.index')}}"><i class="fa fa-qrcode"></i> @lang('admin.phases_plan')</a></li>
            <li><a href="{{route('inf_plan_phase_sections.index')}}"><i class="fa fa-map-signs"></i> @lang('admin.phases_plan_directions')</a></li>
            <li><a href="{{route('inf_plan_phase_section_points.index')}}"><i class="fa fa-map-pin"></i> @lang('admin.plan_points')</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-play-circle"></i>
            <span>@lang('admin.video')</span>
            <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('inf_video_groups.index')}}"><i class="fa fa-file-text"></i> @lang('admin.video_groups')</a></li>
            <li><a href="{{route('inf_video_group_sections.index')}}"><i class="fa fa-file-text-o"></i> @lang('admin.video_group_sectors')</a></li>
            <li><a href="{{route('inf_videos.index')}}"><i class="fa fa-file-video-o"></i> @lang('admin.videos')</a></li>
        </ul>
    </li>
    <li>
        <a href="{{route('subscribers.index')}}">
            <i class="fa fa-user-plus"></i> <span>@lang('admin.subscribers')</span>
            <span class="pull-right-container">
                  <small class="label pull-right bg-yellow">{{ $newSubs }}</small>
                  <small class="label pull-right bg-green">{{ $allSubs }}</small>
            </span>
        </a>
    </li>

    <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>

</ul>
