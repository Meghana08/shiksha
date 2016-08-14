
  <div class="home-page" style="visibility: visible; ">
    <div class="introduction" style="width: 90%; height: 100%; left: 0px;">
      <div class="intro-content">
        @section('main')
        @show
      </div>      
    </div>
    <div class="menu" style="width: 10%; height: 100%; left: 0px;">
      <div class="profile-btn menu_button">
        <img src="{{ asset('img/about.jpg') }}" style="width: 100%; height: 100%;" alt="...">
        <div class="mask"></div>
        <div class="heading">
          <i class="ion-ios-people-outline hidden-xs"></i>
          <h2><a href="{{ route('contentShow') }}">Change Content</a></h2>
        </div>
      </div>
      <div class="profile-btn menu_button" data-toggle="modal" data-target="#add_file">
        <img src="{{ asset('img/whats_new.jpg') }}" style="width: 100%; height: 100%;" alt="...">
        <div class="mask"></div>
        <div class="heading">
          <i class="ion-ios-briefcase-outline hidden-xs"></i>
          <h2>Add File</h2>
        </div>
      </div>
      <div class="profile-btn menu_button" data-toggle="modal" data-target="#show_visitors">
        <img src="{{ asset('img/contact_form.jpg') }}" style="width: 100%; height: 100%;" alt="...">
        <div class="mask"></div>
        <div class="heading">
          <i class="ion-ios-people-outline hidden-xs"></i>
          <h2>Show Visitors</h2>
        </div>
      </div>
      <div class="profile-btn menu_button" data-toggle="modal" data-target="#add_subject">
        <img src="{{ asset('img/contact.jpg') }}" style="width: 100%; height: 100%;" alt="...">
        <div class="mask"></div>
        <div class="heading">
          <i class="ion-ios-people-outline hidden-xs"></i>
          <h2>Add Subject</h2>
        </div>
      </div>
    </div>
  </div>